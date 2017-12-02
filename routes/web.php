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

Route::get('home', 'HomeController@index')->name('home')->middleware('hasRole');

Route::get('profile/new', 'ProfileController@newProfile')->name('profile.new');
Route::post('profile/create', 'ProfileController@createProfile')->name('profile.create');
Route::get('institution/{institution}', 'ProfileController@institutionProfile')->name('profile.institution');
Route::get('volunteer/{volunteer}', 'ProfileController@volunteerProfile')->name('profile.volunteer');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('volunteer', 'VolunteersController');
    Route::resource('cause', 'CausesController');
    Route::resource('institution', 'InstitutionsController');
});

Auth::routes();

Route::get('login/{provider}', 'Auth\SocialAccountController@redirectToProvider')
    ->name('oauth')
    ->where('provider', 'google|facebook|linkedin');
   
Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback')
    ->name('oauth.callback')
    ->where('provider', 'google|facebook|linkedin');
