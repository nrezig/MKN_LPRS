<?php

namespace App\Http\Controllers;

use App\Models\offre_emploi;
use Illuminate\Http\Request;


class offre_emploicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('offre.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre'=>'required',
            'description'=>'required',
            'type'=>'required',
            ]);

        $newOffre = offre_emploi::create($data);

        return redirect(route('offre.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(offre_emploi $offre_emploi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(offre_emploi $offre_emploi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, offre_emploi $offre_emploi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(offre_emploi $offre_emploi)
    {
        //
    }
}
