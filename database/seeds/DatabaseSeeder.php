<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		/*
		 * Auth Based Seeders
		 */
		//$this->call('UserTableSeeder');

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
