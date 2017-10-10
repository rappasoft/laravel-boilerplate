<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create(['name' => 'administrator']);
        $executive = Role::create(['name' => 'executive']);
        $user = Role::create(['name' => 'user']);

        // Create Permissions
        Permission::create(['name' => 'view backend']);

        // ALWAYS GIVE ADMIN ALL ROLES
        $admin->givePermissionTo('view backend');

        // Assign Permissions to other Roles
        $executive->givePermissionTo('view backend');

        $this->enableForeignKeys();
    }
}
