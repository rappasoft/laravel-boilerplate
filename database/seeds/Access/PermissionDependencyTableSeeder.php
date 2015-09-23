<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * Class PermissionDependencyTableSeeder
 */
class PermissionDependencyTableSeeder extends Seeder {

    /**
     *
     */
    public function run() {

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        if(env('DB_DRIVER') == 'mysql') {
            DB::table(config('access.permission_dependencies_table'))->truncate();
        } else { //For PostgreSQL or anything else
            DB::statement("TRUNCATE TABLE ".config('access.permission_dependencies_table')." CASCADE");
        }

        //View access management needs view backend
        DB::table(config('access.permission_dependencies_table'))->insert([
            'permission_id' => 2,
            'dependency_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //All of the access permissions need view access management and view backend
        for ($i = 3; $i <= 23; $i++) {
            DB::table(config('access.permission_dependencies_table'))->insert([
                'permission_id' => $i,
                'dependency_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            DB::table(config('access.permission_dependencies_table'))->insert([
                'permission_id' => $i,
                'dependency_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        if(env('DB_DRIVER') == 'mysql')
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}