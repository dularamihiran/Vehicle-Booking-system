<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\BookedVehicle;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Main Dashboard (Default View)
    public function index()
    {
        // Fetch all vehicles
        $vehicles = Vehicle::all();

        // Fetch the logged-in user's booked vehicles
        $userBookedVehicles = BookedVehicle::where('user_id', Auth::id())->get();

        // Pass data to the dashboard view
        return view('dashboard', compact('vehicles', 'userBookedVehicles'));
    }

    // Show Available Vehicles
    public function availableVehicles()
    {
        // Fetch all available vehicles
        $vehicles = Vehicle::all();

        // Pass data to the available vehicles view
        return view('dashboard.available', compact('vehicles'));
    }

    // Show Booked Vehicles
    public function bookedVehicles()
    {
        // Fetch the logged-in user's booked vehicles
        $userBookedVehicles = BookedVehicle::where('user_id', Auth::id())->get();

        // Pass data to the booked vehicles view
        return view('dashboard.booked', compact('userBookedVehicles'));
    }
}
