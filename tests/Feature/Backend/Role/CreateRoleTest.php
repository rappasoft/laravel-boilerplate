<?php

namespace Tests\Feature\Backend\Role;

use App\Domains\Auth\Events\Role\RoleCreated;
use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

/**
 * Class CreateRoleTest.
 */
class CreateRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_role_page()
    {
        $this->loginAsAdmin();

        $this->get('/admin/auth/role/create')->assertOk();
    }

    /** @test */
    public function create_role_requires_validation()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/auth/role');

        $response->assertSessionHasErrors('type', 'name');
    }

    /** @test */
    public function the_name_must_be_unique()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/auth/role', ['name' => config('boilerplate.access.role.admin')]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_role_can_be_created()
    {
        Event::fake();

        $this->loginAsAdmin();

        $this->post('/admin/auth/role', [
            'type' => User::TYPE_ADMIN,
            'name' => 'new role',
            'permissions' => [
                Permission::whereName('admin.access.user.list')->first()->id,
            ],
        ]);

        $this->assertDatabaseHas('roles', [
            'type' => User::TYPE_ADMIN,
            'name' => 'new role',
        ]);

        $this->assertDatabaseHas('role_has_permissions', [
            'permission_id' => Permission::whereName('admin.access.user.list')->first()->id,
            'role_id' => Role::whereName('new role')->first()->id,
        ]);

        Event::assertDispatched(RoleCreated::class);
    }

    /** @test */
    public function only_admin_can_create_roles()
    {
        $this->actingAs(factory(User::class)->state('admin')->create());

        $response = $this->get('/admin/auth/role/create');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }
}
