<?php

/**
 * Frontend Routes
 */
require_once (__DIR__."/Routes/Frontend/Frontend.php");
require_once (__DIR__."/Routes/Frontend/Access.php");

/**
 * Administration Access Controllers
 * The outer group just makes sure the user is logged in, and also 'namespaces' the admin section
 * The inner groups say which roles can access which sections
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	/**
	 * These routes need the Administrator Role
	 */
	Route::group([
		'middleware' => 'access.routeNeedsRole',
		'role' => ['Administrator'],
		'redirect' => '/',
		'with' => ['flash_danger', 'You do not have access to do that.']
	], function()
	{
		require_once (__DIR__."/Routes/Administrator/Access.php");
	});
});