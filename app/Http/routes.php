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

Route::auth();
Route::get('/', 'PagesController@index');
Route::get('/home', 'HomeController@index');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::resource('articles', 'ArticlesController'); //can test using artisan route:list

Route::get('foo', ['middleware' => 'manager', function()
{
	return 'is a manager';
}]);

// Route::get('/', ['middleware' => 'auth', 'uses' => 'PagesController@index']);
// Route::get('/', ['middleware' => 'auth', function()
// {}
// ]);

// Route::get('articles', 'ArticlesController@index');
// Route::get('articles/create', 'ArticlesController@create');
// Route::get('articles/{id}', 'ArticlesController@show');
// Route::post('articles', 'ArticlesController@store');
// Route::get('articles/{id}/edit', 'ArticlesController@edit');