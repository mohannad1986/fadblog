<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SingleSession
{
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('subscriber')->user();

        // Check if the user is already logged in on another device
        if ($user && $user->is_logged_in) {
            Auth::guard('subscriber')->logout();
            return redirect()->route('login')
                ->withErrors(['loginpage_subscriber' => 'You are already logged in on another device.']);
        }

        return $next($request);
    }
}
```
