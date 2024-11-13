<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show the list of all cars
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    // Show the form to create a new car
    public function create()
    {
        return view('cars.create');
    }

    // Store a newly created car in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);

        $car = Car::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->file('image')->store('cars', 'public'),
        ]);

        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    // Show a specific car's details
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    // Show the form to edit the car
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    // Update the car information
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $car->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->hasFile('image') ? $request->file('image')->store('cars', 'public') : $car->image,
        ]);

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    // Delete a car
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
