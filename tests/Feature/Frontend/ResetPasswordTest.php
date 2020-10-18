<?php

namespace Tests\Feature\Frontend;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Notifications\Frontend\ResetPasswordNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

/**
 * Class ResetPasswordTest.
 */
class ResetPasswordTest extends TestCase
{
    /** @test */
    public function the_password_reset_route_exists()
    {
        $this->get('password/reset')->assertOk();
    }

    /** @test */
    public function password_reset_requires_validation()
    {
        $response = $this->post('/password/email');

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function a_notification_gets_sent_if_password_reset_is_requested()
    {
        Notification::fake();

        $user = User::factory()->create(['email' => 'john@example.com']);

        $this->post('password/email', ['email' => 'john@example.com']);

        Notification::assertSentTo($user, ResetPasswordNotification::class);
    }

    /** @test */
    public function the_reset_password_form_has_required_fields()
    {
        $response = $this->post('password/reset', [
            'token' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $response->assertSessionHasErrors(['token', 'email', 'password']);
    }

    /** @test */
    public function a_password_can_be_reset()
    {
        $user = User::factory()->create(['email' => 'john@example.com']);

        $token = $this->app->make('auth.password.broker')->createToken($user);

        $this->post('password/reset', [
            'token' => $token,
            'email' => 'john@example.com',
            'password' => ']EqZL4}zBT',
            'password_confirmation' => ']EqZL4}zBT',
        ]);

        $this->assertTrue(Hash::check(']EqZL4}zBT', $user->fresh()->password));
    }

    /** @test */
    public function the_password_can_be_validated()
    {
        $user = User::factory()->create(['email' => 'john@example.com']);

        $token = $this->app->make('auth.password.broker')->createToken($user);

        $response = $this->followingRedirects()
            ->post('password/reset', [
                'token' => $token,
                'email' => 'john@example.com',
                'password' => 'secret',
                'password_confirmation' => 'secret',
            ]);

        $this->assertStringContainsString(__('validation.min.string', [
            'attribute' => __('password'),
            'min' => 8,
        ]), $response->content());
    }

    /** @test */
    public function a_user_can_use_the_same_password_when_history_is_off_on_password_reset()
    {
        config(['boilerplate.access.user.password_history' => false]);

        $user = User::factory()->create(['email' => 'john@example.com', 'password' => ']EqZL4}zBT']);

        $token = $this->app->make('auth.password.broker')->createToken($user);

        $response = $this->followingRedirects()
            ->post('password/reset', [
                'token' => $token,
                'email' => 'john@example.com',
                'password' => ']EqZL4}zBT',
                'password_confirmation' => ']EqZL4}zBT',
            ]);

        $this->assertStringContainsString(__('passwords.reset'), $response->content());
        $this->assertTrue(Hash::check(']EqZL4}zBT', $user->fresh()->password));
    }

    /** @test */
    public function a_user_can_not_use_the_same_password_when_history_is_on_on_password_reset()
    {
        config(['boilerplate.access.user.password_history' => 3]);

        $user = User::factory()->create(['email' => 'john@example.com', 'password' => ']EqZL4}zBT']);

        // Change once
        $this->actingAs($user)
            ->patch('/password/update', [
                'current_password' => ']EqZL4}zBT',
                'password' => ':ZqD~57}1t',
                'password_confirmation' => ':ZqD~57}1t',
            ]);

        $this->assertTrue(Hash::check(':ZqD~57}1t', $user->fresh()->password));

        auth()->logout();

        $token = $this->app->make('auth.password.broker')->createToken($user);

        $response = $this->post('password/reset', [
            'token' => $token,
            'email' => 'john@example.com',
            'password' => ']EqZL4}zBT',
            'password_confirmation' => ']EqZL4}zBT',
        ]);

        $response->assertSessionHasErrors();
        $errors = session('errors');
        $this->assertSame($errors->get('password')[0], __('You can not set a password that you have previously used within the last 3 times.'));
        $this->assertTrue(Hash::check(':ZqD~57}1t', $user->fresh()->password));
    }
}
