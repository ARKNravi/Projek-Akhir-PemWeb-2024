<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        return redirect()->route('admin.login');
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.dashboard'); // Redirect to dashboard on successful login
        }
    }
}