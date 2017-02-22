<?php

use Tests\BrowserKitTestCase;
use App\Models\Access\User\User;
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
    /**
     * User Logged Out Frontend.
     */

    /**
     * Test the homepage works.
     */
    public function testHomePage()
    {
        $this->visit('/')->assertResponseOk();
    }

    /**
     * Test the macro page works.
     */
    public function testMacroPage()
    {
        $this->visit('/macros')->see('Macro Examples');
    }

    /**
     * Test the login page works.
     */
    public function testLoginPage()
    {
        $this->visit('/login')->see('Login');
    }

    /**
     * Test the register page works.
     */
    public function testRegisterPage()
    {
        $this->visit('/register')->see('Register');
    }

    /**
     * Test the forgot password page works.
     */
    public function testForgotPasswordPage()
    {
        $this->visit('password/reset')->see('Reset Password');
    }

    /**
     * Test the dashboard page redirects to login.
     */
    public function testDashboardPageLoggedOut()
    {
        $this->visit('/dashboard')->seePageIs('/login');
    }

    /**
     * Test the account page redirects to login.
     */
    public function testAccountPageLoggedOut()
    {
        $this->visit('/account')->seePageIs('/login');
    }

    /**
     * Create an unconfirmed user and assure the user gets
     * confirmed when hitting the confirmation route.
     */
    public function testConfirmAccountRoute()
    {
        Event::fake();

        // Create default user to test with
        $unconfirmed = factory(User::class)->states('unconfirmed')->create();
        $unconfirmed->attachRole(3); //User

        $this->visit('/account/confirm/'.$unconfirmed->confirmation_code)
             ->seePageIs('/login')
             ->see('Your account has been successfully confirmed!')
             ->seeInDatabase(config('access.users_table'), ['email' => $unconfirmed->email, 'confirmed' => 1]);

        Event::assertDispatched(UserConfirmed::class);
    }

    /**
     * Assure the user gets resent a confirmation email
     * after hitting the resend confirmation route.
     */
    public function testResendConfirmAccountRoute()
    {
        Notification::fake();

        $this->visit('/account/confirm/resend/'.$this->user->id)
             ->seePageIs('/login')
             ->see('A new confirmation e-mail has been sent to the address on file.');

        Notification::assertSentTo([$this->user],
            UserNeedsConfirmation::class);
    }

    /**
     * Test the language switcher changes the desired language in the session.
     */
    public function testLanguageSwitcher()
    {
        $this->visit('lang/es')->see('Registrarse')->assertSessionHas('locale', 'es');

        App::setLocale('en');
    }

    /**
     * Test the generic 404 page.
     */
    public function test404Page()
    {
        $this->get('7g48hwbfw9eufj')->seeStatusCode(404)->see('Page Not Found');
    }
}
