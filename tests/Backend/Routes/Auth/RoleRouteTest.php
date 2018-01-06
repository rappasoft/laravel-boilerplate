<?php

namespace Tests\Backend\Routes\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class RoleRouteTest.
 */
class RoleRouteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_access_roles_index()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->get('/admin/auth/role')
            ->assertSeeText('Role Management');
    }

    /** @test */
    public function admin_can_access_the_role_create_page()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->get('/admin/auth/role/create')
            ->assertSeeText('Create Role');
    }

    /** @test */
    public function an_admin_can_access_the_edit_role_page()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->get('/admin/auth/role/' . $this->userRole->id . '/edit')
            ->assertSeeText('Edit Role');
    }
}
