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

    /** @test */
    public function a_normal_user_doesnt_see_administration()
    {
        $this->actingAs($this->user)
            ->get('/')
            ->assertSeeText('Dashboard')
            ->assertSeeText($this->user->name)
            ->assertDontSee('Administration');
    }

    /** @test */
    public function the_dashboard_works_and_displays_the_users_info()
    {
        $this->actingAs($this->user)
            ->get('/dashboard')
            ->assertSeeText($this->user->email)
            ->assertSeeText('Joined')
            ->assertDontSeeText('Administration');
    }

    /** @test */
    public function the_account_page_works_and_displays_the_users_info()
    {
        $this->actingAs($this->user)
            ->get('/account')
            ->assertSeeText('My Account')
            ->assertSeeText('Profile')
            ->assertSeeText('Update Information')
            ->assertSeeText('Change Password')
            ->assertDontSeeText('Administration');
    }

    /** @test */
    public function an_admin_sees_administration()
    {
        $this->actingAs($this->admin)
            ->get('/')
            ->assertSeeText('Administration')
            ->assertSeeText($this->admin->name);
    }

    /** @test */
    public function a_user_can_log_out()
    {
        Event::fake();

        $this->actingAs($this->user)
            ->get('/logout')
            ->assertRedirect('/');

        $this->assertFalse($this->isAuthenticated());

        Event::assertDispatched(UserLoggedOut::class);
    }
}
