<?php

return array(

	/*
	 * Role model used by Vault to create correct relations. Update the role if it is in a different namespace.
	*/
	'role' => 'App\Role',

	/*
	 * Roles table used by Vault to save roles to the database.
	 */
	'roles_table' => 'roles',

	/*
	 * Permission model used by Vault to create correct relations.
	 * Update the permission if it is in a different namespace.
	 */
	'permission' => 'App\Permission',

	/*
	 * Permissions table used by Vault to save permissions to the database.
	 */
	'permissions_table' => 'permissions',

	/*
	 * permission_role table used by Vault to save relationship between permissions and roles to the database.
	 */
	'permission_role_table' => 'permission_role',

	/*
	 * permission_user table used by Vault to save relationship between permissions and users to the database.
	 * This table is only for permissions that belong directly to a specific user and not a role
	 */
	'permission_user_table' => 'permission_user',

	/*
	 * assigned_roles table used by Vault to save assigned roles to the database.
	 */
	'assigned_roles_table' => 'assigned_roles',

	/*
	 * Configurations for the user views
	 */
	'users' => [
		'default_per_page' => 25,
		/*
		 * "confirmed" is applied by default
		 */
		'password_validation' => 'required|alpha_num|min:6',
	],

	/*
	 * Configuration for roles
	 */
	'roles' => [
		/*
		 * Whether a role must contain a permission or can be used standalone
		 */
		'role_must_contain_permission' => true,
		/*
		 * Whether or not the administrator role must possess every permission
		 * Works in unison with permissions.permission_must_contain_role
		 */
		'administrator_forced' => false,
	],

	/*
	 * Configuration for permissions
	 */
	'permissions' => [
		/*
		 * Whether a permission must contain a role or can be used standalone
		 * Works in unison with roles.administrator_forced
		 */
		'permission_must_contain_role' => false,
	],

	/*
	 * Validation overwrites
	 */
	'validation' => [
		'users' => [
			'create' => [
				'name'					=>  'required',
				'email'					=>	'required|email|unique:users',
				'password'				=>	'required|alpha_num|min:6|confirmed',
				'password_confirmation'	=>	'required|alpha_num|min:6',
			],
			'update' => [
				'email'	=>	'required|email',
				'name'	=>  'required',
			],
		],
	],
);