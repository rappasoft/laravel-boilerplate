<?php

/**
 * Frontend Controllers
 */
get('/', ['as' => 'home', 'uses' => 'FrontendController@index']);
get('macros', 'FrontendController@macros');

/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function ()
{
	get('dashboard', ['as' => 'frontend.dashboard', 'uses' => 'DashboardController@index']);
	resource('profile', 'ProfileController', ['only' => ['edit', 'update']]);
});