<?php

/**
 * Class DashboardTest
 */
class DashboardTest extends TestCase
{
	public function testAdminDashboard() {
		$this->actingAs($this->admin)
			->visit('/admin/dashboard')
			->see('Access Management')
			->see($this->admin->name);
	}
}