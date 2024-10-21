<?php

// app/Http/Middleware/CheckRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role->name;
            Log::info("User Role: " . $userRole);

            if (in_array($userRole, $roles)) {
                Log::info("Role is valid, proceeding...");
                return $next($request);
            }
        }

        Log::info("Role is not valid, redirecting...");
        return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
    }
}
