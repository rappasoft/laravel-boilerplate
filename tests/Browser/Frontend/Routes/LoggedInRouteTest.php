<?php

namespace Tests\Browser\Frontend\Routes;

use Tests\Browser\Pages\Frontend\HomePage;
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
}