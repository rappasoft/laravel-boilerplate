<?php

namespace Tests\Frontend\Routes;

use App\Models\Auth\Role;
use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use App\Events\Frontend\Auth\UserConfirmed;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use Tests\TestCase;

/**
 * Class LoggedOutRouteTest.
 */
class LoggedOutRouteTest extends TestCase
{
    use RefreshDatabase;

    public function testHomePage()
    {
        $this->get('/')->assertStatus(200);
    }

    public function testContactPage()
    {
        $this->get('/contact')->assertSee('Contact Us');
    }

    public function testLoginPage()
    {
        $this->get('/login')->assertSee('Login');
    }

    public function testRegisterPage()
    {
        $this->get('/register')->assertSee('Register');
    }

    public function testForgotPasswordPage()
    {
        $this->get('password/reset')->assertSee('Reset Password');
    }

    public function testDashboardPageLoggedOut()
    {
        $this->get('/dashboard')->assertRedirect('/login');
    }

    public function testAccountPageLoggedOut()
    {
        $this->get('/account')->assertRedirect('/login');
    }

    public function testConfirmAccountRoute()
    {
        Event::fake();

        // Create default user to test with
        $unconfirmed = factory(User::class)->states('unconfirmed')->create();
        factory(Role::class)->create(['name' => 'user']);
        $unconfirmed->assignRole('user');

        $this->get('/account/confirm/' . $unconfirmed->confirmation_code)
            ->assertRedirect('/login')
            ->followRedirects()
            ->assertSeeText('Your account has been successfully confirmed!');


        $this->assertDatabaseHas(config('access.table_names.users'), ['email' => $unconfirmed->email, 'confirmed' => 1]);

        Event::assertDispatched(UserConfirmed::class);
    }

    public function testResendConfirmAccountRoute()
    {
        Notification::fake();

        $unconfirmed = factory(User::class)->states('unconfirmed')->create();

        $this->get('/account/confirm/resend/' . $unconfirmed->uuid)
            ->assertRedirect('/login')
            ->followRedirects()
            ->assertSeeText('A new confirmation e-mail has been sent to the address on file.');

        Notification::assertSentTo([$unconfirmed],
            UserNeedsConfirmation::class);
    }

    public function test404Page()
    {
        $response = $this->get('7g48hwbfw9eufj');

        $response
            ->assertStatus(404)
            ->assertSeeText('Page Not Found');
    }
}
