<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;

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

Route::get('/a-propos',function(){
    return "A propos";
});

Route::get('/nous-contacter',function(){
    return "Nous contacter";
});

Route::get('/utilisateurs/index',[UtilisateurController::class, 'index']);
Route::get('/utilisateurs/create',[UtilisateurController::class, 'create'])->name('utilisateurs.create');
Route::get('/utilisateurs/destroy',[UtilisateurController::class, 'destroy'])->name('utilisateurs.destroy');
Route::get('/utilisateurs/show',[UtilisateurController::class, 'show'])->name('utilisateurs.show');
Route::get('/utilisateurs/edit',[UtilisateurController::class, 'edit'])->name('utilisateurs.edit');




/*********  INCRIPTION  *********/

//Route::get('/inscription', 'App\Http\Controllers\UtilisateurController@form_register');

Route::get('/inscription', [UtilisateurController::class, 'form_register']);

Route::post('/inscription/traitement', [UtilisateurController::class, 'traitement_register']);


/*********  CONNECTION *********/

//Route::get('/connection', 'App\Http\Controllers\UtilisateurController@form_connection');

Route::get('/connection', [UtilisateurController::class, 'form_connection']);
Route::post('/connection/traitement', [UtilisateurController::class, 'traitement_connection']);


/***************************** */

Route::get('/administrateur', 'App\Http\Controllers\AdminController@index');

Route::get('/article', 'App\Http\Controllers\ArticleController@index');


