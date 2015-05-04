<?php

/**
 * Frontend Access Controllers
 */
Route::group(['namespace' => 'Auth'], function ()
{
	Route::get('auth/login/{provider}', ['as' => 'auth.provider', 'uses' => 'AuthController@loginThirdParty']);

	//Middleware in constructor of this controller
	/*Route::group(['middleware' => ['guest' => ['except' => 'getLogout']]], function ()
	{*/
		Route::controller('auth', 'AuthController');
	//});

	Route::group(['middleware' => 'guest'], function ()
	{
		Route::controller('password', 'PasswordController');
	});
});