<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $properties = Property::all();
        $appointments = Appointment::with('property', 'user')->get();

        return view('dashboard', compact('properties', 'appointments'));
    }
}

