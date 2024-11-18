<?php
// app/Http/Controllers/OrderController.php

// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Car;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Store the order details (POST request)
    public function store(Request $request, Car $car)
    {
        // Validate the incoming order data
        $request->validate([
            'user_id' => 'required|exists:users,id', // Validate that user exists
            'car_id' => 'required|exists:cars,id',  // Validate that car exists
            'quantity' => 'required|integer|min:1', // Validate quantity
        ]);

        // Calculate the total price (assumes `car` model has a `price` attribute)
        $totalPrice = $car->price * $request->quantity; // Total price is based on quantity

        // Create the order in the database
        Order::create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'car_id' => $car->id,
            'quantity' => $request->quantity, // Store the quantity of cars ordered
            'total_price' => $totalPrice,
            'status' => 'pending', // Default status
        ]);

        // Redirect or return success message
        return redirect()->route('cars.show', $car)->with('success', 'Order placed successfully!');
    }

    // Other methods for the controller (show, update, delete) can be added here if needed
}
