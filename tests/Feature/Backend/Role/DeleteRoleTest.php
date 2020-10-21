<?php

namespace Tests\Feature\Backend\Role;

use App\Domains\Auth\Events\Role\RoleDeleted;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

/**
 * Class DeleteRoleTest.
 */
class DeleteRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_role_can_be_deleted()
    {
        Event::fake();

        $role = Role::factory()->create();

        $this->loginAsAdmin();

        $this->assertDatabaseHas(config('permission.table_names.roles'), ['id' => $role->id]);

        $this->delete("/admin/auth/role/{$role->id}");

        $this->assertDatabaseMissing(config('permission.table_names.roles'), ['id' => $role->id]);

        Event::assertDispatched(RoleDeleted::class);
    }

    /** @test */
    public function the_admin_role_can_not_be_deleted()
    {
        $this->loginAsAdmin();

        $role = Role::whereName(config('boilerplate.access.role.admin'))->first();

        $response = $this->delete('/admin/auth/role/'.$role->id);

        $response->assertSessionHas(['flash_danger' => __('You can not delete the Administrator role.')]);

        $this->assertDatabaseHas(config('permission.table_names.roles'), ['id' => $role->id]);
    }

    /** @test */
    public function a_role_with_assigned_users_cant_be_deleted()
    {
        $this->loginAsAdmin();

        $role = Role::factory()->create();
        $user = User::factory()->create();
        $user->assignRole($role);

        $response = $this->delete('/admin/auth/role/'.$role->id);

        $response->assertSessionHas(['flash_danger' => __('You can not delete a role with associated users.')]);

        $this->assertDatabaseHas(config('permission.table_names.roles'), ['id' => $role->id]);
    }

    /** @test */
    public function only_admin_can_delete_roles()
    {
        $this->actingAs(User::factory()->admin()->create());

        $role = Role::factory()->create();

        $response = $this->delete('/admin/auth/role/'.$role->id);

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));

        $this->assertDatabaseHas(config('permission.table_names.roles'), ['id' => $role->id]);
    }
}
