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
Route::post('save', 'SavesurveyController@store');
Route::get('mesReponses/{id}', 'MyresponseController@show');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('accueil');
Route::get('/accueil', 'AccueilController@index');
Route::get('/questionnaire', 'QuestionController@index')->name('questionnaire');
Route::get('/reponse', 'ResponseController@index')->name('reponse');
Route::get('/deconnexion', 'HomeController@logout');
