<?php

use Tests\BrowserKitTestCase;

/**
 * Class RoleRouteTest.
 */
class RoleRouteTest extends BrowserKitTestCase
{
    public function testRolesIndex()
    {
        $this->actingAs($this->admin)->visit('/admin/auth/role')->see('Role Management');
    }

    public function testCreateRole()
    {
        $this->actingAs($this->admin)->visit('/admin/auth/role/create')->see('Create Role');
    }

    public function testEditRole()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/role/'.$this->userRole->id.'/edit')
             ->see('Edit Role')
             ->see($this->userRole->name);
    }
}
