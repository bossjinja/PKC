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
    Route::get('prefixes/create', ['as' => 'addprefix', 'uses' => 'PrefixController@create']);
    Route::post('prefixes/store', ['as' => 'storeprefix', 'uses' => 'PrefixController@store']);
    Route::get('prefixes/{id}/edit', ['as' => 'editprefix', 'uses' => 'PrefixController@edit']);
    Route::post('prefixes/{id}/update', ['as' => 'updateprefix', 'uses' => 'PrefixController@update']);
    Route::get('prefixes/{id}', ['as' => 'showprefix', 'uses' => 'PrefixController@show']);
    Route::get('prefixes/', ['as' => 'prefixlist', 'uses' => 'PrefixController@index']);
    
    //User routes
    Route::get('user/{name}', 'UserController@show');
    
    //Breed routes
    Route::get('breeds/create', ['as' => 'addbreed', 'uses' => 'BreedController@create']);
    Route::post('breeds/store', ['as' => 'storebreed', 'uses' => 'BreedController@store']);
    Route::get('breeds/{id}/edit', ['as' => 'editbreed', 'uses' => 'BreedController@edit']);
    Route::post('breeds/{id}/update', ['as' => 'updatebreed', 'uses' => 'BreedController@update']);
    Route::get('breeds/{id}', ['as' => 'showbreed', 'uses' => 'BreedController@show']);
    Route::get('breeds/', ['as' => 'breedlist', 'uses' => 'BreedController@index']);
    
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'newuser', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/home', function () { return view('home'); });