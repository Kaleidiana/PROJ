<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    // Show the About Us page
    public function index()
    {
        // You can pass any data to the view, such as company information
        $companyInfo = [
            'name' => 'Awesome Company',
            'mission' => 'To provide top-notch services to our customers.',
            'history' => 'Founded in 2010, we have been serving clients worldwide.',
            'team' => [
                'Alice' => 'CEO',
                'Bob' => 'CTO',
                'Charlie' => 'Lead Developer',
            ],
        ];

        return view('about.index', compact('companyInfo'));
    }
}
