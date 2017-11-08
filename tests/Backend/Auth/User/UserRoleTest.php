<?php

use Tests\BrowserKitTestCase;

/**
 * Class UserRoleTest.
 */
class UserRoleTest extends BrowserKitTestCase
{
    public function testAttachRoleToUserByObject()
    {
        $this->notSeeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->assignRole($this->adminRole);
        $this->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testDetachRoleByObjectFromUser()
    {
        $this->notSeeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->assignRole($this->adminRole);
        $this->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->removeRole($this->adminRole);
        $this->notSeeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testAttachRolesByObjectToUser()
    {
        $this->notSeeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->assignRole([$this->adminRole, $this->executiveRole]);
        $this->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }

    public function testDetachRolesByObjectFromUser()
    {
        $this->notSeeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->assignRole($this->adminRole, $this->executiveRole);
        $this->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->syncRoles([]);
        $this->notSeeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }
}
