<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\web\ArchitectsController;
use App\Http\Controllers\web\Demande_PermisController;
use App\Http\Controllers\web\UtilisateurController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

//login_admin
Route::post('/login/admin',[AuthController::class,'login'])->name('/login/admin');
Route::get('/login/admin',[AuthController::class,'Vulogin'])->name('login/admin');

//register_admin
Route::post('/register/admin',[AuthController::class,'register'])->name('register/admin');
Route::get('/register/admin',[AuthController::class,'Vuregister'])->name('register/admin');

//dashbord_admin
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[UtilisateurController::class,'dashboard'])->name('dashboard');
    Route::post('/ajout',[UtilisateurController::class,'ajouterUtilisateur'])->name('ajout');
});
Route::get('/admin',[AdminController::class,'index'])->name('admin');
Route::get('/admin/vuDemande',[AdminController::class,'vuDemande'])->name('/admin/vuDemande');


//login_users
Route::post('/login/user',[ArchitectsController::class,'loginArchitects'])->name('/login/user');
Route::get('/login/user',[ArchitectsController::class,'index'])->name('/login/user');

//dashboard_architects
Route::get('perso',[ArchitectsController::class,'dashboard_architects'])->name('perso');

//permis_construire
Route::get('dmpermis',[Demande_PermisController::class,'index'])->name('dmpermis');
Route::post('dmpermis',[Demande_PermisController::class,'storeForm'])->name('dmpermis');



