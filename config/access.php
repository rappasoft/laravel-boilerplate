<?php

return array(

	/*
	 * Role model used by Access to create correct relations. Update the role if it is in a different namespace.
	*/
	'role' => 'App\Role',

	/*
	 * Roles table used by Access to save roles to the database.
	 */
	'roles_table' => 'roles',

	/*
	 * Permission model used by Access to create correct relations.
	 * Update the permission if it is in a different namespace.
	 */
	'permission' => 'App\Permission',

	/*
	 * Permissions table used by Access to save permissions to the database.
	 */
	'permissions_table' => 'permissions',

	/*
	 * permission_role table used by Access to save relationship between permissions and roles to the database.
	 */
	'permission_role_table' => 'permission_role',

	/*
	 * permission_user table used by Access to save relationship between permissions and users to the database.
	 * This table is only for permissions that belong directly to a specific user and not a role
	 */
	'permission_user_table' => 'permission_user',

	/*
	 * assigned_roles table used by Access to save assigned roles to the database.
	 */
	'assigned_roles_table' => 'assigned_roles',

	/*
	 * Configurations for the user
	 */
	'users' => [
		/*
		 * Administration tables
		 */
		'default_per_page' => 25,

		/*
		 * The role the user is assigned to when they sign up from the frontend
		 */
		'default_role' => 'User',

		/*
		 * Whether or not the user has to confirm their email when signing up
		 */
		'confirm_email' => true,

		/*
		 * Whether or not the users email can be changed on the edit profile screen
		 */
		'change_email' => false,
	],

	/*
	 * Configuration for roles
	 */
	'roles' => [
		/*
		 * Whether a role must contain a permission or can be used standalone
		 */
		'role_must_contain_permission' => false
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
);