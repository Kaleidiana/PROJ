<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Property;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['property', 'user'])->get();
        // If you need to use properties in the index view, fetch them here
        $properties = Property::all(); // Add this line if required

        return view('appointments.index', compact('appointments', 'properties')); // Pass properties here if required
    }

    public function create()
    {
        $properties = Property::all();
        return view('appointments.create', compact('properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'user_id' => 'required|exists:users,id',
            'appointment_time' => 'required|date',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $properties = Property::all();
        return view('appointments.edit', compact('appointment', 'properties'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'user_id' => 'required|exists:users,id',
            'appointment_time' => 'required|date',
        ]);

        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
