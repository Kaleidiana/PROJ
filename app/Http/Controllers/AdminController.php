<?php

namespace App\Http\Controllers;

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Car;  // Make sure to import the Car model

class AdminController extends Controller
{
    // Dashboard method
    public function dashboard()
    {
        $cars = Car::all();  // Fetch all cars, you can customize this as needed
        return view('admin.dashboard', compact('cars'));  // Pass the cars to the view
    }
}

