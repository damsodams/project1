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
Route::get('/', 'FrontControlleur@index')->name('home');


//Les routes pour les Utilisateurs du site -> FRONT
Route::group(['middleware'=>'auth'],function () {

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
});
//Les routes pour les Entreprises du site -> BACK
Route::group(['middleware'=>'auth','middleware'=>'entreprise'],function () {

});
