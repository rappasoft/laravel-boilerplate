<?php

/**
 * Frontend Controllers
 */
Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@index']);

/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function ()
{
	Route::get('dashboard', ['as' => 'frontend.dashboard', 'uses' => 'DashboardController@index']);
});