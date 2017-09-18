<?php

/**
 * All route names are prefixed with 'admin.access'.
 */
Route::group([
	'prefix'     => 'access',
	'as'         => 'access.',
	'namespace'  => 'Access',
], function () {

	Route::group([
		'middleware' => 'role:administrator',
	], function () {
		/*
		 * User Management
		 */
		Route::group(['namespace' => 'User'], function () {

		});

		/*
         * Role Management
         */
		Route::group(['namespace' => 'Role'], function () {

		});
	});
});