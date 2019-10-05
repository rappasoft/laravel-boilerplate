<?php

namespace Tests;

use App\Models\Auth\Role;
use App\Models\Auth\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create the admin role or return it if it already exists.
     *
     * @return mixed
     */
    protected function getSuperAdminRole()
    {
        if ($role = Role::whereName(config('access.users.super_admin_role'))->first()) {
            return $role;
        }

        $superAdminRole = factory(Role::class)->create(['name' => config('access.users.super_admin_role')]);
        $superAdminRole->givePermissionTo(factory(Permission::class)->create(['name' => 'view backend']));

        return $superAdminRole;
    }
    /**
     * Create the admin role or return it if it already exists.
     *
     * @return mixed
     */
    protected function getAdminRole()
    {
        if ($role = Role::whereName(config('access.users.admin_role'))->first()) {
            return $role;
        }

        $adminRole = factory(Role::class)->create(['name' => config('access.users.admin_role')]);
        $adminRole->givePermissionTo(factory(Permission::class)->create(['name' => 'view backend']));

        return $adminRole;
    }

    /**
     * Create an administrator.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    protected function createAdmin(array $attributes = [])
    {
        $adminRole = $this->getAdminRole();
        $admin = factory(User::class)->create($attributes);
        $admin->assignRole($adminRole);

        return $admin;
    }
    /**
     * Create an super administrator.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    protected function createSuperAdmin(array $attributes = [])
    {
        $superAdminRole = $this->getSuperAdminRole();
        $superAdmin = factory(User::class)->create($attributes);
        $superAdmin->assignRole($superAdminRole);

        return $superAdmin;
    }

    /**
     * Login the given administrator or create the first if none supplied.
     *
     * @param bool $admin
     *
     * @return bool|mixed
     */
    protected function loginAsAdmin($admin = false)
    {
        if (! $admin) {
            $admin = $this->createAdmin();
        }

        $this->actingAs($admin);

        return $admin;
    }
    protected function loginAsSuperAdmin($superAdmin = false)
    {
        if (! $superAdmin) {
            $superAdmin = $this->createSuperAdmin();
        }

        $this->actingAs($superAdmin);

        return $superAdmin;
    }
}
