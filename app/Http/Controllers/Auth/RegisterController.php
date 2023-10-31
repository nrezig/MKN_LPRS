<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\entreprise;
use App\Models\etudiant;
use App\Models\offre;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if(isset($data['dom_etude'])){
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dom_etude' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            ]);
         } else {
            return Validator::make($data, [
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'nom_ent' => ['required', 'string', 'max:255'],
                'adresse_ent' => ['required', 'string', 'max:255'],
                'description_ent' => ['required', 'string', 'max:255'],
                'role' => ['required'], ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if(isset($data['dom_etude'])){
            $User=User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'valide' => 0,
            'role' => $data['role'] ]);
        $User->etudiant()->create([
            'domaine_etude' => $data['dom_etude'],
        ]);
        } else {
            $User=User::create([
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'valide' => 0,
                'role' => $data['role'] ]);
            $User->entreprise()->create([
                'nom' => $data['nom_ent'],
                'adresse' => $data['adresse_ent'],
                'description' => $data['description_ent'],
            ]);
        }
        return $User;
    }
}
