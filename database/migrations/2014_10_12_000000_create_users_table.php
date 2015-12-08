<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name');
			$table->string('email');
			$table->string('password', 60)->nullable();
			$table->string('confirmation_code');
			$table->boolean('confirmed')->default(config('access.users.confirm_email') ? false : true);
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();

			/**
			 * Add Foreign/Unique/Index
			 */
			$table->unique('email');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		/**
		 * Remove Foreign/Unique/Index
		 */
		Schema::table('users', function (Blueprint $table) {
			$table->dropUnique('users_email_unique');
		});

		Schema::drop('users');
	}
}
