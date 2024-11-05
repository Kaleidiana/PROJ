<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController; // Import PropertyController
use App\Http\Controllers\AppointmentController; // Import AppointmentController
use App\Http\Controllers\DashboardController; // Import DashboardController
use Illuminate\Support\Facades\Route;

// Route for the homepage
Route::get('/', function () {
    return view('welcome');
});

// Route for the dashboard using the DashboardController
Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Group of routes that require authentication
Route::middleware('auth')->group(function () {
    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resourceful routes for properties
    Route::resource('/properties', PropertyController::class);

    // Routes for appointments
    Route::resource('/appointments', AppointmentController::class);
});

// Include authentication routes
require __DIR__.'/auth.php';
