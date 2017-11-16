<?php

use App\Models\Auth\User;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Mail\Frontend\Contact\SendContact;
use App\Events\Frontend\Auth\UserRegistered;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Notifications\Frontend\Auth\UserNeedsPasswordReset;

/**
 * Class LoggedOutFormTest.
 */
class LoggedOutFormTest extends BrowserKitTestCase
{
    public function testRegistrationRequiredFields()
    {
        $this->visit('/register')
             ->type('', 'first_name')
             ->type('', 'last_name')
             ->type('', 'email')
             ->type('', 'password')
             ->press('Register')
             ->seePageIs('/register')
             ->see('The first name field is required.')
             ->see('The last name field is required.')
             ->see('The email field is required.')
             ->see('The password field is required.');
    }

    public function testRegistrationForm()
    {
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        config(['access.users.confirm_email' => false]);
        config(['access.users.requires_approval' => false]);

        // Create any needed resources
        $faker = Faker\Factory::create();
        $firstName = $faker->firstName;
        $lastName = $faker->lastName;
        $email = $faker->safeEmail;
        $password = $faker->password(8);

        $this->visit('/register')
             ->type($firstName, 'first_name')
             ->type($lastName, 'last_name')
             ->type($email, 'email')
             ->type($password, 'password')
             ->type($password, 'password_confirmation')
             ->press('Register')
             ->see('Dashboard')
             ->seePageIs('/dashboard')
             ->seeInDatabase(config('access.table_names.users'),
                 [
                     'email' => $email,
                     'first_name' => $firstName,
                     'last_name' => $lastName,
                     'confirmed' => 1,
                     'active' => 1,
                 ]);

        Event::assertDispatched(UserRegistered::class);
    }

    public function testRegistrationFormConfirmationRequired()
    {
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Notification::fake();

        config(['access.users.confirm_email' => true]);
        config(['access.users.requires_approval' => false]);

        // Create any needed resources
        $faker = Faker\Factory::create();
        $firstName = $faker->firstName;
        $lastName = $faker->lastName;
        $email = $faker->safeEmail;
        $password = $faker->password(8);

        $this->visit('/register')
            ->type($firstName, 'first_name')
            ->type($lastName, 'last_name')
            ->type($email, 'email')
            ->type($password, 'password')
            ->type($password, 'password_confirmation')
            ->press('Register')
            ->see('Your account was successfully created. We have sent you an e-mail to confirm your account.')
            ->see('Login')
            ->seePageIs('/')
            ->seeInDatabase(config('access.table_names.users'),
                [
                    'email' => $email,
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'confirmed' => 0,
                ]);

        // Get the user that was inserted into the database
        $user = User::where('email', $email)->first();

        Notification::assertSentTo([$user], UserNeedsConfirmation::class);
        Event::assertDispatched(UserRegistered::class);
    }

    public function testRegistrationFormPendingApproval()
    {
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Notification::fake();

        // Set registration to pending approval
        config(['access.users.confirm_email' => false]);
        config(['access.users.requires_approval' => true]);

        // Create any needed resources
        $faker = Faker\Factory::create();
        $firstName = $faker->firstName;
        $lastName = $faker->lastName;
        $email = $faker->safeEmail;
        $password = $faker->password(8);

        $this->visit('/register')
            ->type($firstName, 'first_name')
            ->type($lastName, 'last_name')
            ->type($email, 'email')
            ->type($password, 'password')
            ->type($password, 'password_confirmation')
            ->press('Register')
            ->seePageIs('/')
            ->see('Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.')
            ->seeInDatabase(config('access.table_names.users'),
                [
                    'email' => $email,
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'confirmed' => 0,
                ]);

        // Get the user that was inserted into the database
        $user = User::where('email', $email)->first();

        Notification::assertNotSentTo([$user], UserNeedsConfirmation::class);
        Event::assertDispatched(UserRegistered::class);
    }

    public function testLoginRequiredFields()
    {
        $this->visit('/login')
             ->type('', 'email')
             ->type('', 'password')
             ->press('Login')
             ->seePageIs('/login')
             ->see('The email field is required.')
             ->see('The password field is required.');
    }

