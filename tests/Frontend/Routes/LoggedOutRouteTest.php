<?php

namespace Tests\Frontend\Routes;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Event;
use App\Events\Frontend\Auth\UserConfirmed;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class LoggedOutRouteTest.
 */
class LoggedOutRouteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_home_page_works()
    {
        $this->get('/')->assertStatus(200);
    }

    /** @test */
    public function the_contact_page_works()
    {
        $this->get('/contact')->assertSee('Contact Us');
    }

    /** @test */
    public function the_login_page_works()
    {
        $this->get('/login')->assertSee('Login');
    }

    /** @test */
    public function the_register_page_works()
    {
        $this->get('/register')->assertSee('Register');
    }

    /** @test */
    public function the_forgot_password_page_works()
    {
        $this->get('password/reset')->assertSee('Reset Password');
    }

    /** @test */
    public function unauthenticated_user_cant_access_dashboard()
    {
        $this->get('/dashboard')->assertRedirect('/login');
    }

    /** @test */
    public function unauthenticated_user_cant_access_account_page()
    {
        $this->get('/account')->assertRedirect('/login');
    }

    /** @test */
    public function a_user_account_can_be_confirmed()
    {
        $this->setUpAcl();
        Event::fake();

        // Create default user to test with
        $unconfirmed = factory(User::class)->states('unconfirmed')->create();
        $unconfirmed->assignRole('user');

        $this->followingRedirects()
            ->get('/account/confirm/'.$unconfirmed->confirmation_code)
            ->assertSeeText('Your account has been successfully confirmed!');

        $this->assertEquals(1, $unconfirmed->fresh()->confirmed);

        Event::assertDispatched(UserConfirmed::class);
    }

    /** @test */
    public function testResendConfirmAccountRoute()
    {
        Notification::fake();

        $unconfirmed = factory(User::class)->states('unconfirmed')->create();

        $this->followingRedirects()
            ->get('/account/confirm/resend/'.$unconfirmed->uuid)
            ->assertSeeText('A new confirmation e-mail has been sent to the address on file.');

        Notification::assertSentTo([$unconfirmed], UserNeedsConfirmation::class);
    }

    /** @test */
    public function an_invalid_route_shows_404()
    {
        $response = $this->get('7g48hwbfw9eufj');

        $response
            ->assertStatus(404)
            ->assertSeeText('Page Not Found');
    }
}
