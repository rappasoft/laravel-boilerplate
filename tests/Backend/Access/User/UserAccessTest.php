<?php

/**
 * Class UserAccessTest.
 */
class UserAccessTest extends TestCase
{
    public function testUserCantAccessAdminDashboard()
    {
        $this->visit('/')
            ->actingAs($this->user)
            ->visit('/admin/dashboard')
            ->seePageIs('/')
            ->see('You do not have access to do that.');
    }

    public function testExecutiveCanAccessAdminDashboard()
    {
        $this->visit('/')
            ->actingAs($this->executive)
            ->visit('/admin/dashboard')
            ->seePageIs('/admin/dashboard')
            ->see($this->executive->name);
    }

    public function testExecutiveCantAccessManageRoles()
    {
        $this->visit('/')
            ->actingAs($this->executive)
            ->visit('/admin/dashboard')
            ->seePageIs('/admin/dashboard')
            ->visit('/admin/access/role')
            ->seePageIs('/')
            ->see('You do not have access to do that.');
    }
}
