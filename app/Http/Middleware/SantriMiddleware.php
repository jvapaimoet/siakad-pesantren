<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SantriMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check() || Auth::user()->role !== 'santri') {
            abort(403, 'Akses khusus santri.');
        }

        return $next($request);
    }
}
