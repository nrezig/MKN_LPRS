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
        return view('salle.create');
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(salle $salle)
    {
        return view('salle.edit',['salle'=>$salle] );

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salle = salle::all();
        return view('salle.index',['salle'=>$salle ]);
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

          salle::create($data);
        return redirect(route('salle.index'));
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
            'capacite' => 'required',
            'disponibilite' => 1
        ]);
        $salle->update($data);

        return redirect(route('salle.index'))->with('confirmation', 'La salle a bien été modifié!');
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
