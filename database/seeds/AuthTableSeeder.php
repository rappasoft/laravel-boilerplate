<?php

use Illuminate\Database\Seeder;

/**
 * Class AuthTableSeeder.
 */
class AuthTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $this->truncateMultiple([
            config('permission.table_names.model_has_permissions'),
            config('permission.table_names.model_has_roles'),
            config('permission.table_names.role_has_permissions'),
            config('permission.table_names.permissions'),
            config('permission.table_names.roles'),
            config('access.table_names.users'),
            config('access.table_names.password_histories'),
            'password_resets',
            'social_accounts',
        ]);

        $this->call(UserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);

        $this->enableForeignKeys();
    }
}
