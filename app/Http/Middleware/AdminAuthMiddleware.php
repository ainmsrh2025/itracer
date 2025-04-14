<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna saat ini adalah admin
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // Redirect jika tidak memiliki akses
        return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin.');
    }
}

