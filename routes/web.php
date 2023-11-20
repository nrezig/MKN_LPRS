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


use App\Http\Controllers\CandidatureController;

// Afficher la liste des offres
Route::get('/etudiant/offres', [CandidatureController::class, 'viewoffre'])->name('etudiant.offres');

// Afficher les détails d'une offre
Route::get('/etudiant/offres/{id}', [CandidatureController::class, 'viewdetailoffre'])->name('etudiant.detailoffre');

// Candidater à une offre
Route::post('/etudiant/candidater/{offre}', [CandidatureController::class, 'candidater'])->name('etudiant.candidater');


Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/admin', [\App\Http\Controllers\EvenementController::class, 'admin_index'])->name('admin.index');
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'show'])->name('admin.index');
Route::post('/admin', [\App\Http\Controllers\AdminController::class, 'valider_user'])->name('admin.valider_user');

Route::view('/home_n', 'home_n')->name('home_n');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(\App\Http\Middleware\connexion::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


