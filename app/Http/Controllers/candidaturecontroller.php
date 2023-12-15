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

    public function viewoffre(Request $request)
    {
        $query = Offre::with(['type', 'entreprise']);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('titre', 'LIKE', '%' . $search . '%');
        }

        if ($request->has('type')) {
            $types = $request->input('type');
            $query->whereHas('type', function($q) use ($types) {
                $q->whereIn('libelle', $types);
            });
        }

        $offres = $query->get();

        return view('etudiant.offres', ['offres' => $offres]);
    }


    public function viewdetailoffre($id)
    {
        $offre = Offre::findOrFail($id);
        return view('etudiant.detailoffre', compact('offre'));
    }





    public function candidater($offre)
    {
        $ref_user = Auth::id();
        $etudiant = Etudiant::where('ref_user', $ref_user)->first();

        $candidatureExistante = Candidature::where('ref_etudiant', $etudiant->id)
            ->where('ref_offre', $offre)
            ->first();

        if ($candidatureExistante) {
            return redirect()->route('etudiant.offres')->with('error', 'Vous avez déjà candidaté à cette offre.');
        }

        Candidature::create([
            'ref_etudiant' => $etudiant->id,
            'ref_offre' => $offre,
        ]);

        return redirect()->route('etudiant.offres')->with('success', 'Candidature soumise avec succès!');
    }

    public function viewcandidature($offreId)
    {
        $candidatures = Candidature::where('ref_offre', $offreId)
            ->with(['etudiant.user'])
            ->get();

        $offre = Offre::find($offreId);

        return view('entreprise.viewcandidature', [
            'candidatures' => $candidatures,
            'offreNom' => $offre ? $offre->titre : 'Offre inconnue'
        ]);
    }














}

