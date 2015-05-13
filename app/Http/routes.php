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

Route::get('/', 'JournalsController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::model('tasks', 'Task');
Route::model('projects', 'Project');


Route::bind('journals', function($value, $route) {
	return App\Journal::whereSlug($value)->first();
});

Route::bind('articles', function($value, $route) {
	return App\Article::whereSlug($value)->first();
});

Route::bind('administration', function($value, $route) {
	return App\Journal::whereSlug($value)->first();
});

Route::post('administration/{journal}/article/store', 'AdminController@storearticle');

Route::get('administration/{journal}/edit', 'AdminController@edit');
Route::get('administration/{journal}/{article}/edit', 'AdminController@editarticle');
Route::get('administration/journal/create', 'AdminController@create');
Route::get('administration/{journal}/article/create', 'AdminController@createarticle');

//Named routes for article manipulation
Route::patch('administration/{journal}/{article}', ['as' => 'administration.updatearticle', 'uses' => 'AdminController@updatearticle']);
Route::delete('administration/{journal}/{article}', ['as' => 'administration.destroyarticle', 'uses' => 'AdminController@destroyarticle']);


Route::resource('journals', 'JournalsController');
Route::resource('journals.articles', 'ArticlesController');

Route::resource('administration', "AdminController");