<?php

/**
 * Frontend Access Controllers
 */
Route::get('auth/login/{provider}', ['as' => 'auth.provider', 'uses' => 'Auth\AuthController@loginThirdParty']);
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);