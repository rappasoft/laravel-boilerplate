<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class HistoryTypeTableSeeder
 */
class HistoryTypeTableSeeder extends Seeder {

	/**
	 * Run the database seed.
	 *
	 * @return void
	 */
	public function run() {

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		}

		DB::table('history_types')->truncate();

		$types = [
			[
				'id' => 1,
				'name' => 'User',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'id' => 2,
				'name' => 'Role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
		];

		DB::table('history_types')->insert($types);

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		}
	}
}