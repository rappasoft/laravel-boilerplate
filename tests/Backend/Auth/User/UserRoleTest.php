<?php

namespace Tests\Backend\Auth\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class UserRoleTest.
 */
class UserRoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function attach_and_detach_role_from_user_by_object()
    {
        $this->assertDatabaseMissing(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->assignRole($this->adminRole);
        $this->assertDatabaseHas(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->removeRole($this->adminRole);
        $this->assertDatabaseMissing(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    /** @test */
    public function attach_and_detach_roles_by_object_from_user()
    {
        $this->assertDatabaseMissing(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseMissing(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->assignRole($this->adminRole, $this->executiveRole);
        $this->assertDatabaseHas(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseHas(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->syncRoles([]);
        $this->assertDatabaseMissing(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseMissing(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }
}
