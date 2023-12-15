<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\entreprise;
use App\Models\offre;
use App\Models\type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
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

    public function destroy(User $user)
    {
        try {
            DB::transaction(function () use ($user) {
                // Supprimer les relations spécifiques au rôle
                if ($user->role === 'Etudiant' && $user->etudiant) {
                    $user->etudiant()->delete();
                } elseif ($user->role === 'Entreprise' && $user->rep_entreprise) {
                    $user->rep_entreprise()->delete();
                } elseif ($user->role === 'Admin' && $user->admin) {
                    $user->admin()->delete();
                }

                $user->delete();
            });

            return redirect('admin/index')->with('confirmation', 'Utilisateur bien supprimé !');
        } catch (\Exception $e) {
            return redirect('admin/index')->with('error', 'Erreur lors de la suppression de l’utilisateur.');
        }
    }


    public function createUser()
    {
        return view('admin.createuser');
    }

    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
            'dom_etude' => 'nullable|string|max:500',
            'poste' => 'nullable|string|max:255',
            'entreprise' => $request->input('role') === 'Entreprise' ? 'required' : 'nullable',
            'nom_ent' => 'nullable|string|max:255',
            'adresse_ent' => 'nullable|string|max:255',
            'description_ent' => 'nullable|string|max:1000',
        ]);

        return DB::transaction(function () use ($validatedData) {
            $user = User::create([
                'nom' => $validatedData['nom'],
                'prenom' => $validatedData['prenom'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => $validatedData['role'],
                'valide' => 0,
            ]);

            if ($validatedData['role'] === 'Etudiant') {
                $user->etudiant()->create([
                    'domaine_etude' => $validatedData['dom_etude'],
                ]);
            } elseif ($validatedData['role'] === 'Entreprise') {
                $entrepriseId = null;

                if ($validatedData['entreprise'] === 'autre') {
                    $entreprise = Entreprise::create([
                        'nom' => $validatedData['nom_ent'],
                        'adresse' => $validatedData['adresse_ent'],
                        'description' => $validatedData['description_ent'],
                    ]);
                    $entrepriseId = $entreprise->id;
                } else {
                    $entrepriseId = $validatedData['entreprise'];
                }

                $user->rep_entreprise()->create([
                    'poste' => $validatedData['poste'],
                    'ref_entreprise' => $entrepriseId,
                ]);
            }

            return redirect('admin/index')->with('success', 'Utilisateur ajouté avec succès');
        });
    }


    public function createAdmin()
    {
        return view('admin.createadmin');
    }

    public function storeAdmin(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        DB::transaction(function () use ($validatedData) {
            $user = User::create([
                'nom' => $validatedData['nom'],
                'prenom' => $validatedData['prenom'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => 'Admin',
                'valide' => 1,
            ]);

            Admin::create([
                'ref_user' => $user->id,
            ]);
        });

        return redirect('/admin/index')->with('success', 'Administrateur ajouté avec succès');
    }


    public function searchUser(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nom', 'LIKE', '%' . $search . '%')
                    ->orWhere('prenom', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%');
            });
        }

        if ($request->has('type')) {
            $roles = $request->input('type');
            $query->whereIn('role', $roles);
        }

        $users = $query->get();

        return view('admin.index', compact('users'));
    }




}

