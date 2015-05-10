<?php

/**
 * Frontend Access Controllers
 */
Route::group(['namespace' => 'Auth'], function ()
{
	Route::group(['middleware' => 'auth'], function ()
	{
		Route::get('auth/logout', 'AuthController@getLogout');
		Route::get('auth/password/change', 'PasswordController@getChangePassword');
		Route::post('auth/password/change', ['as' => 'password.change', 'uses' => 'PasswordController@postChangePassword']);
	});

	Route::group(['middleware' => 'guest'], function ()
	{
		Route::get('auth/login/{provider}', ['as' => 'auth.provider', 'uses' => 'AuthController@loginThirdParty']);
		Route::get('account/confirm/{token}', ['as' => 'account.confirm', 'uses' => 'AuthController@confirmAccount']);
		Route::get('account/confirm/resend/{user_id}', ['as' => 'account.confirm.resend', 'uses' => 'AuthController@resendConfirmationEmail']);

		Route::controller('auth', 'AuthController');
		Route::controller('password', 'PasswordController');
	});
});