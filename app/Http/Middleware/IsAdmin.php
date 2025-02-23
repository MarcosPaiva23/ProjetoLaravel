<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->access_level == 2) {
            return $next($request);
        }

        return redirect('/bands')->with('error', 'Access Unauthorized.');
    }
}
