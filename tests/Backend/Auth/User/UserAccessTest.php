<?php

namespace Tests\Backend\Auth\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class UserAccessTest.
 */
class UserAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_cant_access_admin_dashboard()
    {
        $this->setUpAcl();

        $this->actingAs($this->user)
            ->followingRedirects()
            ->get('/admin/dashboard')
            ->assertSeeText('You do not have access to do that.');
    }

    /** @test */
    public function executive_can_access_admin_dashboard()
    {
        $this->setUpAcl();

        $this->actingAs($this->executive)
            ->followingRedirects()
            ->get('/admin/dashboard')
            ->assertSeeText($this->executive->name);
    }

    /** @test */
    public function executive_cant_access_manage_roles()
    {
        $this->setUpAcl();

        $this->actingAs($this->executive)
            ->followingRedirects()
            ->get('/admin/auth/role')
            ->assertSeeText('You do not have access to do that.');
    }
}
