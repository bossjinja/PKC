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

//PLEASE NOTE: Order of routes in this file is significant!

// Routes behind authentication
// Basically all pages that a use should be logged in to see need to be added to this group
Route::group(['middleware' => 'auth'], function() {
    
    //Petz routes
    Route::get('petz/regs', 'PetzController@regs');
    Route::get('petz/create', 'PetzController@create');
    Route::post('petz/store', ['as' => 'regpet', 'uses' => 'PetzController@store']);
    Route::get('petz/{id}', 'PetzController@show');
    Route::get('petz/', 'PetzController@index');
    
    //Prefix routes
    Route::get('prefix/{id}', 'PrefixController@show');
    
    //User routes
    Route::get('user/{name}', 'UserController@show');
    
    //Breed routes
    Route::get('breed/create', 'BreedController@create');
    Route::post('breed/store', ['as' => 'addbreed', 'uses' => 'BreedController@store']);
    Route::get('breed/{id}', ['as' => 'showbreed', 'uses' => 'BreedController@show']);
    Route::get('breed/', ['as' => 'breedlist', 'uses' => 'BreedController@index']);
    
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'newuser', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/home', function () { return view('home'); });