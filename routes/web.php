<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */

/**
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
	require (__DIR__ . '/Frontend/Frontend.php');
	require (__DIR__ . '/Frontend/Access.php');
});

/* ----------------------------------------------------------------------- */

/**
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	/**
	 * These routes need view-backend permission
	 * (good if you want to allow more than one group in the backend,
	 * then limit the backend features by different roles or permissions)
	 *
	 * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
	 */
	require (__DIR__ . '/Backend/Dashboard.php');
	require (__DIR__ . '/Backend/Search.php');
	require (__DIR__ . '/Backend/Access.php');
	require (__DIR__ . '/Backend/LogViewer.php');
});