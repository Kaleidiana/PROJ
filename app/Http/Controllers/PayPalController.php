<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    public function createPayment()
    {
        $paypal = new PayPalClient;
        $paypal->setApiCredentials(config('paypal'));
        $response = $paypal->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "100.00" // Replace with dynamic amount
                    ]
                ]
            ]
        ]);

        if (isset($response['id'])) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route('home')->with('error', 'Something went wrong.');
    }

    public function executePayment(Request $request)
    {
        $paypal = new PayPalClient;
        $paypal->setApiCredentials(config('paypal'));
        $response = $paypal->capturePaymentOrder($request->query('token'));

        if ($response['status'] === 'COMPLETED') {
            // Save transaction details to the database
            return redirect()->route('home')->with('success', 'Payment successful.');
        }

        return redirect()->route('home')->with('error', 'Payment failed.');
    }

    public function cancelPayment()
    {
        return redirect()->route('home')->with('error', 'Payment cancelled.');
    }
}

