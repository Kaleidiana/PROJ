<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    // Show the Services page
    public function index()
    {
        // You can define a list of services
        $services = [
            [
                'name' => 'Car Wash',
                'description' => 'We provide comprehensive car washing services, from exterior to interior cleaning.',
                'price' => '$20'
            ],
            [
                'name' => 'Oil Change',
                'description' => 'Get your oil changed with quality oils and filters for a smooth driving experience.',
                'price' => '$30'
            ],
            [
                'name' => 'Tire Change',
                'description' => 'We offer tire change services with premium brands for your car’s safety.',
                'price' => '$40'
            ],
            [
                'name' => 'Detailing',
                'description' => 'Full interior and exterior detailing to make your car look brand new.',
                'price' => '$100'
            ]
        ];

        // Returning the services view with the list of services
        return view('services', compact('services'));
    }
}
