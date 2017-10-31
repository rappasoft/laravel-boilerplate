<?php

namespace Tests\Browser\Backend\Routes;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Backend\BackendDashboard;

/**
 * Class DashboardTest.
 */
class DashboardTest extends DuskTestCase
{
    /**
     * Test the Administrator Backend.
     *
     * @return void
     */
    public function testAdminDashboard()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                    ->visit(new BackendDashboard)
                    ->assertSee('Access Management')
                    ->assertSee($this->admin->name);
        });
    }
}
