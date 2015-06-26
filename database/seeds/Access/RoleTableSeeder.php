<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;

class RoleTableSeeder extends Seeder {

	public function run() {

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		DB::table(config('access.roles_table'))->truncate();

		//Create admin role, id of 1
		$role_model = config('access.role');
		$admin = new $role_model;
		$admin->name = 'Administrator';
		$admin->created_at = Carbon::now();
		$admin->updated_at = Carbon::now();
		$admin->save();

		//id = 2
		$role_model = config('access.role');
		$user = new $role_model;
		$user->name = 'User';
		$user->created_at = Carbon::now();
		$user->updated_at = Carbon::now();
		$user->save();

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}