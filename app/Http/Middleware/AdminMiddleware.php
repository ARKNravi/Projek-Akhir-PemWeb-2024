<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }

    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.login');
        }
        return route('admin.login');
    }
}

}