<?php

namespace Tests\Backend\Routes;

use Tests\BrowserKitTest;

/**
 * Class DashboardRouteTest.
 */
class DashboardRouteTest extends BrowserKitTest
{
    public function testAdminDashboard()
    {
        $this->actingAs($this->admin)
            ->visit('/admin/dashboard')
            ->see('Access Management')
            ->see($this->admin->name);
    }
}
