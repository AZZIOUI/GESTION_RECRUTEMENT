<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\RecruteurController;
 
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','isCandidat'])->group(function () {
Route::get('/candidat',[CandidatController::class , "index"])->name("candidat-home");
Route::post('/candidat/postulation',[CandidatController::class , "postuler"])->name("postuler");
Route::get('/candidat/candidatures',[CandidatController::class , "candidatures"])->name("candidatures");
Route::get('/candidat/candidature/modification/{candidature}',[CandidatController::class , "candidatureedit"])->name("candidature-edit");
Route::put('/candidat/candidature/modification/',[CandidatController::class , "candidatureput"])->name("candidature-put");
Route::delete('/candidat/candidature/suppression/{candidature}',[CandidatController::class , "candidaturedelete"])->name("candidature-delete");
});

Route::middleware(['auth','isRecruteur'])->group(function () {
    Route::get('/recruteur',[RecruteurController::class , "index"])->name("recruteur-home");
    Route::get('/recruteur/offres',[RecruteurController::class , "offres"])->name("offres");
    Route::get('/recruteur/{offre}/candidatures',[RecruteurController::class , "candidatures"])->name("candidatures-recruteur");
    Route::get('/recruteur/{offre}/candidatures/{candidature}',[RecruteurController::class , "candidatureshow"])->name("candidature-show");
    Route::get('/recruteur/offre/creation',[RecruteurController::class , "offrecreate"])->name("offre-create");
    Route::post('/recruteur/offre/creation',[RecruteurController::class , "offrepost"])->name("offre-post");
    Route::get('/recruteur/offre/modification/{offre}',[RecruteurController::class , "offreedit"])->name("offre-edit");
    Route::put('/recruteur/offre/modification/{offre}',[RecruteurController::class , "offreput"])->name("offre-put");
    Route::delete('/recruteur/offre/suppression/{offre}',[RecruteurController::class , "offredelete"])->name("offre-delete");
    
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [LoginController::class, 'profile'])->name('profile');
    Route::post('/profile/modification', [LoginController::class, 'profiledit'])->name('profile-post');
});


Route::get('/connexion',[LoginController::class , "index"])->name("login");
Route::post('/connexion',[LoginController::class , "login"])->name("login-post");
Route::get('/inscription',[LoginController::class , "indexi"])->name("inscription");
Route::post('/inscription',[LoginController::class , "inscription"])->name("inscription-post");

Route::post('/deconnexion',[LoginController::class , "logout"])->name("logout");


Route::get('/',[OffreController::class , "offres"])->name("home");
Route::get('/{offre}',[OffreController::class , "offredetails"])->name("offre-details");



