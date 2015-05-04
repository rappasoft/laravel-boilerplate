<?php

/**
 * Frontend Access Controllers
 */
Route::group(['namespace' => 'Auth'], function ()
{
	Route::group(['middleware' => 'auth'], function ()
	{
		Route::get('auth/logout', 'AuthController@getLogout');
	});

	Route::group(['middleware' => 'guest'], function ()
	{
		Route::get('auth/login/{provider}', ['as' => 'auth.provider', 'uses' => 'AuthController@loginThirdParty']);
		Route::controller('auth', 'AuthController');
		Route::controller('password', 'PasswordController');
	});
});