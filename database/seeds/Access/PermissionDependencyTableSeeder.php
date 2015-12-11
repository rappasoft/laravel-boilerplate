<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionDependencyTableSeeder
 */
class PermissionDependencyTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {
        if (env('DB_DRIVER') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (env('DB_DRIVER') == 'mysql') {
            DB::table(config('access.permission_dependencies_table'))->truncate();
        } elseif (env('DB_DRIVER') == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.permission_dependencies_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.permission_dependencies_table') . ' CASCADE');
        }

        /**
         * View access management needs view backend
         */
        DB::table(config('access.permission_dependencies_table'))->insert([
            'permission_id' => DB::table('permissions')->where('name', 'view-access-management')->first()->id,
            'dependency_id' => DB::table('permissions')->where('name', 'view-backend')->first()->id,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        /**
         * All of the access permissions need view access management and view backend
         * Starts at id = 3 to skip view-backend, view-access-management
         */
        for ($i = 3; $i <= 23; $i++) {
            DB::table(config('access.permission_dependencies_table'))->insert([
                'permission_id' => $i,
                'dependency_id' => DB::table('permissions')->where('name', 'view-backend')->first()->id,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);

            DB::table(config('access.permission_dependencies_table'))->insert([
                'permission_id' => $i,
                'dependency_id' => DB::table('permissions')->where('name', 'view-access-management')->first()->id,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }

        /**
         * Other dependencies here, follow above structure
         * If you have many it would be a good idea to break this up into different files and require them here
         */

        /**
         * End other dependencies
         */

        if (env('DB_DRIVER') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
