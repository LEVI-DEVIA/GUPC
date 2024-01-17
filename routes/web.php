<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

//login
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/login',[AuthController::class,'Vulogin'])->name('login');

//register
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/register',[AuthController::class,'Vuregister'])->name('register');

//dashbord
Route::get('/admin',[AdminController::class,'index'])->name('admin');
Route::get('/dashboard',[UtilisateurController::class,'dashboard'])->name('dashboard');
Route::post('/ajout',[UtilisateurController::class,'ajouterUtilisateur'])->name('ajout');




