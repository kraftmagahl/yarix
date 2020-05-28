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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('auth.login');
});

Route::auth();

Route::get('/choose','HomeController@choose');
Route::post('/new_category','VulnController@new_category')->name('category');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index','VulnController@index')->name("index");
Route::get('/search','VulnController@search')->name('search');
Route::get('/show','VulnController@show')->name('show');
Route::get('/edit','VulnController@edit')->name('edit');
Route::get('/create','VulnController@create')->name('create');
Route::post('/','VulnController@store')->name('store');
Route::post('/save', function(Request $request){
    $tablename=$request->get('tablename');
    $newtableschema = array(
        'tablename' => $tablename,
        'colnames' => [
            'Titolo_non_ufficiale',
            'Titolo_ufficiale',
            'OWASP',
            'Gravità',
            'Descrizione',
            'Soluzione',
            'PoC',
            'Descrizione_en',
            'Soluzione_en',
            'updated_by'

            ],
    );

    Schema::create($newtableschema['tablename'], function($table) use($newtableschema){
    //Schema::create($tablename, function(Blueprint $table){
        $table->increments('id')->unique();
        foreach($newtableschema['colnames'] as $col){
            $table->text($col)->nullable();
        }
        $table->timestamps();
    });
    $categories=$request->input('categories');
    array_push($categories,$tablename);
    return view('choose',compact('categories'));
})->name('save');


Route::post('/{id}','VulnController@update')->name('update');