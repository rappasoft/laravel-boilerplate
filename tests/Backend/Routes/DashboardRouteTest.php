<?php

/**
 * Class DashboardRouteTest.
 */
class DashboardRouteTest extends TestCase
{
    public function testAdminDashboard()
    {
        $this->actingAs($this->admin)
            ->visit('/admin/dashboard')
            ->see('Access Management')
            ->see($this->admin->name);
    }
}
