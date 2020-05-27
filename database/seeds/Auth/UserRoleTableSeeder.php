<?php

use App\Domains\Auth\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        User::find(1)->assignRole(config('boilerplate.access.roles.admin'));

        if (app()->environment(['local', 'testing'])) {
            User::find(2)->assignRole(config('boilerplate.access.roles.default'));
        }

        $this->enableForeignKeys();
    }
}
