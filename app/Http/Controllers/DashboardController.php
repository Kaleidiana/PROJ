<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Method to show the dashboard
    public function index()
    {
        // Fetch all cars from the database
        $cars = Car::all();

        // Return the admin car management view
        return view('cars.index', compact('cars'));
    }
}
