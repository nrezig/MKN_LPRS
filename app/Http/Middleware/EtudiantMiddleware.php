<?php
namespace App\Http\Middleware;

use Closure;

class EtudiantMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->User()->role === 'Etudiant') {
            return $next($request);
        }

        abort(403, 'ACCÈS NON AUTORISE.');
    }
}

