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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('home');
});

Route::get('petz/{id}', 'PetzController@show');
Route::get('prefix/{id}', 'PrefixController@show');
Route::get('user/{name}', 'UserController@show');
Route::get('petz/', 'PetzController@index');
