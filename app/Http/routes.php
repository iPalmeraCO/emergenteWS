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


// recurso para usuarios

//Route::resource('user','UserController');

Route::resource('user', 'UserController',
                ['only' => ['index', 'store', 'update', 'destroy', 'show']]);





Route::get('user/{mail}/{pwd}', 'UserController@show');
// excluye rutas

Route::get('email/{mail}','EmailController@show');

Route::resource('email','EmailController',['only' => ['index', 'store', 'update', 'destroy', 'show']]);

Route::get('/p', function () {
    return view('welcome');
});
