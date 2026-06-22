<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestRedirect
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika user sudah authenticated, redirect ke dashboard sesuai role mereka
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
