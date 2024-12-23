<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\BookedVehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function increment(Request $request, $id)
    {
        $bookedVehicle = BookedVehicle::findOrFail($id);

        // Get the associated vehicle
        $vehicle = Vehicle::findOrFail($bookedVehicle->vehicle_id);

        // Check if there are available vehicles to increment
        if ($vehicle->available_count > 0) {
            // Increase booked count
            $bookedVehicle->booked_count++;
            $bookedVehicle->save();

            // Decrease available count
            $vehicle->available_count--;
            $vehicle->save();
        }

        return redirect()->back()->with('success', 'Vehicle booking incremented successfully.');
    }

    public function decrement(Request $request, $id)
    {
        $bookedVehicle = BookedVehicle::findOrFail($id);

        // Get the associated vehicle
        $vehicle = Vehicle::findOrFail($bookedVehicle->vehicle_id);

        // Check if the booked count is greater than 0
        if ($bookedVehicle->booked_count > 0) {
            // Decrease booked count
            $bookedVehicle->booked_count--;
            $bookedVehicle->save();

            // Increase available count
            $vehicle->available_count++;
            $vehicle->save();
        }

        return redirect()->back()->with('success', 'Vehicle booking decremented successfully.');
    }

    public function cancel(Request $request, $id)
    {
        $bookedVehicle = BookedVehicle::findOrFail($id);

        // Get the associated vehicle
        $vehicle = Vehicle::findOrFail($bookedVehicle->vehicle_id);

        // Increase the available count
        $vehicle->available_count += $bookedVehicle->booked_count;
        $vehicle->save();

        // Delete the booked vehicle
        $bookedVehicle->delete();

        return redirect()->back()->with('success', 'Vehicle booking canceled successfully.');
    }
}
