<?php

namespace App\Http\Controllers;

use App\Models\type;
use App\Models\offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class typecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = type::all();
        return view('admin.gestiontype', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function valider($id)
    {
        try {
            $type = Type::findOrFail($id);
            $type->update(['valide' => 1]);

            session()->flash('success', 'Le type a été validé avec succès.');

            return redirect()->back();
        } catch (\Exception $e) {
            // Ajoutez cette ligne pour afficher les erreurs
            dd($e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            // Récupérer le type
            $type = Type::findOrFail($id);

            // Vérifier s'il y a des offres associées
            if ($type->offres->count() > 0) {
                // Si des offres sont associées, afficher la vue avec les options
                return view('admin.confirm-delete', compact('type'));
            }

            // Supprimer le type
            $type->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Le type a été supprimé avec succès.');
        } catch (Exception $e) {
            DB::rollback();

            $errorMessage = $e->getMessage();

            // Autre erreur
            return redirect()->back()->withErrors(['error' => $errorMessage]);
        }
    }



    public function deleteOffers($id)
    {
        try {
            DB::beginTransaction();

            // Récupérer le type
            $type = Type::findOrFail($id);

            // Supprimer les offres associées au type
            Offre::where('ref_type', $type->id)->delete();
            $type->delete();


            DB::commit();

            return redirect()->route('admin.gestiontype')->with('success', 'Les offres associées au type ont été supprimées avec succès.');
        } catch (Exception $e) {
            DB::rollback();

            $errorMessage = $e->getMessage();

            // Autre erreur
            return redirect()->back()->withErrors(['error' => $errorMessage]);
        }
    }

    public function attributionNewType(Type $type)
    {
        // Récupérer tous les types valides
        $types = Type::where('valide', true)->get();

        // Charger la vue avec le type actuel et la liste des types valides
        return view('admin.attributionnewtype', compact('type', 'types'));
    }


    public function processAttributionNewType(Type $type, Request $request)
    {
        try {
            DB::beginTransaction();

            // Récupérer le nouveau type sélectionné
            $nouveauType = $request->input('nouveauType');

            // Mettre à jour toutes les offres liées au type actuel
            Offre::where('ref_type', $type->id)
                ->update(['ref_type' => $nouveauType]);

            DB::commit();

            return redirect()->route('admin.gestiontype')->with('success', 'Les offres associées ont été attribuées au nouveau type avec succès.');
        } catch (\Exception $e) {
            DB::rollback();

            $errorMessage = $e->getMessage();

            return redirect()->back()->withErrors(['error' => $errorMessage]);
        }
    }
















    public function create()
    {
        return view('admin.createtype');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'libelle' => 'required|string|max:255',
            'valide' => 'nullable|boolean',
        ]);

        // Création du type
        Type::create([
            'libelle' => $request->input('libelle'),
            'valide' => $request->input('valide', 0),
        ]);

        return redirect()->route('admin.gestiontype')->with('success', 'Le type a été ajouté avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(type_offre $type_offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(type $type_offre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, type $type_offre)
    {
        //
    }


}
