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

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/', function ()    {
//         // Uses Auth Middleware
//     });

//     Route::get('user/profile', function () {
//         // Uses Auth Middleware
//     });
// });


Route::resource('user', 'UserController',
                ['only' => ['index', 'store', 'update', 'destroy', 'show']]);





Route::get('user/{mail}/{pwd}', 'UserController@show');
// excluye rutas

Route::get('email/{mail}','EmailController@show');

Route::resource('email','EmailController',['only' => ['index', 'store', 'update', 'destroy', 'show']]);

Route::get('/p', function () {
    return view('welcome');
});


Route::resource('categoria','CategoriaController',['only' => ['index', 'store', 'update', 'destroy', 'show']]);

Route::resource('producto','ProductoController',['only' => ['index', 'store', 'update', 'destroy', 'show']]);


Route::resource('contacto','ContactoController',['only' => ['index', 'store', 'update', 'destroy', 'show']]);