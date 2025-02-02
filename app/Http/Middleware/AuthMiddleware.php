<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if there is a 'user' session
        if (!session()->has('user')) {
            // If no user in session, redirect to login page
            return redirect()->route('login');
        }

        // Allow the request to proceed if authenticated
        return $next($request);
    }
}
