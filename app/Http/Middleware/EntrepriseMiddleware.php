<?php

namespace App\Http\Middleware;

use Closure;

class EntrepriseMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->User()->role === 'Entreprise') {
            return $next($request);
        }

        abort(403, 'ACCÈS NON AUTORISE.');
    }
}
