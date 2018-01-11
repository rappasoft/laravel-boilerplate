<?php

namespace Tests\Feature\Backend;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class DashboardRouteTest.
 */
class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_cant_access_admin_dashboard()
    {
        $this->get('/admin/dashboard')->assertRedirect('/login');
    }
    /** @test */
    public function admin_can_access_admin_dashboard()
    {
        $this->loginAsAdmin();

        $this->get('/admin/dashboard')->assertStatus(200);
    }
}
