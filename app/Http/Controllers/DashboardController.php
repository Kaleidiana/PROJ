<?php

namespace App\Http\Controllers;

use App\Models\Car; // Use the Car model to fetch car data
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Method to show the dashboard
    public function index()
    {
        // Fetch all cars from the database
        $cars = Car::all();

        // Return the dashboard view, passing the cars data
        return view('dashboard', compact('cars'));
    }
}
