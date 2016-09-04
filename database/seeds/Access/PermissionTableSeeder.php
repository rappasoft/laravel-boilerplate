<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionTableSeeder
 */
class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table(config('access.permissions_table'))->truncate();
            DB::table(config('access.permission_role_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.permissions_table'));
            DB::statement('DELETE FROM ' . config('access.permission_role_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.permissions_table') . ' CASCADE');
            DB::statement('TRUNCATE TABLE ' . config('access.permission_role_table') . ' CASCADE');
        }

        /**
         * Don't need to assign any permissions to administrator because the all flag is set to true
         * in RoleTableSeeder.php
         */

        /**
         * Misc Access Permissions
         */
        $permission_model          = config('access.permission');
        $viewBackend               = new $permission_model;
        $viewBackend->name         = 'view-backend';
        $viewBackend->display_name = 'View Backend';
        $viewBackend->sort         = 1;
        $viewBackend->created_at   = Carbon::now();
        $viewBackend->updated_at   = Carbon::now();
        $viewBackend->save();

        /**
         * Access Permissions
         */
        $permission_model          = config('access.permission');
        $manageUsers               = new $permission_model;
        $manageUsers->name         = 'manage-users';
        $manageUsers->display_name = 'Manage Users';
        $manageUsers->sort         = 2;
        $manageUsers->created_at   = Carbon::now();
        $manageUsers->updated_at   = Carbon::now();
        $manageUsers->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'manage-roles';
        $manageRoles->display_name = 'Manage Roles';
        $manageRoles->sort         = 3;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->save();

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}