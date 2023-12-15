<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\offrecontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/testco', function () {
    try {
        DB::connection()->getPdo();
        return "Connexion à la base de données établie avec succès!";
    } catch (\Exception $e) {
        return "Erreur de connexion à la base de données : " . $e->getMessage();
    }
});



Route::prefix('/evenement')->name('evenement.')->controller(\App\Http\Controllers\EvenementController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create',  'create')->name('create');
    Route::post('/',  'store')->name('store');
    Route::get('/{evenement}/edit',  'edit')->name('edit');
    Route::put('/{evenement}/update', 'update')->name('update');
    Route::delete('/{evenement}/destroy',  'destroy')->name('destroy');
});

Route::prefix('/salle')->name('salle.')->controller(\App\Http\Controllers\SalleController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create',  'create')->name('create');
    Route::post('/',  'store')->name('store');
    Route::get('/{salle}/edit',  'edit')->name('edit');
    Route::put('/{salle}/update', 'update')->name('update');
    Route::delete('/{salle}/destroy',  'destroy')->name('destroy');
});

Route::middleware(['auth', 'Entreprise', 'valideUser'])->group(function () {

    Route::prefix('/rdv')->name('rdv.')->controller(\App\Http\Controllers\RdvController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{rdv}/edit', 'edit')->name('edit');
        Route::get('/{rdv}/update', 'upadate')->name('update');
        Route::delete('/{rdv}/destroy', 'destroy')->name('destroy');
    });
});

// gestion d'offre par l'entreprise

Route::middleware(['auth', 'Entreprise', 'valideUser'])->group(function () {

    Route::view('/entreprise/dashboard', 'entreprise.dashboard')->name('entreprise.dashboard');


    Route::get('/entreprise/gestionoffre', [OffreController::class, 'index'])->name('entreprise.gestionoffre');
    Route::get('/entreprise/offre/{offre}/candidatures', [\App\Http\Controllers\candidaturecontroller::class, 'viewcandidature'])->name('entreprise.viewcandidature');
    Route::get('/entreprise/createoffre', [OffreController::class, 'create'])->name('entreprise.createoffre');
    Route::post('/entreprise/storeoffre', [OffreController::class, 'store'])->name('entreprise.offre.store');
    Route::get('/entreprise/editoffre/{offre}', [OffreController::class, 'edit'])->name('entreprise.editoffre');
    Route::put('/entreprise/updateoffre/{offre}', [OffreController::class, 'update'])->name('entreprise.offre.update');
    Route::delete('/entreprise/destroyoffre/{offre}', [OffreController::class, 'destroy'])->name('entreprise.offre.destroy');
});

//gestion d'offre par l'admin
Route::middleware(['auth', 'Admin', 'valideUser'])->group(function () {

    Route::get('/admin/agestionoffre', [offrecontroller::class, 'index'])->name('admin.gestionoffre');
    Route::get('/admin/acreateoffre', [offreController::class, 'create'])->name('admin.acreateoffre');
    Route::post('/admin/storeoffre', [OffreController::class, 'store'])->name('admin.offre.store');
    Route::get('/admin/offres/{offre}/edit', [offrecontroller::class, 'edit'])->name('admin.aeditoffre');
    Route::put('/admin/updateoffre/{offre}', [offreController::class, 'update'])->name('admin.offre.update');
    Route::delete('/admin/offres/{offre}', [offrecontroller::class, 'destroy'])->name('admin.offre.destroy');
});

//candidature etudiant
Route::middleware(['auth', 'Etudiant', 'valideUser'])->group(function () {
    Route::get('/etudiant/offres', [\App\Http\Controllers\candidaturecontroller::class, 'viewoffre'])->name('etudiant.offres');
    Route::get('/etudiant/offres/{id}', [\App\Http\Controllers\candidaturecontroller::class, 'viewdetailoffre'])->name('etudiant.detailoffre');
    Route::post('/etudiant/candidater/{offre}', [\App\Http\Controllers\candidaturecontroller::class, 'candidater'])->name('etudiant.candidater');
});



