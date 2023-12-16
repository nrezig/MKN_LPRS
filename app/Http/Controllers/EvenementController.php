<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Etudiant;
use App\Models\evenement;
use App\Models\Inscription;
use App\Models\salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class EvenementController extends Controller
{
    // routes functions
    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evenement.create');
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Evenement $evenement)
    {
        return view('evenement.edit',['evenement'=>$evenement] );

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenement = Evenement::all();
        return view('evenement.index',['evenement'=>$evenement ]);
    }
    public function admin_index()
    {
        $evenement = Evenement::all();
        return view('admin.index',['evenement'=>$evenement] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date' => 'required',
            'heure' => 'required',
            'duree' => 'required'
        ]);

        $data['ref_users'] = Auth::id();

        $event = Evenement::create($data);

        return redirect('etudiant/evenements')->with('success', 'Événement créé, en attente de validation');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Evenement $evenement, Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date' => 'required',
            'heure' => 'required',
            'duree'=>'required'
        ]);
        $evenement->update($data);

        return redirect(route('evenement.index'))->with('confirmation', 'Evenement a bien été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect(route('evenement.index'))->with('confirmation', 'Evenement a bien été supprimé !');
    }

    public function showevenement()
    {
        $user = Auth::user();

        $evenements = Evenement::with('salle')->get();
        $salles = Salle::all();

            return view('etudiant.evenements', compact('evenements', 'salles'));

    }

    public function detailEvenement($id)
    {
        $evenement = Evenement::find($id);
        return view('etudiant.detailEvenement', ['evenement' => $evenement]);
    }

    public function inscrireEvenement(Request $request, $evenementId)
    {
        $userId = auth()->user()->id;
        $etudiantId = Etudiant::where('ref_user', $userId)->first()->id;

        $dejaInscrit = Inscription::where('ref_etudiant', $etudiantId)->where('ref_evenement', $evenementId)->exists();

        if ($dejaInscrit) {
            return redirect()->route('etudiant.evenement')->with('error', 'Déjà inscrit');

        }

        Inscription::create([
            'ref_etudiant' => $etudiantId,
            'ref_evenement' => $evenementId
        ]);

        return redirect()->route('etudiant.evenement')->with('success', 'Inscription réussie !');
    }

    public function mesEvenements()
    {
        $userId = auth()->user()->id;
        $etudiantId = Etudiant::where('ref_user', $userId)->first()->id;

        $evenementsInscrits = Inscription::where('ref_etudiant', $etudiantId)
            ->with('evenement')
            ->get()
            ->pluck('evenement');

        return view('etudiant.mesEvenements', ['evenements' => $evenementsInscrits]);
    }

    public function desinscrireEvenement($evenementId)
    {
        $userId = auth()->user()->id;
        $etudiantId = Etudiant::where('ref_user', $userId)->first()->id;

        Inscription::where('ref_etudiant', $etudiantId)
            ->where('ref_evenement', $evenementId)
            ->delete();

        return redirect()->route('etudiant.mesEvenements')->with('success', 'Désinscription réussie.');
    }


    public function validerEvenement($evenementId)
    {
        $evenement = Evenement::findOrFail($evenementId);
        $evenement->valide = true;
        $evenement->save();

        return redirect()->route('admin.evenement')->with('success', 'Événement validé avec succès.');
    }











    public function attribuerSalle(Request $request, $evenementId)
    {
        $evenement = Evenement::find($evenementId);
        $evenement->ref_salle = $request->salle_id;
        $evenement->save();

        return redirect('admin/gestionevent')->with('success', 'Salle attribuée avec succès');
    }





}
