<?php

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


Route::group(['namespace' => 'Institucional', 'prefix' => 'institucional'], function () {

    Route::get('sobre', ['as' => 'sobre', 'uses' => 'InstitucionalController@getSobre']);
    Route::get('contato', ['as' => 'contato', 'uses' => 'InstitucionalController@getContato']);
    Route::post('contato', ['as' => 'contato.send', 'uses' => 'InstitucionalController@postContato']);

});

Route::resource('volunteer', 'VolunteersController');
Route::resource('cause', 'CausesController');
Route::resource('institution', 'InstitutionsController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
