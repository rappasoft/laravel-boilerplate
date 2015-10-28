<?php

$router->group([
	'prefix' => 'access',
	'namespace' => 'Access',
	'middleware' => 'access.routeNeedsPermission:view-access-management'
], function() use ($router)
{
	/**
	 * User Management
	 */
	$router->group(['namespace' => 'User'], function() use ($router) {
		resource('users', 'UserController', ['except' => ['show']]);

		get('users/deactivated', 'UserController@deactivated')->name('admin.access.users.deactivated');
		get('users/banned', 'UserController@banned')->name('admin.access.users.banned');
		get('users/deleted', 'UserController@deleted')->name('admin.access.users.deleted');
		get('account/confirm/resend/{user_id}', 'UserController@resendConfirmationEmail')->name('admin.account.confirm.resend');

		/**
		 * Specific User
		 */
		$router->group(['prefix' => 'user/{id}', 'where' => ['id' => '[0-9]+']], function () {
			get('delete', 'UserController@delete')->name('admin.access.user.delete-permanently');
			get('restore', 'UserController@restore')->name('admin.access.user.restore');
			get('mark/{status}', 'UserController@mark')->name('admin.access.user.mark')->where(['status' => '[0,1,2]']);
			get('password/change', 'UserController@changePassword')->name('admin.access.user.change-password');
			post('password/change', 'UserController@updatePassword')->name('admin.access.user.change-password');
		});
	});

	/**
	 * Role Management
	 */
	$router->group(['namespace' => 'Role'], function() use ($router) {
		resource('roles', 'RoleController', ['except' => ['show']]);
	});

	/**
	 * Permission Management
	 */
	$router->group(['prefix' => 'roles', 'namespace' => 'Permission'], function() use ($router)
	{
		resource('permission-group', 'PermissionGroupController', ['except' => ['index', 'show']]);
		resource('permissions', 'PermissionController', ['except' => ['show']]);

		$router->group(['prefix' => 'groups'], function () {
			post('update-sort', 'PermissionGroupController@updateSort')->name('admin.access.roles.groups.update-sort');
		});
	});
});