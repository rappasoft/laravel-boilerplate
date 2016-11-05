<?php

/**
 * Class Dashboard
 */
class Dashboard extends TestCase
{
	public function testAdminDashboard() {
		$this->actingAs($this->admin)
			->visit('/admin/dashboard')
			->see('Access Management')
			->see($this->admin->name);
	}
}