<?php

namespace App\Http\Controllers;

use App\Models\offre;
use App\Models\type;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('admin.index', ['user' => $user]);
    }

    public function valider_user()
    {
        $user = User::all();
        $user->valide = 1;
        $user->save();
        return view('admin.index', ['user' => $user]);
    }

    public function show()
    {
        $user = User::all();
        return view('admin.index', ['user' => $user]);
    }

    public function destroy(User $user){
        $user->delete();
        return redirect(route('admin.index'))->with('confirmation', 'Utilisateur bien supprimé !');
    }

}

