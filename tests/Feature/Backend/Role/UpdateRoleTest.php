<?php

namespace Tests\Feature\Backend\Role;

use App\Domains\Auth\Events\Role\RoleUpdated;
use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

/**
 * Class UpdateRoleTest.
 */
class UpdateRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_name_is_required()
    {
        $role = factory(Role::class)->create();

        $this->loginAsAdmin();

        $response = $this->patch("/admin/auth/role/{$role->id}");

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_role_name_can_be_updated()
    {
        Event::fake();

        $role = factory(Role::class)->create();

        $this->loginAsAdmin();

        $this->patch("/admin/auth/role/{$role->id}", [
            'type' => User::TYPE_ADMIN,
            'name' => 'new name',
            'permissions' => [
                Permission::whereName('admin.access.user.list')->first()->id,
            ],
        ]);

        $this->assertDatabaseHas('roles', [
            'type' => User::TYPE_ADMIN,
            'name' => 'new name',
        ]);

        $this->assertDatabaseHas('role_has_permissions', [
            'permission_id' => Permission::whereName('admin.access.user.list')->first()->id,
            'role_id' => Role::whereName('new name')->first()->id,
        ]);

        Event::assertDispatched(RoleUpdated::class);
    }

    /** @test */
    public function the_admin_role_can_not_be_updated()
    {
        $this->loginAsAdmin();

        $role = Role::whereName(config('boilerplate.access.role.admin'))->first();

        $response = $this->patch("/admin/auth/role/{$role->id}", [
            'name' => 'new name',
        ]);

        $response->assertSessionHas(['flash_danger' => __('You can not edit the Administrator role.')]);

        $this->assertDatabaseMissing('roles', [
            'name' => 'new name',
        ]);
    }

    /** @test */
    public function only_admin_can_edit_roles()
    {
        $this->loginAsAdmin();

        $role = factory(Role::class)->create(['name' => 'current name']);

        $this->get("/admin/auth/role/{$role->id}/edit")->assertOk();
    }

    /** @test */
    public function the_admin_role_can_not_be_edited()
    {
        $this->loginAsAdmin();

        $role = Role::whereName(config('boilerplate.access.role.admin'))->first();

        $response = $this->get("/admin/auth/role/{$role->id}/edit");

        $response->assertSessionHas(['flash_danger' => __('You can not edit the Administrator role.')]);
    }

    /** @test */
    public function a_non_admin_can_not_edit_roles()
    {
        $this->actingAs(factory(User::class)->create());

        $role = factory(Role::class)->create(['name' => 'current name']);

        $response = $this->get("/admin/auth/role/{$role->id}/edit");

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function only_admin_can_update_roles()
    {
        $this->actingAs(factory(User::class)->state('admin')->create());

        $role = factory(Role::class)->create(['name' => 'current name']);

        $response = $this->patch("/admin/auth/role/{$role->id}", [
            'name' => 'new name',
        ]);

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));

        $this->assertDatabaseHas(config('permission.table_names.roles'), [
            'id' => $role->id,
            'name' => 'current name',
        ]);
    }
}
