<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
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
            'carname' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);

        // Save the file and store the path
        $filePath = $request->file('image')->store('cars', 'public');

        // Save data to the database
        Car::create([
            'carname' => $request->carname,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $filePath,
        ]);

        return redirect()->route('cars.index')->with('success', 'Car details updated successfully');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'carname' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $car = Car::findOrFail($id);
        $car->carname = $request->carname;
        $car->price = $request->price;
        $car->description = $request->description;

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
            $car->image = $imagePath;
        }

        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }


    // Delete a car
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }

    
}