//gestion de type par l'admin
Route::middleware(['auth', 'Admin', 'valideUser'])->group(function () {
    Route::get('/admin/adashboard', function () { return view('admin/adashboard');});
    Route::get('/admin/gestiontype', function () { return view('admin/gestiontype');});
    Route::put('/types/{type}/valider', [\App\Http\Controllers\TypeController::class, 'valider'])->name('types.valider');
    Route::delete('/types/{type}', [\App\Http\Controllers\TypeController::class, 'destroy'])->name('types.destroy');
    Route::put('/types/{type}/valider', [\App\Http\Controllers\typecontroller::class, 'valider'])->name('types.valider');
    Route::delete('/types/{type}/destroy', [\App\Http\Controllers\typecontroller::class, 'destroy'])->name('types.destroy');
    Route::delete('types/{type}/delete', [\App\Http\Controllers\typecontroller::class, 'delete'])->name('types.delete');
    Route::get('types/{type}/assign-new-type', [\App\Http\Controllers\typecontroller::class, 'assignNewType'])->name('types.assignNewType');
    Route::delete('types/{type}/delete-offers', [\App\Http\Controllers\typecontroller::class, 'deleteOffers'])->name('types.deleteOffers');
    Route::get('/admin/createtype', [\App\Http\Controllers\typecontroller::class, 'create'])->name('types.create');
    Route::post('/admin/createtype', [\App\Http\Controllers\typecontroller::class, 'store'])->name('types.store');
    Route::get('/admin/gestiontype', [\App\Http\Controllers\typecontroller::class, 'index'])->name('admin.gestiontype');
    Route::get('/admin/attributionnewtype/{type}', [\App\Http\Controllers\typecontroller::class, 'attributionNewType'])
        ->name('types.attributionnewtype');
    Route::post('/admin/attributionnewtype/{type}', [\App\Http\Controllers\typecontroller::class, 'processAttributionNewType'])
        ->name('types.process-attributionnewtype');
    Route::post('/admin/attributionnewtype/{type}', [\App\Http\Controllers\typecontroller::class, 'processAttributionNewType'])
        ->name('types.process-attributionnewtype');

});

//gestion d'evenement et salle
Route::middleware(['auth', 'Admin', 'valideUser'])->group(function () {
    Route::get('/admin/gestionevent', function () {return view('admin.gestionevent');})->name('admin.gestionevent');

    Route::post('/admin/evenements/{evenement}/attribuer-salle', [\App\Http\Controllers\EvenementController::class, 'attribuerSalle'])->name('admin.attribuerSalle');
    Route::get('/admin/createsalle', [\App\Http\Controllers\SalleController::class, 'create'])->name('admin.createsalle');
    Route::post('/admin/createsalle', [\App\Http\Controllers\SalleController::class, 'store'])->name('admin.enregistrerSalle');
    Route::get('/admin/gestionsalle', [\App\Http\Controllers\SalleController::class, 'index'])->name('admin.gestionsalle');
    Route::get('/admin/salle/{salle}/edit', [\App\Http\Controllers\SalleController::class, 'edit'])->name('admin.editsalle');
    Route::put('/admin/salle/{salle}/update', [\App\Http\Controllers\SalleController::class, 'update'])->name('admin.updateSalle');
});



//gestion d'utilisateur
Route::middleware(['auth', 'Admin', 'valideUser'])->group(function () {
    Route::get('/admin/createuser', [\App\Http\Controllers\AdminController::class, 'createUser'])->name('createuser');
    Route::post('/admin/createuser', [\App\Http\Controllers\AdminController::class, 'storeUser'])->name('storeuser');
    Route::delete('/admin/destroyuser/{user}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroyuser');
    Route::get('/admin/createadmin', [\App\Http\Controllers\AdminController::class, 'createAdmin'])->name('createadmin');
    Route::post('/admin/index', [\App\Http\Controllers\AdminController::class, 'storeAdmin'])->name('storeadmin');
    Route::get('/admin/index', [\App\Http\Controllers\AdminController::class, 'searchUser'])->name('admin.searchuser');
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin', [\App\Http\Controllers\EvenementController::class, 'admin_index'])->name('admin.index');
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'show'])->name('admin.index');
    Route::post('/admin', [\App\Http\Controllers\AdminController::class, 'valider_user'])->name('admin.valider_user');
    Route::get('/admin/searchuser', [\App\Http\Controllers\AdminController::class, 'searchUser'])->name('admin.searchuser');

});

Route::middleware(['auth', 'Admin', 'valideUser'])->group(function () {
    Route::get('/admin/agestionoffre', [offrecontroller::class, 'index'])->name('admin.gestionoffre');
    Route::get('/admin/index', [\App\Http\Controllers\AdminController::class, 'show'])->name('admin.user');


});


Route::middleware(['auth', 'Etudiant', 'valideUser'])->group(function () {

    Route::get('/etudiant/evenements', [\App\Http\Controllers\EvenementController::class, 'showevenement'])->name('etudiant.evenement');
    Route::get('/etudiant/evenements/{id}/details', [\App\Http\Controllers\EvenementController::class, 'detailEvenement'])->name('etudiant.detailEvenement');
    Route::post('/etudiant/evenements/{evenement}/inscrire', [\App\Http\Controllers\EvenementController::class, 'inscrireEvenement'])->name('etudiant.inscrireEvenement');
    Route::get('/etudiant/mesevenements', [\App\Http\Controllers\EvenementController::class, 'mesEvenements'])->name('etudiant.mesEvenements');
    Route::post('/etudiant/evenements/{evenement}/desinscrire', [\App\Http\Controllers\EvenementController::class, 'desinscrireEvenement'])->name('etudiant.desinscrireEvenement');
});

Route::get('/etudiant/dashboard', function () {
    return view('etudiant.dashboard');
})->name('etudiant.dashboard');





Route::view('/home_n', 'home_n')->name('home_n');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(\App\Http\Middleware\connexion::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



