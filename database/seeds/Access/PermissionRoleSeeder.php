<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use App\Models\Access\Role\Role;
use Database\DisableForeignKeys;

/**
 * Class PermissionRoleSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('access.permission_role_table'));

        /*
         * Assign view backend to executive role as example
         */
        Role::find(2)->permissions()->sync([1]);

        $this->enableForeignKeys();
    }
}
