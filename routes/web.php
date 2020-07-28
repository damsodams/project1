<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// Arriver sur le site affichage des offre
Route::get('/', 'FrontControlleur@index')->name('front');
Route::get('/home', 'FrontControlleur@index')->name('home');
//Les routes pour les Utilisateurs du site -> FRONT
Route::group(['middleware'=>'auth'],function () {
  //route action postuler
  Route::get('front/postuler/{id}', 'DeveloppeurFrontController@postuler')->name('postuler_offre');
  //Route affichage de l'offre séléctionner
  Route::get('front/show/{id}', 'DeveloppeurFrontController@show')->name('show_offre');
  //route affichage des offre
  Route::get('front/index', 'DeveloppeurFrontController@index')->name('index_offre');
  //route affichage profil de l'utilisateur
  Route::get('front/user','DeveloppeurFrontController@profil_show')->name('profil_show');
  //route resource gestion des diplomes
  Route::resource('front/diplome', 'DiplomeController');
  //route ressource gestion des experience professionnel
  Route::resource('back/experience', 'ExperienceController');
});
//Les routes pour les Admins du site -> BACK
Route::group(['middleware'=>'auth','middleware'=>'admin'],function () {
  // route gestion Administrateur
  Route::resource('back/administrateur', 'AdministrateurControlleur');
  //Route gestion Developpeur
  Route::resource('back/developpeur', 'DeveloppeurController');
  //Route gestion Entreprise
  Route::resource('back/entreprise', 'EntrepriseController');
  //Route gestion UTILISATEUR
  Route::resource('back/utilisateur', 'UserController');
  //Route gestion des Offres
  Route::resource('back/offre' , 'OffreController');
  //Route vers la dashboard du back office
  Route::get('/back','BackController@index')->name('backo');
});
//Les routes pour les Entreprises du site -> BACK
Route::group(['middleware'=>'auth','middleware'=>'entreprise'],function () {

  Route::get('ajaxRequest', 'AjaxController@ajaxRequest');

  Route::post('ajaxRequest', 'AjaxController@ajaxRequestPost')->name('ajaxRequest.post');

  //Route gestion des offres par l'entreprise
  Route::resource('front/offre_entreprise' , 'OffreEntrepriseController');
  Route::get('front/mail' , 'EntrepriseFrontController@mail_index')->name('mail_index');
  Route::get('front/mailshow/{id}' , 'EntrepriseFrontController@mail_show')->name('mail_show');
  Route::get('front/maildestroy/{id}' , 'EntrepriseFrontController@mail_destroy')->name('mail_destroy');
  Route::get('front/accepter/{id}' , 'EntrepriseFrontController@candidature_accepter')->name('candidature_accepter');
  Route::get('front/refuser/{id}' , 'EntrepriseFrontController@candidature_refuser')->name('candidature_refuser');
  Route::get('front/projet' , 'EntrepriseFrontController@projet_index')->name('projet_index');
  Route::get('front/conversation' , 'EntrepriseFrontController@conversation_index')->name('conversation_index');

});
