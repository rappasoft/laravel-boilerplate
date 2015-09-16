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
	get('profile/edit', ['as' => 'frontend.profile.edit', 'uses' => 'ProfileController@edit']);
	patch('profile/update', ['as' => 'frontend.profile.update', 'uses' => 'ProfileController@update']);
});