<?php

namespace Tests\Browser\Backend\Routes\Auth;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Backend\Auth\Users;

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
