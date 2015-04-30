<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupAccessTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table(\Config::get('auth.table'), function ($table) {
			$table->boolean('status')->after('password')->default(true);
		});

		Schema::create(\Config::get('access.roles_table'), function ($table) {
			$table->increments('id')->unsigned();
			$table->string('name')->unique();
			$table->timestamps();
		});

		Schema::create(\Config::get('access.assigned_roles_table'), function ($table) {
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('role_id')->unsigned();
			$table->foreign('user_id')
				->references('id')
				->on(\Config::get('auth.table'))
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->foreign('role_id')->references('id')->on(\Config::get('access.roles_table'));
		});

		Schema::create(\Config::get('access.permissions_table'), function ($table) {
			$table->increments('id')->unsigned();
			$table->string('name')->unique();
			$table->string('display_name');
			$table->boolean('system')->default(false);
			$table->timestamps();
		});

		Schema::create(\Config::get('access.permission_role_table'), function ($table) {
			$table->increments('id')->unsigned();
			$table->integer('permission_id')->unsigned();
			$table->integer('role_id')->unsigned();
			$table->foreign('permission_id')
				->references('id')
				->on(\Config::get('access.permissions_table'));
			$table->foreign('role_id')
				->references('id')
				->on(\Config::get('access.roles_table'));
		});

		Schema::create(\Config::get('access.permission_user_table'), function ($table) {
			$table->increments('id')->unsigned();
			$table->integer('permission_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('permission_id')
				->references('id')
				->on(\Config::get('access.permissions_table'));
			$table->foreign('user_id')
				->references('id')
				->on(\Config::get('auth.table'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table(\Config::get('auth.table'), function(Blueprint $table)
		{
			$table->dropColumn('status');
		});

		Schema::table(\Config::get('access.assigned_roles_table'), function (Blueprint $table) {
			$table->dropForeign(\Config::get('access.assigned_roles_table').'_user_id_foreign');
			$table->dropForeign(\Config::get('access.assigned_roles_table').'_role_id_foreign');
		});

		Schema::table(\Config::get('access.permission_role_table'), function (Blueprint $table) {
			$table->dropForeign(\Config::get('access.permission_role_table').'_permission_id_foreign');
			$table->dropForeign(\Config::get('access.permission_role_table').'_role_id_foreign');
		});

		Schema::table(\Config::get('access.permission_user_table'), function (Blueprint $table) {
			$table->dropForeign(\Config::get('access.permission_user_table').'_permission_id_foreign');
			$table->dropForeign(\Config::get('access.permission_user_table').'_user_id_foreign');
		});

		Schema::drop(\Config::get('access.assigned_roles_table'));
		Schema::drop(\Config::get('access.permission_role_table'));
		Schema::drop(\Config::get('access.permission_user_table'));
		Schema::drop(\Config::get('access.roles_table'));
		Schema::drop(\Config::get('access.permissions_table'));
	}
}
