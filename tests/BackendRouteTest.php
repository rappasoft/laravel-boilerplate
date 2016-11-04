<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class BackendRouteTest
 */
class BackendRouteTest extends TestCase
{
	use DatabaseTransactions;

	/**
	 * Test that the logged in administrator can access the backend
	 */
	public function testAdminDashboard() {
		$this->actingAs($this->admin)
			->visit('/admin/dashboard')
			->see('Access Management')
			->see($this->admin->name);
	}

	/**
	 * Test Access Routes
	 */

	/**
	 * Test that the logged in administrator can access users index
	 */
	public function testActiveUsers() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user')
			->see('Active Users');
	}

	/**
	 * Test that the logged in administrator can create user page
	 */
	public function testCreateUser() {
		$this->actingAs($this->admin)
			->visit('/admin/access/user/create')
			->see('Create User');
	}
}