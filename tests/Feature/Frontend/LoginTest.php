<?php

namespace Tests\Feature\Frontend;

use App\Domains\Auth\Events\User\UserLoggedIn;
use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

/**
 * Class LoginTest.
 */
class LoginTest extends TestCase
{
    /** @test */
    public function the_login_route_exists()
    {
        $this->get('/login')->assertStatus(200);
    }

    /** @test */
    public function login_requires_validation()
    {
        $response = $this->post('/login');

        $response->assertSessionHasErrors(['email', 'password']);
    }

    /** @test */
    public function a_user_can_login_with_email_and_password()
    {
        Event::fake();

        $user = factory(User::class)->create([
            'email' => 'john@example.com',
            'password' => 'secret',
        ]);

        $this->post('/login', [
            'email' => 'john@example.com',
            'password' => 'secret',
        ])->assertRedirect(route(homeRoute()));

        Event::assertDispatched(function (UserLoggedIn $event) use ($user) {
            return $event->user->id === $user->id;
        });

        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function inactive_users_cant_login()
    {
        factory(User::class)->states('inactive')->create([
            'email' => 'john@example.com',
            'password' => 'secret',
        ]);

        $response = $this->post('/login', [
            'email' => 'john@example.com',
            'password' => 'secret',
        ]);

        $response->assertSessionHas('flash_danger', __('Your account has been deactivated.'));
        $this->assertFalse($this->isAuthenticated());
    }

    /** @test */
    public function cant_login_with_invalid_credentials()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $response = $this->post('/login', [
            'email' => 'not-existend@user.com',
            'password' => '9s8gy8s9diguh4iev',
        ]);

        $response->assertSessionHas('flash_danger', __('These credentials do not match our records.'));
        $this->assertFalse($this->isAuthenticated());
    }

    /** @test */
    public function a_users_ip_and_login_time_is_updated_on_login()
    {
        $user = factory(User::class)->create([
            'email' => 'john@example.com',
            'password' => 'secret',
            'last_login_at' => null,
            'last_login_ip' => null,
        ]);

        $this->post('/login', [
            'email' => 'john@example.com',
            'password' => 'secret',
        ]);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
            'last_login_at' => null,
            'last_login_ip' => null,
        ]);
    }

    /** @test */
    public function a_user_can_log_out()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->post('/logout')
            ->assertRedirect('/');

        $this->assertFalse($this->isAuthenticated());
    }
}
