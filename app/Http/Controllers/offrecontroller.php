<?php

namespace App\Http\Controllers;

use App\Models\offre;
use App\Models\type;
use Illuminate\Http\Request;


class offrecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offre = Offre::with('type')->get();
        $types = Type::all();


        return view('offre.index', ['offre' => $offre, 'types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all(); // Récupérez tous les types depuis la base de données

        return view('offre.create', ['types' => $types]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'type' => 'required', // Le champ 'type' est requis
        ]);

        $refType = $data['type'];

        // Si le champ 'type' est "other", créez un nouveau type
        if ($refType === 'other') {
            // Assurez-vous d'avoir un champ pour le nouveau type dans votre formulaire
            $newType = new Type([
                'libelle' => $request->input('new_type'),
                'valide' => 0,
            ]);

            $newType->save();

            // Utilisez l'ID du nouveau type créé
            $refType = $newType->id;
        }

        $newOffre = new Offre([
            'titre' => $data['titre'],
            'description' => $data['description'],
            'ref_type' => $refType, // Utilisez l'ID du type
        ]);

        $newOffre->save();

        return redirect(route('offre.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(offre $offre)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(offre $offre)
    {
        $types = Type::all();
        return view('offre.edit', ['offre' => $offre, 'types' => $types]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Offre $offre, Request $request)
    {
        $data = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'type' => 'required',
            'etat' => 'required'
        ]);

        $typeSelectionne = $data['type'];

        if ($typeSelectionne === 'other') {
            // Si l'utilisateur a sélectionné "Autre", créez un nouveau type
            $nouveauType = new Type([
                'libelle' => $request->input('new_type'),
                'valide' => true, // Vous pouvez définir la validation selon vos besoins
            ]);
            $nouveauType->save();

            // Associez l'offre au nouveau type
            $offre->type()->associate($nouveauType);
        } else {
            // Si l'utilisateur a sélectionné un type existant, mettez à jour le type actuel de l'offre
            $offre->type_id = $typeSelectionne;
        }

        // Mettez à jour les autres champs de l'offre
        $offre->titre = $data['titre'];
        $offre->description = $data['description'];
        $offre->etat = $data['etat'];

        $offre->save();

        return redirect(route('offre.index'))->with('confirmation', 'Offre bien modifiée!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(offre $offre){
        $offre->delete();
        return redirect(route('offre.index'))->with('confirmation', 'Offre bien supprimé !');
    }

}
