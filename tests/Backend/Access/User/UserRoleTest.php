<?php

/**
 * Class UserRoleTest
 */
class UserRoleTest extends TestCase {

	public function testAttachRoleToUserById() {
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->user->attachRole($this->adminRole->id);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
	}

	public function testAttachRoleToUserByObject() {
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->user->attachRole($this->adminRole);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
	}

	public function testDetachRoleByIdFromUser() {
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->user->attachRole($this->adminRole->id);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->user->detachRole($this->adminRole->id);
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
	}

	public function testDetachRoleByObjectFromUser() {
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->user->attachRole($this->adminRole);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->user->detachRole($this->adminRole);
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
	}

	public function testAttachRolesByIdToUser() {
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
		$this->user->attachRoles([$this->adminRole->id, $this->executiveRole->id]);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
	}

	public function testAttachRolesByObjectToUser() {
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
		$this->user->attachRoles([$this->adminRole, $this->executiveRole]);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
	}

	public function testDetachRolesByIdFromUser() {
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
		$this->user->attachRoles([$this->adminRole->id, $this->executiveRole->id]);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
		$this->user->detachRoles([$this->adminRole->id, $this->executiveRole->id]);
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
	}

	public function testDetachRolesByObjectFromUser() {
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
		$this->user->attachRoles([$this->adminRole, $this->executiveRole]);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->seeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
		$this->user->detachRoles([$this->adminRole, $this->executiveRole]);
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->adminRole->id]);
		$this->notSeeInDatabase('assigned_roles', ['user_id' => $this->user->id, 'role_id' => $this->executiveRole->id]);
	}
}