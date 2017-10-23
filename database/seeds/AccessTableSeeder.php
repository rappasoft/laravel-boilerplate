<?php

use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;

/**
 * Class AccessTableSeeder.
 */
class AccessTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(PermissionRoleSeeder::class);

        $this->enableForeignKeys();
    }
}
