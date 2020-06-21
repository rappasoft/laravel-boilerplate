<?php

namespace Tests;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();

        factory(Role::class)->create([
            'id' => config('boilerplate.access.role.default'),
            'name' => 'Member',
        ]);
    }

    /**
     * Create the admin role or return it if it already exists.
     *
     * @return mixed
     */
    protected function getAdminRole()
    {
        if ($role = Role::whereName(config('boilerplate.access.role.admin'))->first()) {
            return $role;
        }

        $adminRole = factory(Role::class)->create(['name' => config('boilerplate.access.role.admin')]);
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

    /**
     * Log the user out
     */
    protected function logout()
    {
        return auth()->logout();
    }
}
