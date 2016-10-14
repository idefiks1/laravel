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
//Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/logout', 'Auth\AuthController@logout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('timeline', 'timeline@take');
Route::get('graphic', 'graphic@graph');
Route::group(['prefix'=>'admin','middleware'=>'auth'], function()
{
     Route::get('/', function()
     {
         echo "Добро пожаловать админ!";
     });
});
/*
Route::get('show', function()
     {
         return "Hello!";
     });
*/