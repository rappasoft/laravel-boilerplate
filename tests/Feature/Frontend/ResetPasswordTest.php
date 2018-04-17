<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Notifications\Frontend\Auth\UserNeedsPasswordReset;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_password_reset_route_exists()
    {
        $this->get('password/reset')->assertStatus(200);
    }

    /** @test */
    public function email_is_required_in_email_password_form()
    {
        $response = $this->post('/password/reset', ['email' => '']);
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function a_notification_gets_sent_if_password_reset_is_requested()
    {
        $user = factory(User::class)->create(['email' => 'john@example.com']);
        Notification::fake();

        $this->post('password/email', ['email' => 'john@example.com']);

        Notification::assertSentTo($user, UserNeedsPasswordReset::class);
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
        $user = factory(User::class)->create(['email' => 'john@example.com']);
        $token = $this->app->make('auth.password.broker')->createToken($user);

        $this->post('password/reset', [
            'token' => $token,
            'email' => 'john@example.com',
            'password' => 'new_password',
            'password_confirmation' => 'new_password',
        ]);

        $this->assertTrue(Hash::check('new_password', $user->fresh()->password));
    }

	/** @test */
    public function a_user_can_use_the_same_password_when_history_is_off_on_password_reset() {
		config(['access.users.password_history' => false]);

		$user = factory(User::class)->create(['email' => 'john@example.com', 'password' => 'secret']);
		$token = $this->app->make('auth.password.broker')->createToken($user);

		$response = $this->post('password/reset', [
			'token' => $token,
			'email' => 'john@example.com',
			'password' => 'secret',
			'password_confirmation' => 'secret',
		]);

		$response->assertSessionHas('flash_success');
		$this->assertTrue(Hash::check('secret', $user->fresh()->password));
	}

	/** @test */
	public function a_user_can_not_use_the_same_password_when_history_is_on_on_password_reset() {
		config(['access.users.password_history' => 3]);

		$user = factory(User::class)->create(['email' => 'john@example.com', 'password' => 'secret']);

		// Change once
		$this->actingAs($user)
			->patch('/password/update', [
				'old_password' => 'secret',
				'password' => 'secret2',
				'password_confirmation' => 'secret2',
			]);

		$this->assertTrue(Hash::check('secret2', $user->fresh()->password));

		auth()->logout();

		$token = $this->app->make('auth.password.broker')->createToken($user);
		$response = $this->post('password/reset', [
			'token' => $token,
			'email' => 'john@example.com',
			'password' => 'secret',
			'password_confirmation' => 'secret',
		]);

		$response->assertSessionHasErrors();
		$errors = session('errors');
		$this->assertEquals($errors->get('password')[0], __('auth.password_used'));
		$this->assertTrue(Hash::check('secret2', $user->fresh()->password));
	}
}
