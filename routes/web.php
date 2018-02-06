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

//Kennels and Petz

//Breeds
Route::get('/breeds/new', 'BreedsController@create');
Route::post('/breeds/store', 'BreedsController@store')->name('breeds.store');
Route::post('/breeds/update/{id}', 'BreedsController@update')->name('breeds.update');
Route::get('/breeds/edit/{id}', 'BreedsController@edit');
Route::get('/breeds', 'BreedsController@index');

//login and User Registration routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
