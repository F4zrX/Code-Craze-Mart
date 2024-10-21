<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_id == 1) { // Assuming 1 is the role_id for admin
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
    }
}
