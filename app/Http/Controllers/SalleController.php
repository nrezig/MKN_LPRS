<?php

namespace App\Http\Controllers;


use App\Models\salle;
use Illuminate\Http\Request;


class SalleController extends Controller
{
    // routes functions
    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createsalle');
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(salle $salle)
    {
        return view('admin.editsalle',['salle'=>$salle] );

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salle = salle::all();
        return view('admin.gestionsalle',['salle'=>$salle ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'nom' => 'required',
            'capacite' => 'required'
        ]);
        $data['disponibilite'] = 1;

        salle::create($data);
        return redirect('admin/gestionevent')->with('success', 'Salle créée avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(salle $salle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(salle $salle, Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'capacite' => 'required|integer',
        ]);

        $salle->nom = $data['nom'];
        $salle->capacite = $data['capacite'];
        $salle->disponibilite = 1;

        $salle->save();

        return redirect(route('admin.gestionsalle'))->with('confirmation', 'La salle a bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(salle $salle)
    {
        $salle->delete();
        return redirect(route('salle.index'))->with('confirmation', 'La salle a bien été supprimé !');
    }

}
