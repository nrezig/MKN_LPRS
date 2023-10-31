<?php

use Illuminate\Support\Facades\Route;
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





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



