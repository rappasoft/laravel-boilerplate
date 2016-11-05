<?php

/**
 * Class Users
 */
class Users extends TestCase
{
	public function testActiveUsers() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user')
			->see('Active Users');
	}

	public function testDeactivatedUsers() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user/deactivated')
			->see('Deactivated Users');
	}

	public function testDeletedUsers() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user/deleted')
			->see('Deleted Users');
	}

	public function testCreateUser() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user/create')
			->see('Create User');
	}

	public function testViewUser() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user/'.$this->user->id)
			->see('View User')
			->see('Overview')
			->see('History')
			->see($this->user->name)
			->see($this->user->email);
	}

	public function testEditUser() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user/'.$this->user->id.'/edit')
			->see('Edit User')
			->see($this->user->name)
			->see($this->user->email);
	}

	public function testChangeUserPassword() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user/'.$this->user->id.'/password/change')
			->see('Change Password for '.$this->user->name);
	}

	public function testLoginAsUser() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user/'.$this->user->id.'/login-as')
			->seePageIs('/')
			->see('You are currently logged in as '.$this->user->name.'.')
			->see($this->admin->name)
			->assertTrue(access()->id() == $this->user->id);
	}

	public function testCantLoginAsSelf() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user/'.$this->admin->id.'/login-as')
			->see('Do not try to login as yourself.');
	}

	public function testLogoutAsUser() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user/'.$this->user->id.'/login-as')
			->seePageIs('/')
			->see('You are currently logged in as '.$this->user->name.'.')
			->click('Re-Login as '.$this->admin->name)
			->seePageIs('/admin/access/user')
			->assertTrue(access()->id() == $this->admin->id);
	}

	public function testDeactivateUser() {

	}

	public function testReactivateUser() {

	}

	public function testDeleteUser() {

	}

	public function testRestoreUser() {

	}

	public function testPermanantlyDeleteUser() {

	}
}