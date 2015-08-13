<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermissionTableSeeder extends Seeder {

	public function run() {

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		if(env('DB_DRIVER') == 'mysql')
		{
			DB::table(config('access.permissions_table'))->truncate();
			DB::table(config('access.permission_role_table'))->truncate();
			DB::table(config('access.permission_user_table'))->truncate();
		} else { //For PostgreSQL or anything else
			DB::statement("TRUNCATE TABLE ".config('access.permissions_table')." CASCADE");
			DB::statement("TRUNCATE TABLE ".config('access.permission_role_table')." CASCADE");
			DB::statement("TRUNCATE TABLE ".config('access.permission_user_table')." CASCADE");
		}

		$permission_model = config('access.permission');
		$viewBackend = new $permission_model;
		$viewBackend->name = 'view_backend';
		$viewBackend->display_name = 'View Backend';
		$viewBackend->system = true;
		$viewBackend->created_at = Carbon::now();
		$viewBackend->updated_at = Carbon::now();
		$viewBackend->save();

		//Find the first role (admin) give it all permissions
		$role_model = config('access.role');
		$role_model = new $role_model;
		$admin = $role_model::first();
		$admin->permissions()->sync(
			[
				$viewBackend->id,
			]
		);

		$permission_model = config('access.permission');
		$userOnlyPermission = new $permission_model;
		$userOnlyPermission->name = 'user_only_permission';
		$userOnlyPermission->display_name = 'Test User Only Permission';
		$userOnlyPermission->system = false;
		$userOnlyPermission->created_at = Carbon::now();
		$userOnlyPermission->updated_at = Carbon::now();
		$userOnlyPermission->save();

		$user_model = config('auth.model');
		$user_model = new $user_model;
		$user = $user_model::find(2);
		$user->permissions()->sync(
			[
				$userOnlyPermission->id,
			]
		);

		if(env('DB_DRIVER') == 'mysql')
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}