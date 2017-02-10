<?php

namespace Tests\Backend\Access\User;

use Tests\TestCase;

/**
 * Class UserRoleTest.
 */
class UserRoleTest extends TestCase
{
    public function testAttachRoleToUserById()
    {
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole->id);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testAttachRoleToUserByObject()
    {
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testDetachRoleByIdFromUser()
    {
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole->id);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->detachRole($this->adminRole->id);
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testDetachRoleByObjectFromUser()
    {
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->attachRole($this->adminRole);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->user->detachRole($this->adminRole);
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
    }

    public function testAttachRolesByIdToUser()
    {
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole->id, $this->executiveRole->id]);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }

    public function testAttachRolesByObjectToUser()
    {
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole, $this->executiveRole]);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }

    public function testDetachRolesByIdFromUser()
    {
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole->id, $this->executiveRole->id]);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->detachRoles([$this->adminRole->id, $this->executiveRole->id]);
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }

    public function testDetachRolesByObjectFromUser()
    {
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->attachRoles([$this->adminRole, $this->executiveRole]);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseHas('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
        $this->user->detachRoles([$this->adminRole, $this->executiveRole]);
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
        $this->assertDatabaseMissing('role_user', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
    }
}
