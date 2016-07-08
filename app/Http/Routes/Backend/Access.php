<?php

Route::group([
    'prefix'     => 'access',
    'namespace'  => 'Access',
], function() {

	/**
	 * User Management
	 */
	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-users',
	], function() {
		Route::group(['namespace' => 'User'], function() {
			Route::resource('users', 'UserController', ['except' => ['show']]);

			/**
			 * For DataTables
			 */
			Route::get('users/get', 'UserController@get')->name('admin.access.users.get');

			/**
			 * User Status'
			 */
			Route::get('users/deactivated', 'UserController@deactivated')->name('admin.access.users.deactivated');
			Route::get('users/deleted', 'UserController@deleted')->name('admin.access.users.deleted');

			/**
			 * Misc
			 */
			Route::get('account/confirm/resend/{user_id}', 'UserController@resendConfirmationEmail')->name('admin.account.confirm.resend');

			/**
			 * Specific User
			 */
			Route::group(['prefix' => 'user/{user}'], function() {
				Route::get('delete', 'UserController@delete')->name('admin.access.user.delete-permanently');
				Route::get('restore', 'UserController@restore')->name('admin.access.user.restore');
				Route::get('mark/{status}', 'UserController@mark')->name('admin.access.user.mark')->where(['status' => '[0,1]']);
				Route::get('password/change', 'UserController@changePassword')->name('admin.access.user.change-password');
				Route::post('password/change', 'UserController@updatePassword')->name('admin.access.user.change-password');
				Route::get('login-as', 'UserController@loginAs')->name('admin.access.user.login-as');
			});
		});
	});

	/**
	 * Role Management
	 */
	Route::group([
		'middleware' => 'access.routeNeedsPermission:manage-roles',
	], function() {
		Route::group(['namespace' => 'Role'], function () {
			Route::resource('roles', 'RoleController', ['except' => ['show']]);

			//For DataTables
			Route::get('roles/get', 'RoleController@get')->name('admin.access.roles.get');
		});
	});
});