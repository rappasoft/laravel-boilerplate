<?php

use App\Models\Auth\User;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use App\Events\Frontend\Auth\UserConfirmed;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class LoggedOutRouteTest.
 */
class LoggedOutRouteTest extends BrowserKitTestCase
{
    public function testHomePage()
    {
        $this->visit('/')->assertResponseOk();
    }

    public function testMacroPage()
    {
        $this->visit('/macros')->see('Macro Examples');
    }

    public function testContactPage()
    {
        $this->visit('/contact')->see('Contact Us');
    }

    public function testLoginPage()
    {
        $this->visit('/login')->see('Login');
    }

    public function testRegisterPage()
    {
        $this->visit('/register')->see('Register');
    }

    public function testForgotPasswordPage()
    {
        $this->visit('password/reset')->see('Reset Password');
    }

    public function testDashboardPageLoggedOut()
    {
        $this->visit('/dashboard')->seePageIs('/login');
    }

    public function testAccountPageLoggedOut()
    {
        $this->visit('/account')->seePageIs('/login');
    }

    public function testConfirmAccountRoute()
    {
        Event::fake();

        // Create default user to test with
        $unconfirmed = factory(User::class)->states('unconfirmed')->create();
        $unconfirmed->assignRole('user');

        $this->visit('/account/confirm/'.$unconfirmed->confirmation_code)
             ->seePageIs('/login')
             ->see('Your account has been successfully confirmed!')
             ->seeInDatabase(config('access.users_table'), ['email' => $unconfirmed->email, 'confirmed' => 1]);

        Event::assertDispatched(UserConfirmed::class);
    }

    public function testResendConfirmAccountRoute()
    {
        Notification::fake();

        $this->visit('/account/confirm/resend/'.$this->user->id)
             ->seePageIs('/login')
             ->see('A new confirmation e-mail has been sent to the address on file.');

        Notification::assertSentTo([$this->user],
            UserNeedsConfirmation::class);
    }

    public function testLanguageSwitcher()
    {
        if (config('locale.status')) {
            $this->visit('lang/es')
                ->see('Registrarse')
                ->assertSessionHas('locale', 'es');

            App::setLocale('en');
        }
    }

    public function test404Page()
    {
        $response = $this->call('GET', '7g48hwbfw9eufj');
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertContains('Page Not Found', $response->getContent());
    }
}
