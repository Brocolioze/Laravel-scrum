<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Auth\Middleware\Authenticate;

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




/* ******** ADMINISTRATION *********/
Route::group(['middleware' => 'auth'], function () {



Route::get('/utilisateurs/index',[UtilisateurController::class, 'index'])->name('utilisateurs.index');
Route::get('/utilisateurs/create',[UtilisateurController::class, 'create'])->name('utilisateurs.create');
Route::post('/utilisateurs/create',[UtilisateurController::class, 'store'])->name('utilisateurs.create');
Route::get('/utilisateurs/destroy',[UtilisateurController::class, 'destroy'])->name('utilisateurs.destroy');
Route::get('/utilisateurs/show/{utilisateur}',[UtilisateurController::class, 'show'])->name('utilisateurs.show');
Route::get('/utilisateurs/edit/{utilisateur}',[UtilisateurController::class, 'edit'])->name('utilisateurs.edit');
Route::patch('/utilisateurs/update/{utilisateur}',[UtilisateurController::class, 'update'])->name('utilisateurs.update');

Route::delete('/utilisateurs/delete/{utilisateur}',[UtilisateurController::class, 'destroy'])->name('utilisateurs.delete');

Route::get('/deconnexion', [UtilisateurController::class, 'deconnexion']);

});



/*********  INCRIPTION  *********/

//Route::get('/inscription', 'App\Http\Controllers\UtilisateurController@form_register');

Route::get('/inscription', [UtilisateurController::class, 'form_register']);

Route::post('/inscription/traitement', [UtilisateurController::class, 'traitement_register']);


/*********  CONNECTION *********/



Route::namespace('Auth')->group(function () {

//Route::get('/connection', 'App\Http\Controllers\UtilisateurController@form_connection');
// Route::get('/connection', [UtilisateurController::class, 'form_connection']);


Route::get('login', [ 'as' => 'login', 'uses' => 'UtilisateurController@form_connection'])->name('utilisateurs.connection');


Route::post('/connection/traitement', [UtilisateurController::class, 'traitement_connection']);

});
