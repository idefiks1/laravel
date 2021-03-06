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

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware'=>'auth'], function()
{
	Route::get('timeline/take', 'timeline@take');
    Route::get('timeline', 'timeline@categories');
    Route::get('data/{id?}/{datePick?}/{version?}', 'timeline@data');
	Route::get('graphic', 'graphic@graph');
	Route::get('getDataTime', 'graphic@getTime');
	Route::get('getDate/{date}', 'graphic@getTime');
});