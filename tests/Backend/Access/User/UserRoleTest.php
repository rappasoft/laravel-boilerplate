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

    public function testGetUsersByPermissionUsingName() {
		//return app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)->getByPermission('view-backend');
	}

	public function testGetUsersByPermissionsUsingNames() {
		//return app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)->getByPermission(['view-backend', 'manage-users']);
	}

	public function testGetUsersByPermissionUsingId() {
		//return app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)->getByPermission(1, 'id');
	}

	public function testGetUsersByPermissionsUsingIds() {
		//return app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)->getByPermission([1, 2], 'id');
	}

	public function testGetUsersByRoleUsingName() {
		//return app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)->getByRole('User');
	}

	public function testGetUsersByRolesUsingNames() {
		//return app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)->getByRole(['Executive', 'User']);
	}

	public function testGetUsersByRoleUsingId() {
		//return app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)->getByRole(3, 'id');
	}

	public function testGetUsersByRolesUsingIds() {
		//return app()->make(\App\Repositories\Backend\Access\User\UserRepository::class)->getByRole([2, 3], 'id');
	}
}
