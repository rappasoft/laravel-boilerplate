<?php

namespace Tests\Browser\Backend\Routes\Auth;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Backend\Auth\Users;

/**
 * Class UserRouteTest
 *
 * @package Tests\Browser\Backend\Routes\Auth
 */
class UserRouteTest extends DuskTestCase
{

	public function testActiveUsers()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                ->visit(new Users)
                ->assertSee('Active Users');
        });
    }
}