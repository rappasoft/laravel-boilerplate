<?php

namespace Tests\Frontend\Forms;

use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Mail\Frontend\Contact\SendContact;
use App\Events\Frontend\Auth\UserRegistered;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Notifications\Frontend\Auth\UserNeedsPasswordReset;
use Tests\TestCase;

/**
 * Class LoggedOutFormTest.
 */
class LoggedOutFormTest extends TestCase
{
    use RefreshDatabase;

    public function testRegistrationRequiredFields()
    {
        $response = $this->post('/register', [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors(['first_name', 'last_name', 'email', 'password']);
    }

    public function testRegistrationForm()
    {
        $this->setUpAcl();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        config(['access.users.confirm_email' => false]);
        config(['access.users.requires_approval' => false]);

        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertDatabaseHas(config('access.table_names.users'), [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'confirmed' => 1,
            'active' => 1,
        ]);
        Event::assertDispatched(UserRegistered::class);
    }

    public function testRegistrationFormConfirmationRequired()
    {
        $this->withoutExceptionHandling();
        $this->setUpAcl();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Notification::fake();

        config(['access.users.confirm_email' => true]);
        config(['access.users.requires_approval' => false]);

        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $response->assertRedirect('/');

        // Get the user that was inserted into the database
        $user = User::where('email', 'john@example.com')->first();

        $this->assertEquals('John', $user->first_name);
        $this->assertEquals('Doe', $user->last_name);
        $this->assertEquals(0, $user->confirmed);

        Notification::assertSentTo([$user], UserNeedsConfirmation::class);
        Event::assertDispatched(UserRegistered::class);
    }

    public function testRegistrationFormPendingApproval()
    {
        $this->setUpAcl();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        Notification::fake();

        // Set registration to pending approval
        config(['access.users.confirm_email' => false]);
        config(['access.users.requires_approval' => true]);

        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $response->assertRedirect('/');

        // Get the user that was inserted into the database
        $user = User::where('email', 'john@example.com')->first();

        $this->assertEquals('John', $user->first_name);
        $this->assertEquals('Doe', $user->last_name);
        $this->assertEquals(0, $user->confirmed);

        Notification::assertNotSentTo([$user], UserNeedsConfirmation::class);
        Event::assertDispatched(UserRegistered::class);
    }

    public function testLoginRequiredFields()
    {
        $response = $this->from('/login')->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email', 'password']);
    }

    public function testLoginFormAsAdmin()
    {
        $this->setUpAcl();
        // Make sure our events are fired
        Event::fake();

        //Admin Test
        $this->followingRedirects()->post('/login', [
            'email' => $this->admin->email,
            'password' => '1234'
        ])
            ->assertSeeText('Access Management');

        $this->assertAuthenticatedAs($this->admin);

        Event::assertDispatched(UserLoggedIn::class);
    }

    public function testLoginFormAsUser()
    {
        $this->setUpAcl();
        // Make sure our events are fired
        Event::fake();

        $this
            ->followingRedirects()
            ->post('/login', [
                'email' => $this->user->email,
                'password' => '1234'
            ])
            ->assertSeeText($this->user->email);

        $this->assertAuthenticatedAs($this->user);

        Event::assertDispatched(UserLoggedIn::class);
    }

    public function testForgotPasswordRequiredFields()
    {
        $response = $this->post('/password/reset',['email' => '']);
        $response->assertSessionHasErrors('email');
    }

    public function testForgotPasswordForm()
    {
        $this->setUpAcl();
        Notification::fake();

        $this->post('password/email',['email' => $this->user->email]);

        $this->assertDatabaseHas('password_resets', ['email' => $this->user->email]);

        Notification::assertSentTo([$this->user], UserNeedsPasswordReset::class);
    }

    public function testResetPasswordRequiredFields()
    {
        $this->setUpAcl();
        $token = $this->app->make('auth.password.broker')->createToken($this->user);

        $response = $this->post('password/reset',[
            'token' => $token,
            'email' => $this->user->email,
            'password' => '',
            'password_confirmation' => ''
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function testResetPasswordForm()
    {
        $this->setUpAcl();
        $token = $this->app->make('auth.password.broker')->createToken($this->user);

        $this->post('password/reset',[
            'token' => $token,
            'email' => $this->user->email,
            'password' => 'new_password',
            'password_confirmation' => 'new_password'
        ]);

        $this->assertTrue(Hash::check('new_password', $this->user->fresh()->password));
    }

    public function testUnconfirmedUserCanNotLogIn()
    {
        $this->setUpAcl();
        config(['access.users.requires_approval' => false]);

        // Create default user to test with
        $unconfirmed = factory(User::class)->states('unconfirmed')->create();
        $unconfirmed->assignRole('user');

        $this->followingRedirects()
            ->post('/login',['email' => $unconfirmed->email, 'password' => 'secret'])
            ->assertSeeText('Your account is not confirmed.');
    }

    public function testUnconfirmedUserCanNotLogInPendingApproval()
    {
        $this->setUpAcl();
        config(['access.users.requires_approval' => true]);

        // Create default user to test with
        $unconfirmed = factory(User::class)->states('unconfirmed')->create();
        $unconfirmed->assignRole('user');

        $this->followingRedirects()
            ->post('/login',['email' => $unconfirmed->email, 'password' => 'secret'])
            ->assertSeeText('Your account is currently pending approval.');
    }

    public function testInactiveUserCanNotLogIn()
    {
        $this->setUpAcl();
        // Create default user to test with
        $inactive = factory(User::class)->states('confirmed', 'inactive')->create();
        $inactive->assignRole('user');

        $this->followingRedirects()
            ->post('/login',['email' => $inactive->email, 'password' => 'secret'])
            ->assertSeeText('Your account has been deactivated.');
    }

    public function testInvalidLoginCredentials()
    {
        $this->setUpAcl();
        $this->withoutExceptionHandling();

        $this->expectException(ValidationException::class);

        $this->post('/login', [
            'email' => $this->user->email,
            'password' => '9s8gy8s9diguh4iev'
        ]);
    }

    public function testContactFormRequiredFields()
    {
        $response = $this->post('/contact/send', [
            'name' => '',
            'email' => '',
            'message' => '',
        ]);

        $response->assertSessionHasErrors(['name','email','message']);
    }

    public function testContactForm()
    {
        Mail::fake();

        $response = $this->post('/contact/send', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'This is a test message',
        ]);

        $response->assertSessionHas('flash_success');
        Mail::assertSent(SendContact::class);
    }
}
