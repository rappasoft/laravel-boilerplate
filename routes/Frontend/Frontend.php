<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('macros', 'FrontendController@macros')->name('macros');

/**
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
	Route::group(['namespace' => 'User', 'as' => 'user.'], function() {
		Route::get('dashboard', 'DashboardController@index')->name('dashboard');
		Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
		Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
	});
});