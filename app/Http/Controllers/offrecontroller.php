<?php

namespace App\Http\Controllers;

use App\Models\offre;
use Illuminate\Http\Request;


class offrecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offre = offre::all();
        return view('offre.index',['offre'=>$offre ] );

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
            'titre' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        switch ($data['type']) {
            case 'CDI':
                $data['ref_type'] = '1';
                break;
            case 'CDD':
                $data['ref_type'] = '2';
                break;
            case 'apprentissage':
                $data['ref_type'] = '3';
                break;
            case 'stage':
                $data['ref_type'] = '4';
                break;
            default:
                $data['ref_type'] = '';
                break;
        }

        $newOffre = Offre::create($data);

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
        return view('offre.edit',['offre'=>$offre] );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(offre $offre, Request $request){
        $data = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'type' => 'required',
            'etat' => 'required'

        ]);

        switch ($data['type']) {
            case 'CDI':
                $data['ref_type'] = '1';
                break;
            case 'CDD':
                $data['ref_type'] = '2';
                break;
            case 'apprentissage':
                $data['ref_type'] = '3';
                break;
            case 'stage':
                $data['ref_type'] = '4';
                break;
            default:
                $data['ref_type'] = '';
                break;
        }

        $offre->update($data);

        return redirect(route('offre.index'))->with('confirmation', 'Offre bien modifié!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(offre $offre){
        $offre->delete();
        return redirect(route('offre.index'))->with('confirmation', 'Offre bien supprimé !');
    }

}
