<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRoleSeeder
 */
class UserRoleSeeder extends Seeder
{
    public function run()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (env('DB_CONNECTION') == 'mysql') {
            DB::table(config('access.assigned_roles_table'))->truncate();
        } elseif (env('DB_CONNECTION') == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.assigned_roles_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.assigned_roles_table') . ' CASCADE');
        }

        //Attach admin role to admin user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model;
        $user_model::first()->attachRole(1);

        //Attach user role to general user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model;
        $user_model::find(2)->attachRole(2);

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}