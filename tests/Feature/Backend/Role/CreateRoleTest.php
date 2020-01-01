<?php

namespace Tests\Feature\Backend\Role;

use App\Events\Backend\Auth\Role\RoleCreated;
use App\Models\Auth\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CreateRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_role_page()
    {
        $this->loginAsAdmin();

        $this->get('/admin/auth/role/create')->assertStatus(200);
    }

    /** @test */
    public function the_name_is_required()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/auth/role', ['name' => '']);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function the_name_must_be_unique()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/auth/role', ['name' => config('access.users.admin_role')]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function at_least_one_permission_is_required()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/auth/role', ['name' => 'new role']);

        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.roles.needs_permission')]);
    }

    /** @test */
    public function a_role_can_be_created()
    {
        $this->loginAsAdmin();

        $this->post('/admin/auth/role', ['name' => 'new role', 'permissions' => ['view backend']]);

        $role = Role::where(['name' => 'new role'])->first();

        $this->assertTrue($role->hasPermissionTo('view backend'));
    }

    /** @test */
    public function an_event_gets_dispatched()
    {
        $this->loginAsAdmin();
        Event::fake();

        $this->post('/admin/auth/role', ['name' => 'new role', 'permissions' => ['view backend']]);

        Event::assertDispatched(RoleCreated::class);
    }
}
