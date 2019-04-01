<?php

namespace Tests\Feature\Backend\Role;

use Tests\TestCase;
use App\Models\Auth\Role;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Auth\Role\RoleUpdated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_edit_role_page()
    {
        $role = factory(Role::class)->create();
        $this->loginAsAdmin();

        $this->get("/admin/auth/role/{$role->id}/edit")->assertStatus(200);
    }

    /** @test */
    public function name_is_required()
    {
        $role = factory(Role::class)->create();
        $this->loginAsAdmin();

        $response = $this->patch("/admin/auth/role/{$role->id}", ['name' => '']);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function at_least_one_permission_is_required()
    {
        $role = factory(Role::class)->create();
        $this->loginAsAdmin();

        $response = $this->patch("/admin/auth/role/{$role->id}", ['name' => 'new role']);

        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.roles.needs_permission')]);
    }

    /** @test */
    public function a_role_name_can_be_updated()
    {
        $role = factory(Role::class)->create();
        $this->loginAsAdmin();

        $this->patch("/admin/auth/role/{$role->id}", ['name' => 'new name', 'permissions' => ['view backend']]);

        $this->assertSame('new name', $role->fresh()->name);
    }

    /** @test */
    public function an_event_gets_dispatched()
    {
        $role = factory(Role::class)->create();
        Event::fake();
        $this->loginAsAdmin();

        $this->patch("/admin/auth/role/{$role->id}", ['name' => 'new name', 'permissions' => ['view backend']]);

        Event::assertDispatched(RoleUpdated::class);
    }
}
