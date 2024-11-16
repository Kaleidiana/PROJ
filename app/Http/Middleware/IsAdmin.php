<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Ensure the user is authenticated and is an admin
        if (Auth::user() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Redirect if not an admin
        return redirect()->route('home')->with('error', 'You do not have admin access.');
    }
}
