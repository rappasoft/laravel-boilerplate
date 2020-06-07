<?php

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        Role::create([
            'id' => config('boilerplate.access.roles.admin'),
            'name' => 'Administrator',
        ]);

        Role::create([
            'id' => config('boilerplate.access.roles.default'),
            'name' => 'Member',
        ]);

        // Non Grouped Permissions
        Permission::create([
            'name' => 'view backend',
            'description' => 'Access Administration',
        ]);

        // Access master category
        $access = Permission::create([
            'name' => 'access',
            'description' => 'All Access Permissions',
        ]);

        // Users category
        $users = Permission::create([
            'parent_id' => $access->id,
            'name' => 'access.users',
            'description' => 'All User Permissions',
        ]);

        $users->children()->saveMany([
            new Permission([
                'name' => 'access.users.list',
                'description' => 'View Users',
            ]),
            new Permission([
                'name' => 'access.users.create',
                'description' => 'Create Users',
                'sort' => 2,
            ]),
            new Permission([
                'name' => 'access.users.update',
                'description' => 'Update Users',
                'sort' => 3,
            ]),
            new Permission([
                'name' => 'access.users.delete',
                'description' => 'Delete Users',
                'sort' => 4,
            ]),
            new Permission([
                'name' => 'access.users.restore',
                'description' => 'Restore Users',
                'sort' => 6,
            ]),
            new Permission([
                'name' => 'access.users.deactivate',
                'description' => 'Deactivate Users',
                'sort' => 7,
            ]),
            new Permission([
                'name' => 'access.users.reactivate',
                'description' => 'Reactivate Users',
                'sort' => 8,
            ]),
            new Permission([
                'name' => 'access.users.clear-session',
                'description' => 'Clear User Sessions',
                'sort' => 9,
            ]),
            new Permission([
                'name' => 'access.users.impersonate',
                'description' => 'Impersonate Users',
                'sort' => 10,
            ]),
            new Permission([
                'name' => 'access.users.change-password',
                'description' => 'Change User Passwords',
                'sort' => 11,
            ]),
        ]);

        if (config('boilerplate.access.users.permanently_delete')) {
            $users->children()->create([
                'name'        => 'access.users.permanently-delete',
                'description' => 'Permanently Delete Users',
                'sort'        => 5,
            ]);
        }

        // Roles category
        Permission::create([
            'parent_id' => $access->id,
            'name' => 'access.roles',
            'description' => 'All Role Permissions',
            'sort' => 2,
        ])->children()->saveMany([
            new Permission([
                'name' => 'access.roles.list',
                'description' => 'View Roles',
            ]),
            new Permission([
                'name' => 'access.roles.create',
                'description' => 'Create Roles',
                'sort' => 2,
            ]),
            new Permission([
                'name' => 'access.roles.update',
                'description' => 'Update Roles',
                'sort' => 3,
            ]),
            new Permission([
                'name' => 'access.roles.delete',
                'description' => 'Delete Roles',
                'sort' => 4,
            ]),
        ]);

        // Assign Permissions to other Roles
        // Note: Admin (User 1) Has all permissions via a gate in the AuthServiceProvider
        // $user->givePermissionTo('view backend');

        $this->enableForeignKeys();
    }
}
