<?php

namespace Tests\Browser\Backend\Routes;

use Tests\DuskTestCase;
use App\Models\Auth\User;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Backend\Auth\Dashboard;

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
            $browser->loginAs(User::find(1))
                    ->visit(new Dashboard)
                    ->assertSee('Access Management')
                    ->assertSee(User::find(1)->firstorFail()->full_name);
        });
    }
}