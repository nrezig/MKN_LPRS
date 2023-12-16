<?php

namespace App\Http\Middleware;
use App\Http\Controllers\AdminController;


use Closure;

class ValideUserMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && !auth()->User()->valide) {
            return redirect('/erreur')->with('error', 'Votre compte n\'est pas valide.');
        }

        return $next($request);
    }
}
