<?php

use Illuminate\Database\Seeder;
use App\Models\Access\Role\Role;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionRoleSeeder
 */
class PermissionRoleSeeder extends Seeder
{
	/**
	 * Run the database seed.
	 *
	 * @return void
	 */
	public function run()
	{
		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		}

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::table(config('access.permission_role_table'))->truncate();
		} elseif (DB::connection()->getDriverName() == 'sqlite') {
			DB::statement('DELETE FROM ' . config('access.permission_role_table'));
		} else {
			//For PostgreSQL or anything else
			DB::statement('TRUNCATE TABLE ' . config('access.permission_role_table') . ' CASCADE');
		}

		/**
		 * Assign view backend and manage user permissions to executive role as example
		 */
		Role::find(2)->permissions()->sync([1, 2]);
		/**
		 * 
		 */

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		}
	}
}