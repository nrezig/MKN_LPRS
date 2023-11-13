<?php

namespace App\Http\Controllers;

use App\Models\evenement;
use Illuminate\Http\Request;


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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data=$request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date' => 'required',
            'heure'=>'duree',
             auth()->user()->id=>'required'
        ]);
         $newEvent = Evenement::create($data);
        return redirect(route('evenement.index'));
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

}
