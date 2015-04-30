<?php

use Illuminate\Database\Seeder;

class AccessTableSeeder extends Seeder {

	public function run() {

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		//Add the master administrator, user id of 1
		DB::table(Config::get('access.roles_table'))->truncate();
		DB::table(Config::get('access.assigned_roles_table'))->truncate();

		//Create admin role, id of 1
		$role_model = Config::get('access.role');
		$admin = new $role_model;
		$admin->name = 'Administrator';
		$admin->created_at = \Carbon\Carbon::now();
		$admin->updated_at = \Carbon\Carbon::now();
		$admin->save();

		//Make first user admin, attaches to user with id of 1
		$user_model = Config::get('auth.model');
		$user_model = new $user_model;
		$user_model::first()->attachRole($admin);

		//id = 2
		$role_model = Config::get('access.role');
		$user = new $role_model;
		$user->name = 'User';
		$user->created_at = \Carbon\Carbon::now();
		$user->updated_at = \Carbon\Carbon::now();
		$user->save();

		$user_model = Config::get('auth.model');
		$user_model = new $user_model;
		$user_model::find(2)->attachRole($user);

		DB::table(Config::get('access.permissions_table'))->truncate();
		DB::table(Config::get('access.permission_role_table'))->truncate();

		$permission_model = Config::get('access.permission');
		$viewAdminLink = new $permission_model;
		$viewAdminLink->name = 'view_admin_link';
		$viewAdminLink->display_name = 'View Administrator Link';
		$viewAdminLink->system = true;
		$viewAdminLink->created_at = \Carbon\Carbon::now();
		$viewAdminLink->updated_at = \Carbon\Carbon::now();
		$viewAdminLink->save();

		//Find the first role (admin) give it all permissions
		$role_model = Config::get('access.role');
		$role_model = new $role_model;
		$admin = $role_model::first();
		$admin->permissions()->sync(
			[
				$viewAdminLink->id,
			]
		);

		$permission_model = Config::get('access.permission');
		$userOnlyPermission = new $permission_model;
		$userOnlyPermission->name = 'user_only_permission';
		$userOnlyPermission->display_name = 'Test User Only Permission';
		$userOnlyPermission->system = false;
		$userOnlyPermission->created_at = \Carbon\Carbon::now();
		$userOnlyPermission->updated_at = \Carbon\Carbon::now();
		$userOnlyPermission->save();

		$user_model = Config::get('auth.model');
		$user_model = new $user_model;
		$user = $user_model::find(2);
		$user->permissions()->sync(
			[
				$userOnlyPermission->id,
			]
		);

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}