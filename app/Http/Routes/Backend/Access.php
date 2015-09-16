<?php

Route::group(['prefix' => 'access', 'namespace' => 'Access'], function ()
{
	/**
	 * User Management
	 */
	resource('users', 'UserController', ['except' => ['show']]);

	get('users/deactivated', ['as' => 'admin.access.users.deactivated', 'uses' => 'UserController@deactivated']);
	get('users/banned', ['as' => 'admin.access.users.banned', 'uses' => 'UserController@banned']);
	get('users/deleted', ['as' => 'admin.access.users.deleted', 'uses' => 'UserController@deleted']);
	get('account/confirm/resend/{user_id}', ['as' => 'admin.account.confirm.resend', 'uses' => 'UserController@resendConfirmationEmail']);

	/**
	 * Specific User
	 */
	Route::group(['prefix' => 'user/{id}', 'where' => ['id' => '[0-9]+']], function () {
		get('delete', ['as' => 'admin.access.user.delete-permanently', 'uses' => 'UserController@delete']);
		get('restore', ['as' => 'admin.access.user.restore', 'uses' => 'UserController@restore']);
		get('mark/{status}', ['as' => 'admin.access.user.mark', 'uses' => 'UserController@mark'])
			->where([
				'status' => '[0,1,2]'
			]);
		get('password/change', ['as' => 'admin.access.user.change-password', 'uses' => 'UserController@changePassword']);
		post('password/change', ['as' => 'admin.access.user.change-password', 'uses' => 'UserController@updatePassword']);
	});

	/**
	 * Role Management
	 */
	resource('roles', 'RoleController', ['except' => ['show']]);

	/**
	 * Permission Management
	 */
	Route::group(['prefix' => 'roles'], function ()
	{
		resource('permissions', 'PermissionController', ['except' => ['show']]);
	});
});