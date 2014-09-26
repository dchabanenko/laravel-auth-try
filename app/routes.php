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

Route::get('user/{id}/profile', array('before' => 'auth', 'uses' => 'HomeController@showProfile'));

Route::get('login', 'HomeController@showLogin');
Route::post('login', array('as' => 'sessions.register', 'uses' =>'SessionsController@postRegister'))->before('csrf');

Route::get('register', 'HomeController@showRegister');
Route::post('register', 'UserController@storeRegister')->before('csrf');

Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController', ['only' => ['index', 'create', 'destroy', 'store']]);

Route::any('feeds/create/new', ['as' => 'feeds.create', 'uses' => 'FeedController@create']);

Route::get('feeds/{filter}', ['as' => 'feeds.index', 'uses' => 'FeedController@index']);

Route::get('feeds/{id}/delete', ['as' => 'feeds.delete', 'uses' => 'FeedController@delete']);

Route::any('feeds/{id}/edit', ['as' => 'feeds.edit', 'uses' => 'FeedController@edit']);

Route::get('feeds/{id}/refresh', ['as' => 'feeds.refresh', 'uses' => 'FeedController@refresh']);

Route::get('papers/{filter}', ['as' => 'papers.index', 'uses' => 'PaperController@index']);
Route::get('papers/{id}/like', ['as' => 'papers.like', 'uses' => 'PaperController@like']);