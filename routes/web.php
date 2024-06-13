<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProController;
use App\Http\Controllers\RendController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\ContaController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\rendez;
 
 

Route::get('/',function(){return view('home');});
Route::get('/home', function(){return view('home');});
Route::get('/about', function(){return view('about');});
Route::get('/contact', function(){return view('contact');});
Route::post('/addMessage' , [ContaController::class,'add']);




Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerUser'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('login');
});
 



Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/choose' , [AuthController::class,'choose']);
    // Route::get("/profil" , function(){return view("profil");});
    // Route::get('/recherche', function(){return view('recherche');});
    // Route::get('/recherche', [ProController::class ,'recherche']);

    Route::get('/recherche', [ProController::class ,'recherche']);
    Route::post('/recherche', [ProController::class ,'find']);


    Route::get('/profil/{id?}', [ProController::class ,'profil']);
    Route::post("/modiferP/{id?}" ,[ProController::class ,'modifier']);

    Route::post('/data/{id}', [ProController::class, 'saveInCalendrier']);


    Route::get('/rdv' ,[RendController::class , 'normalRendez']);
    Route::get('/grdv' ,[RendController::class , 'proRendez']);
    Route::post('/createRdv' ,[RendController::class ,'prenezRendz'])->name('createRdv');


    Route::get('/supp/{id}' , [RendController::class,'supprimerRenez']);

    Route::get('/modif/{id}' , [RendController::class,'modifierRenez']);    
    Route::post('/updateRdv/{id}' ,[RendController::class ,'updateRdv'])->name('updateRdv');


    Route::get('/chercherRdv',[RendController::class ,'proRendez']);

    Route::get('/chercherRdvN',[RendController::class ,'normalRendez']);

    Route::get('/addavis/{id}',[AvisController::class ,'pageavis']);
    Route::post('/addavis/{id}',[AvisController::class ,'add']);
    Route::get('/supAvi/{id}',[AvisController::class ,'delete']);
});


