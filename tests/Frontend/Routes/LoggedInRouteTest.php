<?php

namespace Tests\Frontend\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use App\Events\Frontend\Auth\UserLoggedOut;
use Tests\TestCase;

/**
 * Class LoggedInRouteTest.
 */
class LoggedInRouteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the homepage works and the dashboard button appears.
     */

    protected function setUp()
    {
        parent::setUp();
        $this->setUpAcl();
    }

    public function testHomePageLoggedIn()
    {
        $this->actingAs($this->user)
            ->get('/')
            ->assertSeeText('Dashboard')
            ->assertSeeText($this->user->name)
            ->assertDontSee('Administration');
    }

    /**
     * Test the dashboard page works and displays the users information.
     */
    public function testDashboardPage()
    {
        $this->actingAs($this->user)
            ->get('/dashboard')
            ->assertSeeText($this->user->email)
            ->assertSeeText('Joined')
            ->assertDontSeeText('Administration');
    }

    /**
     * Test the account page works and displays the users information.
     */
    public function testAccountPage()
    {
        $this->actingAs($this->user)
            ->get('/account')
            ->assertSeeText('My Account')
            ->assertSeeText('Profile')
            ->assertSeeText('Update Information')
            ->assertSeeText('Change Password')
            ->assertDontSeeText('Administration');
    }

    /**
     * Test the account page works and displays the users information.
     */
    public function testLoggedInAdmin()
    {
        $this->actingAs($this->admin)
            ->get('/')
            ->assertSeeText('Administration')
            ->assertSeeText($this->admin->name);
    }

    /**
     * Test the logout button redirects the user back to home and the login button is again visible.
     */
    public function testLogoutRoute()
    {
        Event::fake();

        $this->actingAs($this->user)
            ->get('/logout')
            ->assertRedirect('/');

        $this->assertFalse($this->isAuthenticated());

        Event::assertDispatched(UserLoggedOut::class);
    }
}
