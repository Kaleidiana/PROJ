<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayPalController;

use Illuminate\Support\Facades\Route;

// Route for the homepage for unauthenticated users
Route::get('/', function () {
    return view('welcome'); // You can return a generic welcome page for unauthenticated users
})->name('home');

// Route for the admin dashboard
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'admin']) // Ensure the user is authenticated and an admin
    ->name('admin.index');

// Route for the dashboard (user dashboard)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth') // Only authenticated users can access the dashboard
    ->name('dashboard');

// Group routes for admin section
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Route for the admin cars management (CRUD)
    Route::resource('cars', CarController::class);
});

// Group routes that require authentication (for regular users)
Route::middleware('auth')->group(function () {
    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route for the homepage (for authenticated users)
    Route::get('/home', [PageController::class, 'home'])->name('home'); // Authenticated users' homepage

    // Route for the About Us page
    Route::get('/about', [PageController::class, 'about'])->name('about');

    // Route for the Services page
    Route::get('/services', [PageController::class, 'services'])->name('services');

    // Route for the Contact Us page
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

    //Routes for PAYPAL

    Route::get('/paypal/payment', [PayPalController::class, 'createPayment'])->name('paypal.payment');
    Route::get('/paypal/execute', [PayPalController::class, 'executePayment'])->name('paypal.execute');
    Route::get('/paypal/cancel', [PayPalController::class, 'cancelPayment'])->name('paypal.cancel');

    //Routes for ordering
    // Route to view a single car's details
    Route::get('cars/{car}', [CarController::class, 'show'])->name('cars.show');

    Route::get('/car/{car}', [CarController::class, 'show'])->name('car.details');
    Route::get('/order/{car}', [OrderController::class, 'create'])->name('order.car');
    // Order Route


    // Store the order details (POST request)
    Route::post('/order/{car}', [OrderController::class, 'store'])->name('order.store');


});

// Include authentication routes
require __DIR__.'/auth.php';
