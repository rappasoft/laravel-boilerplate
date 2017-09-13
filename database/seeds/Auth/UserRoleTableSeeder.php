<?php

use Illuminate\Database\Seeder;
use App\Models\Auth\User;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleTableSeeder extends Seeder
{

	use DisableForeignKeys;

	/**
	 * Run the database seed.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->disableForeignKeys();

		User::find(1)->assignRole('administrator');
		User::find(2)->assignRole('executive');
		User::find(3)->assignRole('user');

		$this->enableForeignKeys();
	}
}