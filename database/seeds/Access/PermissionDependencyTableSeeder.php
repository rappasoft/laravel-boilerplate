<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermissionDependencyTableSeeder extends Seeder {

    public function run() {

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        if(env('DB_DRIVER') == 'mysql') {
            DB::table(config('access.permission_dependencies_table'))->truncate();
        } else { //For PostgreSQL or anything else
            DB::statement("TRUNCATE TABLE ".config('access.permission_dependencies_table')." CASCADE");
        }

        //Add dependencies to built in permissions

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}