<?php

namespace App\Http\Controllers;

use App\Models\candidature;
use App\Models\entreprise;
use App\Models\Offre;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class offrecontroller extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'Admin') {
            $offres = Offre::with(['type', 'entreprise'])->get();
            $types = Type::all();

            return view('admin.agestionoffre', ['offre' => $offres, 'types' => $types]);
        } elseif ($user->role === 'Entreprise') {
            $offres = $user->rep_entreprise->offres()->with('type')->get();
            $types = Type::all();

            return view('entreprise.gestionoffre', ['offre' => $offres, 'types' => $types]);
        }

        abort(403, 'Accès non autorisé');
    }

    public function create()
    {
        $user = Auth::user();
        $types = Type::all();

        if ($user->role === 'Admin') {
            return view('admin.acreateoffre', ['types' => $types]);
        } elseif ($user->role === 'Entreprise') {
            return view('entreprise.createoffre', ['types' => $types]);
        }

        abort(403, 'Accès non autorisé');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        $refType = $data['type'];

        if ($refType === 'other') {
            $newType = new Type([
                'libelle' => $request->input('new_type'),
                'valide' => 0,
            ]);

            $newType->save();
            $refType = $newType->id;
        }

        if ($user->role === 'Admin') {
            $entrepriseId = $request->input('ref_entreprise');

            $newOffre = new Offre([
                'titre' => $data['titre'],
                'description' => $data['description'],
                'ref_type' => $refType,
                'ref_entreprise' => $entrepriseId,
            ]);

            $newOffre->save();

            return redirect(route('admin.gestionoffre'));
        }

        elseif ($user->role === 'Entreprise') {
            $entrepriseId = $user->rep_entreprise->ref_entreprise;
            $newOffre = new Offre([
                'titre' => $data['titre'],
                'description' => $data['description'],
                'ref_type' => $refType,
                'ref_entreprise' => $entrepriseId,

            ]);

            $newOffre->save();

            return redirect(route('entreprise.gestionoffre'));
        }

        abort(403, 'Accès non autorisé');
    }

    public function edit(Offre $offre)
    {
        $user = Auth::user();
        $types = Type::all();

        if ($user->role === 'Admin') {
            return view('admin.aeditoffre', ['offre' => $offre, 'types' => $types]);
        } elseif ($user->role === 'Entreprise') {
            return view('entreprise.editoffre', ['offre' => $offre, 'types' => $types]);

        }

        abort(403, 'Accès non autorisé');
    }

    public function update(Offre $offre, Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'type' => 'required',
            'etat' => 'required',
        ]);

        $typeSelectionne = $data['type'];

        if ($typeSelectionne === 'other') {
            $nouveauType = new Type([
                'libelle' => $request->input('new_type'),
                'valide' => false,
            ]);

            $nouveauType->save();
            $offre->type()->associate($nouveauType);
        } else {
            $offre->ref_type = $typeSelectionne;
        }

        $offre->titre = $data['titre'];
        $offre->description = $data['description'];
        $offre->etat = $data['etat'];

        if ($user->role === 'Admin') {
            $offre->save();
            return redirect(route('admin.gestionoffre'))->with('confirmation', 'Offre bien modifiée!');

        } elseif ($user->role === 'Entreprise') {
            $offre->save();
            return redirect(route('entreprise.gestionoffre'))->with('confirmation', 'Offre bien modifiée!');
        }

        abort(403, 'Accès non autorisé');
    }

    public function destroy(Offre $offre)
    {
        $user = Auth::user();

        if ($user->role === 'Admin') {
            $offre->delete();
            return redirect(route('admin.gestionoffre'))->with('confirmation', 'Offre bien supprimée !');
        } elseif ($user->role === 'Entreprise') {
            $offre->delete();
            return redirect(route('entreprise.gestionoffre'))->with('confirmation', 'Offre bien supprimée !');
        }

        abort(403, 'Accès non autorisé');
    }


}
