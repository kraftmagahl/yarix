<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/index','VulnController@index');
Route::get('/search','VulnController@search')->name('search');
Route::get('/show/{id}','VulnController@show');
Route::get('/edit/{id}','VulnController@edit');
Route::get('/create','VulnController@create');
Route::post('/','VulnController@store')->name('store');
Route::post('/{id}','VulnController@update')->name('update');
