<?php

namespace Tests\Backend\Auth\Role;

use Tests\TestCase;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolePermissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function permissions_can_be_synced_to_roles()
    {
        $this->setUpAcl();

        $this->assertDatabaseMissing(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->syncPermissions('view backend');
        $this->assertDatabaseHas(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    /** @test */
    public function a_role_can_empty_the_synced_permissions()
    {
        $this->setUpAcl();

        $this->assertDatabaseMissing(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->givePermissionTo('view backend');
        $this->assertDatabaseHas(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->syncPermissions([]);
        $this->assertDatabaseMissing(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    /** @test */
    public function attach_permission_to_roles_by_object()
    {
        $this->setUpAcl();

        $this->assertDatabaseMissing(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->givePermissionTo(Permission::findOrFail(1));
        $this->assertDatabaseHas(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    /** @test */
    public function detach_permissions_from_roles_by_object()
    {
        $this->setUpAcl();

        $this->assertDatabaseMissing(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->givePermissionTo(Permission::findOrFail(1));
        $this->assertDatabaseHas(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->revokePermissionTo(Permission::findOrFail(1));
        $this->assertDatabaseMissing(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    /** @test */
    public function attach_permissions_to_role_by_object()
    {
        $this->setUpAcl();

        $this->assertDatabaseMissing(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->givePermissionTo([Permission::findOrFail(1)]);
        $this->assertDatabaseHas(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    /** @test */
    public function detach_permissions_from_role_by_object()
    {
        $this->setUpAcl();

        $this->assertDatabaseMissing(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->givePermissionTo([Permission::findOrFail(1)]);
        $this->assertDatabaseHas(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->syncPermissions([]);
        $this->assertDatabaseMissing(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }
}
