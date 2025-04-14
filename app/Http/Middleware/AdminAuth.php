<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the admin is authenticated using the 'admin' guard
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login'); // Redirect to the admin login page if not authenticated
        }

        return $next($request); // Proceed to the requested page if authenticated
    }
}


