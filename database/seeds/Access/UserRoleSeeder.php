<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        if (env('DB_DRIVER') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (env('DB_DRIVER') == 'mysql') {
            DB::table(config('access.assigned_roles_table'))->truncate();
        } elseif (env('DB_DRIVER') == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.assigned_roles_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.assigned_roles_table') . ' CASCADE');
        }

        //Attach admin role to admin user
        $user_model = config('auth.model');
        $user_model = new $user_model;
        $user_model::first()->attachRole(1);

        //Attach user role to general user
        $user_model = config('auth.model');
        $user_model = new $user_model;
        $user_model::find(2)->attachRole(2);

        if (env('DB_DRIVER') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
