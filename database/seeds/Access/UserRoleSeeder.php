<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder {

	public function run() {

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		DB::table(config('access.assigned_roles_table'))->truncate();

		//Attach admin role to admin user
		$user_model = config('auth.model');
		$user_model = new $user_model;
		$user_model::first()->attachRole(1);

		//Attach user role to general user
		$user_model = config('auth.model');
		$user_model = new $user_model;
		$user_model::find(2)->attachRole(2);

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}