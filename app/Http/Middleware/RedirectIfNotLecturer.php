<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotLecturer
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('pensyarah')->check()) {
            return redirect()->route('pensyarah.login');
        }

        return $next($request);
    }
}
