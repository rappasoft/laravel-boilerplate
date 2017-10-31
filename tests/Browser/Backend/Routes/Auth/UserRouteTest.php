<?php

namespace Tests\Browser\Backend\Routes\Auth;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Backend\Auth\BackendUserIndex;

/**
 * Class UserRouteTest.
 */
class UserRouteTest extends DuskTestCase
{
    public function testActiveUsers()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                ->visit(new BackendUserIndex)
                ->assertSee('Active Users');
        });
    }
}
