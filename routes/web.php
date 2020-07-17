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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/back' , 'BackController@index')->name('back');


//Route gestion Developpeur
Route::resource('back/developpeur', 'DeveloppeurController');
//Route gestion Entreprise
Route::resource('back/entreprise', 'EntrepriseController');
//Route gestion UTILISATEUR
Route::resource('back/utilisateur', 'UserController');
