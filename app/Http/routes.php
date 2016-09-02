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

/* To protect the main page - uncomment for production
Route::get('/', function () {
    return view('welcome');
});
*/

// Route::get('/', 'Auth\AuthController@getLogin');


/* Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes... Disabled until production site

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// This is just for the time being, to protect the registration page. Delete when we move to the production site.
Route::get('auth/register', 'Auth\AuthController@getLogin');
*/

// Route::post('/api/comment', 'LatinController@comment');
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    
    Route::get('/', function() {
	return view ('welcome');
	});
	
	Route::resource('videos', 'VideosController');
	
	Route::resource('text', 'LatinController');
	Route::post('text/{book}', 'NotesController@store');
	Route::delete('text/latin/delete', 'NotesController@destroy');
	
	Route::resource('series', 'CollectionsController');
	
	Route::get('videos/{urlSlug}/latin', 'LatinController@video');
	Route::post('videos/{urlSlug}/latin/store', 'NotesController@store');
	Route::delete('videos/{urlSlug}/latin/delete', 'NotesController@destroy');
	Route::post('videos/{urlSlug}/vocab/store', 'VocabController@store');
	Route::get('videos/{urlSlug}/vocabulary', 'VocabController@show');
	
	Route::get('videos/{urlSlug}/question', 'QuestionsController@question');
	
	Route::post('videos/{urlSlug}/answer', 'QuestionsController@answer');
	
	Route::get('profile', 'UserController@show');
	
	Route::get('latinDefinition', 'LatinController@definition');
	
	Route::get('leaders', 'QuestionsController@leaders');

});
