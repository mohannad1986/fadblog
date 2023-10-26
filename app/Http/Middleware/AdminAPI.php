<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAPI
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */



     public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated as an admin
        if (Auth::guard('api')->check()) {
            // User is authenticated as an admin, proceed with the request
            return $next($request);
        }

        // User is not authenticated as an admin, return unauthorized response
        return response()->json(['error' => 'Unauthorized'], 401);
    }

}

