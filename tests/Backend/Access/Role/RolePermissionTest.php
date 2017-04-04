<?php

use Tests\BrowserKitTestCase;
use App\Models\Access\Permission\Permission;

class RolePermissionTest extends BrowserKitTestCase
{
    public function testSavePermissionsToRole()
    {
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->permissions()->sync([1]);
        $this->seeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testEmptyPermissionsFromRole()
    {
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->permissions()->sync([1]);
        $this->seeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->permissions()->sync([]);
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testAttachPermissionToRoleById()
    {
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->attachPermission(1);
        $this->seeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testAttachPermissionToRoleByObject()
    {
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->attachPermission(Permission::findOrFail(1));
        $this->seeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testDetachPermissionFromRoleById()
    {
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->attachPermission(1);
        $this->seeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->detachPermission(1);
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testDetachPermissionFromRoleByObject()
    {
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->attachPermission(Permission::findOrFail(1));
        $this->seeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->detachPermission(Permission::findOrFail(1));
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testAttachPermissionsToRoleById()
    {
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->attachPermissions([1]);
        $this->seeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testAttachPermissionsToRoleByObject()
    {
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->attachPermissions([Permission::findOrFail(1)]);
        $this->seeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testDetachPermissionsFromRoleById()
    {
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->attachPermissions([1]);
        $this->seeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->detachPermissions([1]);
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }

    public function testDetachPermissionsFromRoleByObject()
    {
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->attachPermissions([Permission::findOrFail(1)]);
        $this->seeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
        $this->userRole->detachPermissions([Permission::findOrFail(1)]);
        $this->notSeeInDatabase(config('access.permission_role_table'), ['permission_id' => 1, 'role_id' => $this->userRole->id]);
    }
}
