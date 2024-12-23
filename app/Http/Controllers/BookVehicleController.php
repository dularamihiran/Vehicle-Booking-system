<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\BookedVehicle;
use Illuminate\Http\Request;

class BookVehicleController extends Controller
{
    public function book(Vehicle $vehicle, Request $request)
    {
        // Check if the vehicle is available for booking
        if ($vehicle->available_count > 0) {
            // Create a new booking record for the authenticated user
            BookedVehicle::create([
                'user_id' => auth()->id(),
                'vehicle_id' => $vehicle->id,
                'booking_date' => now(),
            ]);

            // Decrease the available count for the vehicle
            $vehicle->decrement('available_count');

            return redirect()->route('dashboard')->with('status', 'Vehicle booked successfully!');
        }

        // If vehicle is not available
        return redirect()->route('dashboard')->with('error', 'Vehicle not available!');
    }

    public function cancel(Vehicle $vehicle, Request $request)
    {
        // Find the booking for the authenticated user and the specified vehicle
        $booking = BookedVehicle::where('vehicle_id', $vehicle->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($booking) {
            // Delete the booking record
            $booking->delete();

            // Optionally increment the vehicle's available count
            $vehicle->increment('available_count');

            return redirect()->route('dashboard')->with('status', 'Booking cancelled successfully!');
        }

        // Handle case where booking was not found
        return redirect()->route('dashboard')->with('error', 'Booking not found!');
    }
}
