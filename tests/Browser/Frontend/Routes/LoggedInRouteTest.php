<?php

namespace Tests\Browser\Frontend\Routes;

use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Support\Facades\Event;
use Tests\Browser\Pages\Frontend\HomePage;
use Tests\Browser\Pages\Frontend\User\Account;
use Tests\Browser\Pages\Frontend\User\Dashboard;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

/**
 * Class DashboardTest
 *
 * @package Tests\Browser\Frontend\Routes
 */
class DashboardTest extends DuskTestCase
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
				->visit(new Dashboard)
				->assertSee('Joined')
				->assertSee($this->user->name)
				->assertDontSee('Administration');
		});
	}

	public function testAccountPage()
	{
		$this->browse(function (Browser $browser) {
			$browser->loginAs($this->user)
				->visit(new Account)
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