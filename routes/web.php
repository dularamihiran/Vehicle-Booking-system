<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookVehicleController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

// Main Welcome Page Route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard Route with Middleware (auth and verified)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin-specific Routes (Protected with 'admin' role)
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin Dashboard Route
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Example of an admin-only route (Add your admin-specific routes here)
    // Route::get('/admin/someadminroute', [AdminController::class, 'someMethod']);
});

// User-specific Routes (Protected with 'user' role)
Route::middleware(['auth', 'role:user'])->group(function () {
    // User Dashboard Route
    Route::get('/user/dashboard', [DashboardController::class, 'index'])
        ->name('user.dashboard');

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

    // Routes for Available and Booked Vehicles Pages
    Route::get('/dashboard/available', [DashboardController::class, 'availableVehicles'])
        ->name('dashboard.available');
    Route::get('/dashboard/booked', [DashboardController::class, 'bookedVehicles'])
        ->name('dashboard.booked');

    // Cancel Booked Vehicle using DELETE Method
    Route::delete('/vehicles/{id}/cancel', [VehicleController::class, 'cancel'])->name('vehicles.cancel');
});

// Include Auth Routes (like login, registration, etc.)
require __DIR__.'/auth.php';
