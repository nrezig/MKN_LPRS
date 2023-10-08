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

Route::get('/offre', [\App\Http\Controllers\offrecontroller::class, 'index'])->name('offre.index');
Route::get('/offre/create', [\App\Http\Controllers\offrecontroller::class, 'create'])->name('offre.create');
Route::post('/offre', [\App\Http\Controllers\offrecontroller::class, 'store'])->name('offre.store');
Route::get('/offre/{offre}/edit', [\App\Http\Controllers\offrecontroller::class, 'edit'])->name('offre.edit');
Route::put('/offre/{offre}/update', [\App\Http\Controllers\offrecontroller::class, 'update'])->name('offre.update');
Route::delete('/offre/{offre}/destroy', [offrecontroller::class, 'destroy'])->name('offre.destroy');

