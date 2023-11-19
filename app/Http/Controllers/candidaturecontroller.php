<?php

namespace App\Http\Controllers;
use App\Models\Candidature;
use App\Models\etudiant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use App\Models\offre;
use App\Models\type;


use Illuminate\Http\Request;


class candidaturecontroller extends Controller
{

    public function viewoffre()
    {
        $offre = Offre::with('type')->get();
        $types = Type::all();


        return view('etudiant.offres', ['offre' => $offre, 'types' => $types]);
    }

    public function viewdetailoffre($id)
    {
        $offre = Offre::findOrFail($id); // Utilisez findOrFail pour gérer les cas où l'offre n'est pas trouvée
        return view('etudiant.detailoffre', compact('offre'));
    }



    

    public function candidater($offre)
    {
        // Récupérez l'ID de l'utilisateur connecté
        $ref_user = Auth::id();

        // Vérifiez si l'utilisateur est un étudiant
        $etudiant = Etudiant::where('ref_user', $ref_user)->first();

        if (!$etudiant) {
            // L'utilisateur n'est pas un étudiant
            // Gérez cette situation en renvoyant un message d'erreur, en redirigeant, etc.
            return redirect()->route('etudiant.offres')->with('error', 'Vous devez être un étudiant pour candidater.');
        }

        // L'utilisateur est un étudiant, vous pouvez continuer à créer la candidature
        Candidature::create([
            'ref_etudiant' => $etudiant->id,
            'ref_offre' => $offre,
        ]);

        // Redirigez l'utilisateur avec un message de succès
        return redirect()->route('etudiant.offres')->with('success', 'Candidature soumise avec succès!');
    }











}

