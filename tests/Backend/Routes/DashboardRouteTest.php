<?php

namespace Tests\Backend\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class DashboardRouteTest.
 */
class DashboardRouteTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function admin_can_access_admin_dashboard()
    {
        $this->setUpAcl();
        $this->actingAs($this->admin)
            ->get('/admin/dashboard')
            ->assertSeeText('Access Management')
            ->assertSeeText($this->admin->name);
    }
}
