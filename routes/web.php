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


Route::get('/', 'PublicController@index');
Route::post('save', 'PublicController@store');
Route::get('mesReponses/{id}', 'PublicController@show');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('accueil');
Route::get('/accueil', 'HomeController@accueil');
Route::get('/questionnaire', 'HomeController@questionnaire')->name('questionnaire');
Route::get('/reponse', 'HomeController@reponse')->name('reponse');
Route::get('/deconnexion', 'HomeController@deconnexion');
