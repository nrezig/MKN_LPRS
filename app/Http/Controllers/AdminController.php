<?php

namespace App\Http\Controllers;

use App\Models\offre;
use App\Models\type;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('admin.index', compact('user'));
    }

    public function valider_user(Request $request)
    {
        $user = User::find($request->input("id"));
        $user->update(['valide' => 1]);
        return back();
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

