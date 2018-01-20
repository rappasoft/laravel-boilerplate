<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;
use App\Models\Auth\Role;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Frontend\Auth\UserConfirmed;
use App\Events\Frontend\Auth\UserRegistered;
use Illuminate\Support\Facades\Notification;
use App\Repositories\Backend\Auth\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Helper function for registering a user.
     * @param array $userData
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function registerUser($userData = [])
    {
        factory(Role::class)->create(['name' => 'user']);

        return $this->post('/register', array_merge([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ], $userData));
    }

    /** @test */
    public function the_register_route_exists()
    {
        $this->get('/register')->assertStatus(200);
    }

    /** @test */
    public function user_registration_can_be_disabled()
    {
        config(['access.registration' => false]);
        $this->get('/register')->assertStatus(404);
    }

    /** @test */
    public function a_user_can_register_an_account()
    {
        $this->registerUser([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $newUser = (new UserRepository())->where('email', 'john@example.com')->first();
        $this->assertEquals($newUser->first_name, 'John');
        $this->assertEquals($newUser->last_name, 'Doe');
        $this->assertTrue(Hash::check('password', $newUser->password));
    }

    /** @test */
    public function if_email_confirmation_is_active_an_notification_gets_sent()
    {
        config(['access.users.confirm_email' => true]);
        Notification::fake();

        $this->registerUser(['email' => 'john@example.com']);
        $user = (new UserRepository())->where('email', 'john@example.com')->first();

        Notification::assertSentTo($user, UserNeedsConfirmation::class);
    }

    /** @test */
    public function a_user_account_can_confirm_his_email()
    {
        $user = factory(User::class)->states('unconfirmed')->create();
        Event::fake();

        $response = $this->get('/account/confirm/'.$user->confirmation_code);

        $response->assertSessionHas(['flash_success' => __('exceptions.frontend.auth.confirmation.success')]);
        $this->assertEquals(1, $user->fresh()->confirmed);
        Event::assertDispatched(UserConfirmed::class);
    }

    /** @test */
    public function confirmation_can_be_resent()
    {
        Notification::fake();

        $user = factory(User::class)->states('unconfirmed')->create();

        $response = $this->get('/account/confirm/resend/'.$user->uuid);

        $response->assertSessionHas(['flash_success' => __('exceptions.frontend.auth.confirmation.resent')]);

        Notification::assertSentTo($user, UserNeedsConfirmation::class);
    }

    /** @test */
    public function if_requires_approval_is_active_the_user_cant_login()
    {
        config(['access.users.requires_approval' => true]);

        $response = $this->registerUser();
        $response->assertSessionHas(['flash_success' => __('exceptions.frontend.auth.confirmation.created_pending')]);

        $response = $this->post('/login', ['email' => 'john@example.com', 'password' => 'password']);

        $response->assertSessionHas(['flash_danger' => __('exceptions.frontend.auth.confirmation.pending')]);
    }

    /** @test */
    public function an_event_get_fired_on_registration()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->registerUser();

        Event::assertDispatched(UserRegistered::class);
    }

    /** @test */
    public function first_name_is_required()
    {
        $response = $this->post('/register', [
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('first_name');
    }

    /** @test */
    public function last_name_is_required()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('last_name');
    }

    /** @test */
    public function email_is_required()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function email_must_be_unique()
    {
        factory(User::class)->create(['email' => 'john@example.com']);

        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function password_must_be_confirmed()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function passwords_must_be_equivalent()
    {
        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'not_the_same',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function it_redirects_to_dashboard_after_successful_registration()
    {
        config(['access.users.confirm_email' => false]);

        $response = $this->registerUser();

        $response->assertRedirect('/dashboard');
    }
}
