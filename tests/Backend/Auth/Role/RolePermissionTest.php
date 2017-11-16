<?php

use Tests\BrowserKitTestCase;
use Spatie\Permission\Models\Permission;

class RolePermissionTest extends BrowserKitTestCase
{
    public function testSavePermissionsToRole()
    {
        $this->notSeeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->syncPermissions('view backend');
        $this->seeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testEmptyPermissionsFromRole()
    {
        $this->notSeeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->givePermissionTo('view backend');
        $this->seeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->syncPermissions([]);
        $this->notSeeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testAttachPermissionToRoleByObject()
    {
        $this->notSeeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->givePermissionTo(Permission::findOrFail(1));
        $this->seeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testDetachPermissionFromRoleByObject()
    {
        $this->notSeeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->givePermissionTo(Permission::findOrFail(1));
        $this->seeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->revokePermissionTo(Permission::findOrFail(1));
        $this->notSeeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testAttachPermissionsToRoleByObject()
    {
        $this->notSeeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->givePermissionTo([Permission::findOrFail(1)]);
        $this->seeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testDetachPermissionsFromRoleByObject()
    {
        $this->notSeeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->givePermissionTo([Permission::findOrFail(1)]);
        $this->seeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->syncPermissions([]);
        $this->notSeeInDatabase(config('permission.table_names.role_has_permissions'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }
}
