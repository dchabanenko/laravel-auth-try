<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@showHome']);

Route::get('register', 'HomeController@showRegister');
Route::post('register', 'UserController@storeRegister')->before('csrf');

Route::resource('sessions', 'SessionsController', ['only' => ['index', 'create', 'destroy', 'store']]);

Route::get('login', 'HomeController@showLogin');
Route::post('login', 'SessionsController@store')->before('csrf');

Route::get('logout', 'SessionsController@destroy');