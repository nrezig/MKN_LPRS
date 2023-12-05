<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\offrecontroller;
use App\Http\Controllers\EtudiantController;

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

Route::prefix('/rdv')->name('rdv.')->controller(\App\Http\Controllers\RdvController::class)->group(function (){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
    Route::get('/{rdv}/edit', 'edit')->name('edit');
    Route::get('/{rdv}/update', 'upadate')->name('update');
    Route::delete('/{rdv}/destroy', 'destroy')->name('destroy');
});

Route::get('/offre', [\App\Http\Controllers\offrecontroller::class, 'index'])->name('offre.index');
Route::get('/offre/create', [\App\Http\Controllers\offrecontroller::class, 'create'])->name('offre.create');
Route::get('/offre/{offre}/edit', [\App\Http\Controllers\offrecontroller::class, 'edit'])->name('offre.edit');
Route::put('/offre/{offre}/update', [\App\Http\Controllers\offrecontroller::class, 'update'])->name('offre.update');
Route::delete('/offre/{offre}/destroy', [offrecontroller::class, 'destroy'])->name('offre.destroy');
Route::post('/offre/store', [\App\Http\Controllers\offrecontroller::class, 'store'])->name('offre.store');


Route::get('/etudiant/offres', [CandidatureController::class, 'viewoffre'])->name('etudiant.offres');

Route::get('/etudiant/offres/{id}', [CandidatureController::class, 'viewdetailoffre'])->name('etudiant.detailoffre');

Route::post('/etudiant/candidater/{offre}', [CandidatureController::class, 'candidater'])->name('etudiant.candidater');


Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/admin', [\App\Http\Controllers\EvenementController::class, 'admin_index'])->name('admin.index');
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'show'])->name('admin.index');
Route::post('/admin', [\App\Http\Controllers\AdminController::class, 'valider_user'])->name('admin.valider_user');

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

Route::view('/home_n', 'home_n')->name('home_n');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(\App\Http\Middleware\connexion::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


