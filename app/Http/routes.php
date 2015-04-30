<?php

Route::get('/', 'FrontendController@index');
Route::get('dashboard', 'DashboardController@index');

//Socialite Integration
Route::get('auth/login/{provider}', ['as' => 'auth.provider', 'uses' => 'Auth\AuthController@loginThirdParty']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group([
	'middleware' => 'vault.routeNeedsRole',
	'role' => ['Administrator'],
	'redirect' => '/',
	'with' => ['flash_danger', 'You do not have access to do that.']
], function()
{
	Route::group(['prefix' => 'access'], function ()
	{
		/*User Management*/
		Route::resource('users', 'Access\UserController', ['except' => ['show']]);

		Route::get('users/deactivated', ['as' => 'access.users.deactivated', 'uses' => 'Access\UserController@deactivated']);
		Route::get('users/deleted', ['as' => 'access.users.deleted', 'uses' => 'Access\UserController@deleted']);

		Route::get('user/{id}/delete', ['as' => 'access.user.delete-permanently', 'uses' => 'Access\UserController@delete'])
			->where([
				'id' => '[0-9]+'
			]);
		Route::get('user/{id}/restore', ['as' => 'access.user.restore', 'uses' => 'Access\UserController@restore'])
			->where([
				'id' => '[0-9]+'
			]);

		Route::get('user/{id}/mark/{status}', ['as' => 'access.user.mark', 'uses' => 'Access\UserController@mark'])
			->where([
				'id'     => '[0-9]+',
				'status' => '[0,1]'
			]);

		Route::get('user/{id}/password/change', ['as' => 'access.user.change-password', 'uses' => 'Access\UserController@changePassword'])
			->where([
				'id' => '[0-9]+'
			]);
		Route::post('user/{id}/password/change', ['as' => 'access.user.change-password', 'uses' => 'Access\UserController@updatePassword'])
			->where([
				'id' => '[0-9]+'
			]);

		/* Roles Management */
		Route::resource('roles', 'Access\RoleController', ['except' => ['show']]);

		/* Permission Management */
		Route::group(['prefix' => 'roles'], function ()
		{
			Route::resource('permissions', 'Access\PermissionController', ['except' => ['show']]);
		});
	});
});