<?php

namespace App\Http\Controllers;

use App\Models\BookedVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class BookedVehicleController extends Controller
{
    // Method to increment booked cars
    public function increment($id)
    {
        // Fetch the booked vehicle
        $bookedVehicle = BookedVehicle::findOrFail($id);

        // Fetch the corresponding vehicle to check 'available_count'
        $vehicle = $bookedVehicle->vehicle;

        // Ensure there are vehicles available to increment
        if ($vehicle->available_count > 0) {
            // Decrement the available count in the vehicles table
            $vehicle->decrement('available_count');

            // Increment a 'booked_count' in the booked_vehicles table
            // Add 'booked_count' to your database migration if not already added
            $bookedVehicle->increment('booked_count');

            // Save changes
            $vehicle->save();
            $bookedVehicle->save();

            return redirect()->route('dashboard')->with('success', 'Vehicle incremented successfully!');
        }

        return redirect()->route('dashboard')->with('error', 'No more vehicles available!');
    }
}
