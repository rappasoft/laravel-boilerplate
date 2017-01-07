<?php

/**
 * Class UserRoleTest.
 */
class UserRoleTest extends TestCase
{
    public function testAttachRoleToUserById()
    {
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole->id);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testAttachRoleToUserByObject()
    {
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testDetachRoleByIdFromUser()
    {
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole->id);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->detachRole($this->adminRole->id);
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testDetachRoleByObjectFromUser()
    {
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->detachRole($this->adminRole);
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testAttachRolesByIdToUser()
    {
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole->id, $this->executiveRole->id]);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }

    public function testAttachRolesByObjectToUser()
    {
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole, $this->executiveRole]);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }

    public function testDetachRolesByIdFromUser()
    {
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole->id, $this->executiveRole->id]);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->detachRoles([$this->adminRole->id, $this->executiveRole->id]);
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }

    public function testDetachRolesByObjectFromUser()
    {
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole, $this->executiveRole]);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->detachRoles([$this->adminRole, $this->executiveRole]);
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }
}
