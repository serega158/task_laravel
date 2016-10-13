<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('base');
});

Route::get('/ads/list', 'AdsController@index');
Route::get('/ads/filtered/list', 'AdsController@indexFiltered');

Route::get('/profile', 'ProfileController@index');
Route::post('/profile/ads/add', 'ProfileController@addAds');
Route::get('/profile/filters/control', 'ProfileController@controlFilters');
Route::post('/profile/filters/add', 'ProfileController@addFilters');
Route::post('/profile/filters/edit', 'ProfileController@editFilters');

Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');
Route::get('/registration', 'UserController@registration');
Route::post('/registration', 'UserController@registration');