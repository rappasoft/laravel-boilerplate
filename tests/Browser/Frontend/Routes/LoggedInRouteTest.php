<?php

namespace Tests\Browser\Frontend\Routes;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Event;
use Tests\Browser\Pages\Frontend\HomePage;
use App\Events\Frontend\Auth\UserLoggedOut;
use Tests\Browser\Pages\Frontend\User\AccountPage;
use Tests\Browser\Pages\Frontend\User\FrontendDashboard;

/**
 * Class DashboardTest.
 */
class LoggedInRouteTest extends DuskTestCase
{
    public function testHomePageLoggedIn()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new HomePage)
                ->assertSee('Dashboard')
                ->assertSee($this->user->name)
                ->assertDontSee('Administration');
        });
    }

    public function testDashboardPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new FrontendDashboard)
                ->assertSee('Joined')
                ->assertSee($this->user->name)
                ->assertDontSee('Administration');
        });
    }

    public function testAccountPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new AccountPage)
                ->assertSee('My Account')
                ->assertSee('Profile')
                ->assertSee('Update Information')
                ->assertSee('Change Password')
                ->assertDontSee('Administration');
        });
    }

    public function testLoggedInAdmin()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                ->visit(new HomePage)
                ->assertSee('Administration')
                ->assertSee($this->admin->name);
        });
    }

    public function testLogoutRoute()
    {
        Event::fake();

        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/logout')
                ->assertSee('Login')
                ->assertSee('Register');
        });

        Event::assertDispatched(UserLoggedOut::class);
    }
}
