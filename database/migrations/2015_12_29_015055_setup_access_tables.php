<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupAccessTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(config('access.users_table'), function ($table) {
            $table->tinyInteger('status')->after('password')->default(1)->unsigned();
        });

        Schema::create(config('access.roles_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->boolean('all')->default(false);
            $table->smallInteger('sort')->default(0)->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');

            /**
             * Add Foreign/Unique/Index
             */
            $table->unique('name');
        });

        Schema::create(config('access.assigned_roles_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id')
                ->references('id')
                ->on(config('access.users_table'))
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on(config('access.roles_table'))
                ->onDelete('cascade');
        });

        Schema::create(config('access.permissions_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('group_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('display_name');
            $table->boolean('system')->default(false);
            $table->smallInteger('sort')->default(0)->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');

            /**
             * Add Foreign/Unique/Index
             */
            $table->unique('name');
        });

        Schema::create(config('access.permission_group_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('parent_id')->nullable();
            $table->string('name');
            $table->smallInteger('sort')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');
        });

        Schema::create(config('access.permission_role_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('permission_id')
                ->references('id')
                ->on(config('access.permissions_table'))
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on(config('access.roles_table'))
                ->onDelete('cascade');
        });

        Schema::create(config('access.permission_dependencies_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->integer('dependency_id')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('permission_id')
                ->references('id')
                ->on(config('access.permissions_table'))
                ->onDelete('cascade');

            $table->foreign('dependency_id')
                ->references('id')
                ->on(config('access.permissions_table'))
                ->onDelete('cascade');
        });

        Schema::create(config('access.permission_user_table'), function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->integer('user_id')->unsigned();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('permission_id')
                ->references('id')
                ->on(config('access.permissions_table'))
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on(config('access.users_table'))
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(config('access.users_table'), function (Blueprint $table) {
            $table->dropColumn('status');
        });

        /**
         * Remove Foreign/Unique/Index
         */
        Schema::table(config('access.roles_table'), function (Blueprint $table) {
            $table->dropUnique(config('access.roles_table') . '_name_unique');
        });

        Schema::table(config('access.assigned_roles_table'), function (Blueprint $table) {
            $table->dropForeign(config('access.assigned_roles_table') . '_user_id_foreign');
            $table->dropForeign(config('access.assigned_roles_table') . '_role_id_foreign');
        });

        Schema::table(config('access.permissions_table'), function (Blueprint $table) {
            $table->dropUnique(config('access.permissions_table') . '_name_unique');
        });

        Schema::table(config('access.permission_role_table'), function (Blueprint $table) {
            $table->dropForeign(config('access.permission_role_table') . '_permission_id_foreign');
            $table->dropForeign(config('access.permission_role_table') . '_role_id_foreign');
        });

        Schema::table(config('access.permission_user_table'), function (Blueprint $table) {
            $table->dropForeign(config('access.permission_user_table') . '_permission_id_foreign');
            $table->dropForeign(config('access.permission_user_table') . '_user_id_foreign');
        });

        Schema::table(config('access.permission_dependencies_table'), function (Blueprint $table) {
            $table->dropForeign('permission_dependencies_permission_id_foreign');
            $table->dropForeign('permission_dependencies_dependency_id_foreign');
        });

        /**
         * Drop tables
         */
        Schema::drop(config('access.assigned_roles_table'));
        Schema::drop(config('access.permission_role_table'));
        Schema::drop(config('access.permission_user_table'));
        Schema::drop(config('access.permission_group_table'));
        Schema::drop(config('access.roles_table'));
        Schema::drop(config('access.permissions_table'));
        Schema::drop(config('access.permission_dependencies_table'));
    }
}
