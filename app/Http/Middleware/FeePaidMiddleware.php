<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class FeePaidMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        // Only check if the role is student
        if ($user && $user->role_id == 6) {  // adjust according to your role system
            if (!$user->fee_paid) {
                // Redirect to fee pending page
                return redirect()->route('fee.pending');
            }
        }

        return $next($request);
    }
}
