<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionDependencyTableSeeder
 */
class PermissionDependencyTableSeeder extends Seeder
{
    public function run()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (env('DB_CONNECTION') == 'mysql') {
            DB::table(config('access.permission_dependencies_table'))->truncate();
        } elseif (env('DB_CONNECTION') == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.permission_dependencies_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.permission_dependencies_table') . ' CASCADE');
        }
        
        $permission1Id = DB::table('permissions')->where('name', 'view-backend')->first()->id;
        $permission2Id = DB::table('permissions')->where('name', 'view-access-management')->first()->id;
        
        /**
         * View access management needs view backend
         */
        DB::table(config('access.permission_dependencies_table'))->insert([
            'permission_id' => $permission2Id,
            'dependency_id' => $permission1Id,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        /**
         * All of the access permissions need view access management and view backend
         * Starts at id = 3 to skip view-backend, view-access-management
         */
        $remainingPermissionsIds = DB::table('permissions')->where('id', '>', 2)->pluck('id');
        
        foreach ($remainingPermissionsIds as $remainingPermissionId) {
            DB::table(config('access.permission_dependencies_table'))->insert([
                'permission_id' => $remainingPermissionId,
                'dependency_id' => $permission1Id,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);

            DB::table(config('access.permission_dependencies_table'))->insert([
                'permission_id' => $remainingPermissionId,
                'dependency_id' => $permission2Id,
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

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
