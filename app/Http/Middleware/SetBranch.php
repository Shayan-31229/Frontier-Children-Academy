<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SetBranch
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            // If user is not super-admin, force their branch_id
            if (!auth()->user()->hasRole('super-admin')) {
                session(['active_branch_id' => auth()->user()->branch_id]);
            } else {
                // For super-admin, keep whatever is in session or default null
                if (!Session::has('active_branch_id')) {
                    session(['active_branch_id' => null]);
                }
            }
        }

        return $next($request);
    }
}
