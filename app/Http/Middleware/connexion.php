<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class connexion
{
    public function handle(Request $request, Closure $next): RedirectResponse|\Illuminate\Routing\Redirector
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Vérifier si l'utilisateur a les propriétés 'valide' et 'role'
        if (!Auth::user()->has('valide') || !Auth::user()->has('role')) {
            return redirect('/login'); // Ou redirigez vers une page d'erreur, car les propriétés nécessaires ne sont pas présentes.
        }

        // Vérifier si l'utilisateur est valide
        if (Auth::user()->valide !== 1) {
            return redirect('/validencours'); // Rediriger vers la page pour les utilisateurs non valides
        }

        // Vérifier le rôle de l'utilisateur
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect('admin/adashboard');
        } elseif ($role === 'etudiant') {
            return redirect('/edashboard');
        }

        // Si aucun des cas ci-dessus n'est vérifié, continuez vers la route d'accueil
        return $next($request);
    }
}
