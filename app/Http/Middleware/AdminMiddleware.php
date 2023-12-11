<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->User()->role === 'Admin') {
            return $next($request);
        }

        abort(403, 'ACCÈS NON AUTORISE.');
    }
}
