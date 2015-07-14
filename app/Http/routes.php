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

// Routes behind authentication
// Basically all pages that a use should be logged in to see need to be added to this group
Route::group(['middleware' => 'auth'], function() {
    
    Route::get('petz/regs', 'PetzController@regs');
    Route::get('prefix/{id}', 'PrefixController@show');
    Route::get('user/{name}', 'UserController@show');
    Route::get('petz/create', 'PetzController@create');
    Route::post('petz/store', ['as' => 'regpet', 'uses' => 'PetzController@store']);
    Route::get('petz/{id}', 'PetzController@show');
    Route::get('petz/', 'PetzController@index');
    
    
});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'newuser', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/home', function () { return view('home'); });