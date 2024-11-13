<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController; // Add this import for the DashboardController
use App\Http\Controllers\PageController; // Add this import for the PageController
use Illuminate\Support\Facades\Route;

// Route for the homepage for unauthenticated users
Route::get('/', function () {
    return view('welcome'); // You can return a generic welcome page for unauthenticated users
})->name('home');

// Route for the admin dashboard
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('admin')
    ->name('admin.index');

// Route for the dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth') // Only authenticated users can access the dashboard
    ->name('dashboard');

// Route for managing cars (CRUD operations)
Route::resource('cars', CarController::class)
    ->middleware('auth'); // Only authenticated users can access these routes

// Group of routes that require authentication
Route::middleware('auth')->group(function () {
    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route for the homepage (for authenticated users)
    Route::get('/home', [PageController::class, 'home'])->name('home'); // Authenticated users' homepage

    // Route for the About Us page.
    Route::get('/about', [PageController::class, 'about'])->name('about');

    // Route for the Services page
    Route::get('/services', [PageController::class, 'services'])->name('services');

    // Route for the Contact Us page
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    // Route to handle contact form submission
    Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
});

// Include authentication routes
require __DIR__.'/auth.php';
