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

Route::get('/', 'UserController@index');

Route::get('/admin', 'UserController@admin');

Route::post('/admin', 'UserController@adminCheck');

Route::get('/logout', 'UserController@logout');

Route::group(['middleware' => 'AdminAuth'], function() {

	Route::get('/admin/dashboard', 'UserController@adminDash');
	Route::get('/users', 'UserController@show');
	Route::get('/users/new', 'UserController@showNew');
	Route::get('/users/approved', 'UserController@showApproved');
	Route::get('/users/rejected', 'UserController@showRejected');

	Route::get('/users/approve/{id}', 'UserController@approve');

	Route::get('/users/reject/{id}', 'UserController@reject');

	Route::get('/tasks/create', "TasksController@create");

	Route::post('/tasks/create', "TasksController@store");
});


Route::get('/facebook/callback', "UserController@fbcallback");
Route::group(['middleware' => 'RegisteredAuth'], function() {
	

	Route::get('/dashboard', "UserController@dashboard");
});

Route::get('/register', "UserController@create");

Route::post('/register', "UserController@store");




Route::group(['middleware' => 'ApprovedAuth'], function() {
	Route::get('/tasks', "TasksController@index");
});
