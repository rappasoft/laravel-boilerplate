<?php

namespace Tests\Feature\Backend\Role;

use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $this->withoutMiddleware(RequirePassword::class);

        $role = factory(Role::class)->create();

        $this->loginAsAdmin();

        $response = $this->patch("/admin/auth/role/{$role->id}");

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_role_name_can_be_updated()
    {
        $this->withoutMiddleware(RequirePassword::class);

        $role = factory(Role::class)->create();

        $this->loginAsAdmin();

        $this->patch("/admin/auth/role/{$role->id}", [
            'name' => 'new name',
            'permissions' => ['view backend'],
        ]);

        $this->assertDatabaseHas('roles', [
            'name' => 'new name',
        ]);
    }

    /** @test */
    public function the_admin_role_can_not_be_updated()
    {
        $this->withoutMiddleware(RequirePassword::class);

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
    public function only_admin_can_update_roles()
    {
        $this->actingAs(factory(User::class)->create());

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
