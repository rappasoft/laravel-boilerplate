<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;

/**
 * Class UserRoleSeeder.
 */
class UserRoleSeeder extends Seeder
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
        $this->truncate(config('access.role_user_table'));

        //Attach admin role to admin user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model();
        $user_model::first()->attachRole(1);

        //Attach executive role to executive user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model();
        $user_model::find(2)->attachRole(2);

        //Attach user role to general user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model();
        $user_model::find(3)->attachRole(3);

        $this->enableForeignKeys();
    }
}
