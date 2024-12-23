<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookVehicleController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

// Welcome Page Route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route with Middleware (auth and verified)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])  // Ensures the user is authenticated and verified
    ->name('dashboard');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    // Profile Management Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Vehicle Booking and Cancellation Routes
    Route::post('book/{vehicle}', [BookVehicleController::class, 'book'])->name('vehicles.book');

    // Increment and Decrement Booked Vehicle Count
    Route::put('/vehicles/{id}/increment', [VehicleController::class, 'increment'])->name('vehicles.increment');
    Route::put('/vehicles/{id}/decrement', [VehicleController::class, 'decrement'])->name('vehicles.decrement');


    // Cancel Booked Vehicle
    Route::post('/vehicles/{id}/cancel', [VehicleController::class, 'cancel'])->name('vehicles.cancel');
});

// Include Auth Routes (like login, registration, etc.)
require __DIR__.'/auth.php';
