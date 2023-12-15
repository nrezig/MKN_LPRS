<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\entreprise;
use App\Models\etudiant;
use App\Models\offre;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
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
                'role' => ['required'],
                'dom_etude' => ['string', 'max:500'],
                'dom_etude2' => ['string', 'max:500'],
            ]);
        } else {
            return Validator::make($data, [
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role' => ['required'],
                'poste' => ['required', 'string', 'max:255'],
            ]);
        }
    }

    protected function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => $data['role'],
                'valide' => 0,
            ]);

            if ($data['role'] == 'Etudiant') {
                $user->etudiant()->create([
                    'domaine_etude' => $data['dom_etude'],
                ]);
            } elseif ($data['role'] == 'Entreprise') {
                if ($data['entreprise'] == 'autre') {
                    $entreprise = Entreprise::create([
                        'nom' => $data['nom_ent'],
                        'adresse' => $data['adresse_ent'] ?? 'Adresse non spécifiée',
                        'description' => $data['description_ent'],
                    ]);
                    $entrepriseId = $entreprise->id;
                } else {
                    $entrepriseId = $data['entreprise'];

                }

                $user->rep_entreprise()->create([
                    'poste' => $data['poste'],
                    'ref_entreprise' => $entrepriseId,
                ]);
            }

            return $user;
        });
    }


    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();

        return redirect('/login')->with('success', 'Inscription réussie, veuillez vous connecter.');
    }






    /**
     * Create a new user instance after a valid registration.
     *
     *
     * @param array $data
     * @return \App\Models\User
     */
    /**protected function create(array $data)
    {
    if (isset($data['dom_etude'])) {
    $User = User::create([
    'nom' => $data['nom'],
    'prenom' => $data['prenom'],
    'email' => $data['email'],
    'password' => Hash::make($data['password']),
    'valide' => 0,
    'role' => $data['role']]);
    $User->etudiant()->create([
    'domaine_etude' =>$data['dom_etude'] == "autre" ? $data['dom_etude2']:$data['dom_etude'],
    ]);
    } else {
    $User=User::create([
    'nom' => $data['nom'],
    'prenom' => $data['prenom'],
    'email' => $data['email'],
    'password' => Hash::make($data['password']),
    'valide' => 0,
    'role' => $data['role'] ]);
    $User->rep_entreprise()->create([
    'poste' => $data['poste'],
    'role' => $data['role'],
    'ref_entreprise'=>$data['entreprise']
    ]);
    if($data['entreprise'] == "autre"){
    $nvEntreprise = new entreprise([
    'nom' => $data['nom_ent'],
    'adresse' => $data['adresse_ent'],
    'description' => $data['description_ent'],]);
    $nvEntreprise->save();
    $User->ref_entreprise()->associate($nvEntreprise);

    }else{
    $User->rep_entreprise->ref_entreprise=$data['entreprise'];
    $User->save();
    }
    }
    return $User;
    }**/
    public function showRegistrationForm()
    {
        $entreprise = Entreprise::all(); // Récupérez toutes les entreprises
        return view('auth.register', compact('entreprise'));
    }
}
/**
$User=User::create([
'nom' => $data['nom'],
'prenom' => $data['prenom'],
'email' => $data['email'],
'password' => Hash::make($data['password']),
'valide' => 0,
'role' => $data['role'] ]);

User->rep_entreprise()->create([
'poste' => $data['poste']]);

$User->rep_entreprise->entreprise()->create([
'nom' => $data['nom_ent'],
'adresse' => $data['adresse_ent'],
'description' => $data['description_ent'],]);
}

return $User;
 */
