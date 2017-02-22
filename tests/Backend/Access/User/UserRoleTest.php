<?php

use Tests\BrowserKitTestCase;

/**
 * Class UserRoleTest.
 */
class UserRoleTest extends BrowserKitTestCase
{
    public function testAttachRoleToUserById()
    {
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole->id);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testAttachRoleToUserByObject()
    {
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testDetachRoleByIdFromUser()
    {
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole->id);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->detachRole($this->adminRole->id);
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testDetachRoleByObjectFromUser()
    {
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->detachRole($this->adminRole);
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testAttachRolesByIdToUser()
    {
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole->id, $this->executiveRole->id]);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }

    public function testAttachRolesByObjectToUser()
    {
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole, $this->executiveRole]);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }

    public function testDetachRolesByIdFromUser()
    {
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole->id, $this->executiveRole->id]);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->detachRoles([$this->adminRole->id, $this->executiveRole->id]);
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }

    public function testDetachRolesByObjectFromUser()
    {
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole, $this->executiveRole]);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->seeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->detachRoles([$this->adminRole, $this->executiveRole]);
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase(config('access.role_user_table'), ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }
}
