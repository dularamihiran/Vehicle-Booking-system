<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\BookedVehicle;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all vehicles
        $vehicles = Vehicle::all();

        // Fetch the logged-in user's booked vehicles
        $userBookedVehicles = BookedVehicle::where('user_id', Auth::id())->get();

        // Pass data to the dashboard view
        return view('dashboard', compact('vehicles', 'userBookedVehicles'));
    }
}
