<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\offre_emploicontroller;

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

Route::get('/offre', [\App\Http\Controllers\offre_emploicontroller::class, 'index'])->name('offre.index');
Route::get('/offre/store', [\App\Http\Controllers\offre_emploicontroller::class, 'store'])->name('offre.store');



