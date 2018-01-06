<?php

namespace Tests\Frontend\Forms;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Mail\Frontend\Contact\SendContact;
use App\Events\Frontend\Auth\UserRegistered;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Notifications\Frontend\Auth\UserNeedsPasswordReset;

/**
 * Class LoggedOutFormTest.
 */
class LoggedOutFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_registration_form_has_required_fields()
    {
        $response = $this->post('/register', [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors(['first_name', 'last_name', 'email', 'password']);
    }

    /** @test */
    public function a_user_can_register_a_new_account()
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

        $user = User::where('email', 'john@example.com')->first();

        $this->assertEquals('John', $user->first_name);
        $this->assertEquals('Doe', $user->last_name);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertEquals(1, $user->confirmed);
        $this->assertEquals(1, $user->active);

        Event::assertDispatched(UserRegistered::class);
    }

    /** @test */
    public function a_user_needs_to_confirm_email_if_confirm_email_is_true()
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

    /** @test */
    public function a_new_user_needs_to_be_confirmed_if_requires_approval_is_true()
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

    /** @test */
    public function email_and_password_are_required_in_login_form()
    {
        $response = $this->from('/login')->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email', 'password']);
    }

    /** @test */
    public function an_admin_gets_redirect_to_the_admin_dashboard_after_login()
    {
        $this->setUpAcl();
        // Make sure our events are fired
        Event::fake();

        //Admin Test
        $this->post('/login', [
            'email' => $this->admin->email,
            'password' => '1234',
        ])
            ->assertRedirect('/admin/dashboard');

        $this->assertAuthenticatedAs($this->admin);

        Event::assertDispatched(UserLoggedIn::class);
    }

    /** @test */
    public function a_user_get_redirected_to_normal_dashboard_after_login()
    {
        $this->setUpAcl();
        // Make sure our events are fired
        Event::fake();

        $this
            ->post('/login', [
                'email' => $this->user->email,
                'password' => '1234',
            ])
            ->assertRedirect('/dashboard');

        $this->assertAuthenticatedAs($this->user);

        Event::assertDispatched(UserLoggedIn::class);
    }

    /** @test */
    public function email_is_required_in_email_password_form()
    {
        $response = $this->post('/password/reset', ['email' => '']);
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function an_email_gets_sent_if_password_reset_is_requested()
    {
        $this->setUpAcl();
        Notification::fake();

        $this->post('password/email', ['email' => 'user@user.com']);

        Notification::assertSentTo([$this->user], UserNeedsPasswordReset::class);
    }

    /** @test */
    public function the_reset_password_form_has_required_fields()
    {
        $this->setUpAcl();
        $token = $this->app->make('auth.password.broker')->createToken($this->user);

        $response = $this->post('password/reset', [
            'token' => $token,
            'email' => $this->user->email,
            'password' => '',
            'password_confirmation' => '',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function a_password_can_be_resetted()
    {
        $this->setUpAcl();
        $token = $this->app->make('auth.password.broker')->createToken($this->user);

        $this->post('password/reset', [
            'token' => $token,
            'email' => $this->user->email,
            'password' => 'new_password',
            'password_confirmation' => 'new_password',
        ]);

        $this->assertTrue(Hash::check('new_password', $this->user->fresh()->password));
    }

    /** @test */
    public function unconfirmed_user_cant_login()
    {
        $this->setUpAcl();
        config(['access.users.requires_approval' => false]);

        // Create default user to test with
        $unconfirmed = factory(User::class)->states('unconfirmed')->create();
        $unconfirmed->assignRole('user');

        $this->followingRedirects()
            ->post('/login', ['email' => $unconfirmed->email, 'password' => 'secret'])
            ->assertSeeText('Your account is not confirmed.');

        $this->assertFalse($this->isAuthenticated());
    }

    /** @test */
    public function unconfirmed_user_cant_login_if_requires_approval_is_true()
    {
        $this->setUpAcl();
        config(['access.users.requires_approval' => true]);

        // Create default user to test with
        $unconfirmed = factory(User::class)->states('unconfirmed')->create();
        $unconfirmed->assignRole('user');

        $this->followingRedirects()
            ->post('/login', ['email' => $unconfirmed->email, 'password' => 'secret'])
            ->assertSeeText('Your account is currently pending approval.');

        $this->assertFalse($this->isAuthenticated());
    }

    /** @test */
    public function inactive_users_cant_login()
    {
        $this->setUpAcl();
        // Create default user to test with
        $inactive = factory(User::class)->states('confirmed', 'inactive')->create();
        $inactive->assignRole('user');

        $this->followingRedirects()
            ->post('/login', ['email' => $inactive->email, 'password' => 'secret'])
            ->assertSeeText('Your account has been deactivated.');

        $this->assertFalse($this->isAuthenticated());
    }

    /** @test */
    public function cant_login_with_invalid_credentials()
    {
        $this->setUpAcl();
        $this->withoutExceptionHandling();

        $this->expectException(ValidationException::class);

        $this->post('/login', [
            'email' => $this->user->email,
            'password' => '9s8gy8s9diguh4iev',
        ]);
    }

    /** @test  */
    public function the_contact_form_has_required_fields()
    {
        $response = $this->post('/contact/send', [
            'name' => '',
            'email' => '',
            'message' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }

    /** @test */
    public function an_email_gets_sent_when_contact_form_is_submitted()
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
