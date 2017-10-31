<?php

namespace Tests\Browser\Frontend\Routes;

use Tests\DuskTestCase;
use App\Models\Auth\User;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use Tests\Browser\Pages\Frontend\HomePage;
use App\Events\Frontend\Auth\UserConfirmed;
use Illuminate\Support\Facades\Notification;
use Tests\Browser\Pages\Frontend\ContactPage;
use Tests\Browser\Pages\Frontend\Auth\LoginPage;
use Tests\Browser\Pages\Backend\BackendDashboard;
use Tests\Browser\Pages\Frontend\User\AccountPage;
use Tests\Browser\Pages\Frontend\Auth\RegisterPage;
use Tests\Browser\Pages\Frontend\Auth\PasswordResetPage;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use Tests\Browser\Pages\Frontend\Auth\AccountConfirmation;
use Tests\Browser\Pages\Frontend\Auth\ResendAccountConfirmation;

class LoggedOutRouteTest extends DuskTestCase
{
    /**
     * User Logged Out Frontend.
     */
    public function testHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage);
            //->assertResponseOk(); TODO: Replacement?
        });
    }

    public function testContactPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ContactPage)
                ->assertSee('Contact Us');
        });
    }

    public function testLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
                ->assertSee('Login');
        });
    }

    public function testRegisterPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new RegisterPage)
                ->assertSee('Register');
        });
    }

    public function testForgotPasswordPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new PasswordResetPage)
                ->assertSee('Reset Password');
        });
    }

    public function testDashboardPageLoggedOut()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new BackendDashboard)
                ->assertPathIs('/login');
        });
    }

    public function testAccountPageLoggedOut()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new AccountPage)
                ->assertPathIs('/login');
        });
    }

    public function testConfirmAccountRoute()
    {
        Event::fake();

        // Create default user to test with
        $unconfirmed = factory(User::class)->states('unconfirmed')->create();
        $unconfirmed->attachRole(3); //User

        $this->browse(function (Browser $browser) use ($unconfirmed) {
            $browser->visit(new AccountConfirmation($unconfirmed->confirmation_code))
                ->assertPathIs('/login')
                ->assertSee('Your account has been successfully confirmed!')
                ->seeInDatabase(config('access.users_table'), ['email' => $unconfirmed->email, 'confirmed' => 1]);
        });

        Event::assertDispatched(UserConfirmed::class);
    }

    public function testResendConfirmAccountRoute()
    {
        Notification::fake();

        $this->browse(function (Browser $browser) {
            $browser->visit(new ResendAccountConfirmation($this->user->uuid))
                ->assertPathIs('/login')
                ->assertSee('A new confirmation e-mail has been sent to the address on file.');
        });

        Notification::assertSentTo([$this->user], UserNeedsConfirmation::class);
    }

    public function testLanguageSwitcher()
    {
        if (config('locale.status')) {
            $this->browse(function (Browser $browser) {
                $browser->visit('lang/es')
                    ->assertSee('Registrarse');
                //->assertSessionHas('locale', 'es'); TODO: Replacement?
            });

            App::setLocale('en');
        }
    }

    public function test404Page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('7g48hwbfw9eufj')
                ->assertSee('Sorry, the page you are looking for could not be found.');
        });
    }
}
