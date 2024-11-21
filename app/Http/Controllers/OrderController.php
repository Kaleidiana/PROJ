<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    // Redirect to PayPal for payment
    public function create(Request $request, Car $car)
    {
        // Get PayPal credentials from env
        $paypalClientId = env('PAYPAL_CLIENT_ID');
        $paypalSecret = env('PAYPAL_SECRET');

        // Check if the credentials are valid
        if (is_null($paypalClientId) || is_null($paypalSecret)) {
            return redirect()->route('cars.index')->with('error', 'PayPal credentials are not set.');
        }

        // Get the quantity from the form submission
        $quantity = $request->input('quantity', 1); // Default to 1 if no quantity is provided
        $totalPrice = $car->price * $quantity;

        // PayPal API request to create a payment
        $paypalResponse = Http::withBasicAuth($paypalClientId, $paypalSecret)
            ->post('https://api-m.sandbox.paypal.com/v2/checkout/orders', [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    [
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => $totalPrice,
                        ],
                        'description' => "Order for car: {$car->carname}",
                    ],
                ],
                'application_context' => [
                    'return_url' => route('order.success', $car),
                    'cancel_url' => route('order.cancel'),
                ],
            ]);

        $responseData = $paypalResponse->json();

        if ($paypalResponse->successful()) {
            // Redirect the user to PayPal approval URL
            $approvalUrl = collect($responseData['links'])->firstWhere('rel', 'approve')['href'];
            return redirect($approvalUrl);
        } else {
            return redirect()->route('cars.index')->with('error', 'Unable to process payment at this time.');
        }
    }

    // Handle PayPal success callback
    public function success(Request $request, Car $car)
    {
        // Get the PayPal order ID from the query
        $paypalOrderId = $request->query('token'); // Ensure this is correct, might be 'orderID'

        // Capture the PayPal payment
        $paypalResponse = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))
            ->post("https://api-m.sandbox.paypal.com/v2/checkout/orders/{$paypalOrderId}/capture");

        // Check if PayPal response is successful
        if (!$paypalResponse->successful()) {
            \Log::error('PayPal response error: ', $paypalResponse->json());
            return redirect()->route('cars.index')->with('error', 'Unable to process payment at this time.');
        }

        // Get the quantity from the request to store in the order
        $quantity = $request->input('quantity', 1); // Default to 1 if no quantity is provided

        // Create the order in the database
        Order::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'quantity' => $quantity,
            'total_price' => $car->price * $quantity,
            'status' => 'completed',
        ]);

        // Redirect to order confirmation page
        return redirect()->route('orders.confirmation')->with('success', 'Payment successful! Your order is confirmed.');
    }

    // Handle PayPal cancel callback
    public function cancel()
    {
        return redirect()->route('cars.index')->with('error', 'Payment canceled.');
    }

    // Show checkout page for the car
    public function checkout(Car $car)
    {
        // Retrieve the order details (car, price, etc.)
        return view('orders.checkout', compact('car'));
    }

    // Show order confirmation page
    public function confirmation()
    {
        return view('orders.confirmation');  // Make sure to create this view
    }

    // New createOrder method for initiating order creation (if needed)
    public function createOrder(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Create a new order instance
        $order = Order::create([
            'user_id' => auth()->id(),
            'car_id' => $request->car_id,
            'quantity' => $request->quantity,
            'total_price' => Car::find($request->car_id)->price * $request->quantity,
            'status' => 'pending',
        ]);

        // Return response (can redirect or return data)
        return redirect()->route('orders.checkout', $order)->with('success', 'Order created successfully.');
    }
}