    public function testLoginForm()
    {
        // Make sure our events are fired
        Event::fake();

        Auth::logout();

        //User Test
        $this->visit('/login')
             ->type($this->user->email, 'email')
             ->type('1234', 'password')
             ->press('Login')
             ->seePageIs('/dashboard')
             ->see($this->user->email);

        Auth::logout();

        //Admin Test
        $this->visit('/login')
             ->type($this->admin->email, 'email')
             ->type('1234', 'password')
             ->press('Login')
             ->seePageIs('/admin/dashboard')
             ->see($this->admin->name)
             ->see('Access Management');

        Event::assertDispatched(UserLoggedIn::class);
    }

    public function testForgotPasswordRequiredFields()
    {
        $this->visit('/password/reset')
             ->type('', 'email')
             ->press('Send Password Reset Link')
             ->seePageIs('/password/reset')
             ->see('The email field is required.');
    }

    public function testForgotPasswordForm()
    {
        Notification::fake();

        $this->visit('password/reset')
             ->type($this->user->email, 'email')
             ->press('Send Password Reset Link')
             ->seePageIs('password/reset')
             ->see('We have e-mailed your password reset link!')
             ->seeInDatabase('password_resets', ['email' => $this->user->email]);

        Notification::assertSentTo([$this->user], UserNeedsPasswordReset::class);
    }

    public function testResetPasswordRequiredFields()
    {
        $token = $this->app->make('auth.password.broker')->createToken($this->user);

        $this->visit('password/reset/'.$token)
             ->type($this->user->email, 'email')
             ->type('', 'password')
             ->type('', 'password_confirmation')
             ->press('Reset Password')
             ->see('The password field is required.');
    }

    public function testResetPasswordForm()
    {
        $token = $this->app->make('auth.password.broker')->createToken($this->user);

        $this->visit('password/reset/'.$token)
             ->type($this->user->email, 'email')
             ->type('12345678', 'password')
             ->type('12345678', 'password_confirmation')
             ->press('Reset Password')
             ->seePageIs('/dashboard')
             ->see($this->user->name);
    }

    public function testUnconfirmedUserCanNotLogIn()
    {
        config(['access.users.requires_approval' => false]);

        // Create default user to test with
        $unconfirmed = factory(User::class)->states('unconfirmed')->create();
        $unconfirmed->assignRole('user');

        $this->visit('/login')
             ->type($unconfirmed->email, 'email')
             ->type('secret', 'password')
             ->press('Login')
             ->seePageIs('/login')
             ->see('Your account is not confirmed.');
    }

    public function testUnconfirmedUserCanNotLogInPendingApproval()
    {
        config(['access.users.requires_approval' => true]);

        // Create default user to test with
        $unconfirmed = factory(User::class)->states('unconfirmed')->create();
        $unconfirmed->assignRole('user');

        $this->visit('/login')
            ->type($unconfirmed->email, 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->seePageIs('/login')
            ->see('Your account is currently pending approval.');
    }

    public function testInactiveUserCanNotLogIn()
    {
        // Create default user to test with
        $inactive = factory(User::class)->states('confirmed', 'inactive')->create();
        $inactive->assignRole('user');

        $this->visit('/login')
             ->type($inactive->email, 'email')
             ->type('secret', 'password')
             ->press('Login')
             ->seePageIs('/login')
             ->see('Your account has been deactivated.');
    }

    public function testInvalidLoginCredentials()
    {
        $this->visit('/login')
             ->type($this->user->email, 'email')
             ->type('9s8gy8s9diguh4iev', 'password')
             ->press('Login')
             ->seePageIs('/login')
             ->see('These credentials do not match our records.');
    }

    public function testContactFormRequiredFields()
    {
        $this->visit('/contact')
            ->press(trans('labels.frontend.contact.button'))
            ->seePageIs('/contact')
            ->see('The name field is required.')
            ->see('The email field is required.')
            ->see('The message field is required.');
    }

    public function testContactForm()
    {
        Mail::fake();

        $this->visit('/contact')
            ->type('Admin Istrator', 'name')
            ->type('admin@admin.com', 'email')
            ->type('1112223333', 'phone')
            ->type('Hello There', 'message')
            ->press(trans('labels.frontend.contact.button'))
            ->seePageIs('/contact')
            ->see(trans('alerts.frontend.contact.sent'));

        Mail::assertSent(SendContact::class);
    }
}
