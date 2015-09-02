<?php

/**
 * Frontend Access Controllers
 */
Route::group(['namespace' => 'Auth'], function ()
{
	Route::group(['middleware' => 'auth'], function ()
	{
		get('auth/logout', 'AuthController@getLogout');
		get('auth/password/change', 'PasswordController@getChangePassword');
		post('auth/password/change', ['as' => 'password.change', 'uses' => 'PasswordController@postChangePassword']);
	});

	Route::group(['middleware' => 'guest'], function ()
	{
		get('auth/login/{provider}', ['as' => 'auth.provider', 'uses' => 'AuthController@loginThirdParty']);
		get('account/confirm/{token}', ['as' => 'account.confirm', 'uses' => 'AuthController@confirmAccount']);
		get('account/confirm/resend/{user_id}', ['as' => 'account.confirm.resend', 'uses' => 'AuthController@resendConfirmationEmail']);

		Route::controller('auth', 'AuthController');
		Route::controller('password', 'PasswordController');
	});
});