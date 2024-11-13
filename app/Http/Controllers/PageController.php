<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Show the home page
    public function home()
    {
        return view('home');
    }

    // Show the About Us page
    public function about()
    {
        return view('about');
    }

    // Show the Services page
    public function services()
    {
        return view('services');
    }

    // Show the Contact Us page
    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
{
    // You can handle the form submission here, like sending an email or saving data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // Example: Send an email or save the message
    // Mail::to('admin@example.com')->send(new ContactFormMail($request->all()));

    return redirect()->route('contact')->with('success', 'Your message has been sent!');
}

}
