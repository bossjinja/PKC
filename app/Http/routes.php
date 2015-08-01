<?php
Route::get('/', function () {
    return view('home');
});

//PLEASE NOTE: Order of routes in this file is significant!

// Routes behind authentication
// Basically all pages that a use should be logged in to see need to be added to this group
Route::group(['middleware' => 'auth'], function() {
    
    //Petz routes
    Route::get('petz/regs', ['as' => 'regslist', 'uses' => 'PetzController@regs']);
    Route::get('petz/create', ['as' => 'createpet', 'uses' => 'PetzController@create']);
    Route::post('petz/store', ['as' => 'storepet', 'uses' => 'PetzController@store']);
    Route::get('petz/{id}', ['as' => 'showpet', 'uses' => 'PetzController@show']);
    Route::get('petz/', ['as' => 'petzlist', 'uses' => 'PetzController@index']);
    
    //Prefix routes
    Route::get('prefixes/create', ['as' => 'createprefix', 'uses' => 'PrefixController@create']);
    Route::post('prefixes/store', ['as' => 'storeprefix', 'uses' => 'PrefixController@store']);
    Route::get('prefixes/{id}/edit', ['as' => 'editprefix', 'uses' => 'PrefixController@edit']);
    Route::post('prefixes/{id}/update', ['as' => 'updateprefix', 'uses' => 'PrefixController@update']);
    Route::get('prefixes/{id}', ['as' => 'showprefix', 'uses' => 'PrefixController@show']);
    Route::get('prefixes/', ['as' => 'prefixlist', 'uses' => 'PrefixController@index']);
    
    //User routes
    Route::get('users/{name}', ['as' => 'showuser', 'uses' => 'UserController@show']);
    Route::get('users/', ['as' => 'userlist', 'uses' => 'UserController@index']);
    
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