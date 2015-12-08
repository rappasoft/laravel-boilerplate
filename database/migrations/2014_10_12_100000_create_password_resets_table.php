<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('password_resets', function(Blueprint $table)
		{
			$table->string('email');
			$table->string('token');
			$table->timestamp('created_at');

			/**
			 * Add Foreign/Unique/Index
			 */
			$table->index('email');
			$table->index('token');
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
		Schema::table('password_resets', function (Blueprint $table) {
			$table->dropIndex('password_resets_email_index');
			$table->dropIndex('password_resets_token_index');
		});

		Schema::drop('password_resets');
	}
}
