<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UstadzMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check() || Auth::user()->role !== 'ustadz') {
            abort(403, 'Akses khusus ustadz.');
        }

        return $next($request);
    }
}
