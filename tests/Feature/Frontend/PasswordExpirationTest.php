<?php

namespace Tests\Feature\Frontend;

use App\Domains\Auth\Models\User;
use Tests\TestCase;

/**
 * Class PasswordExpirationTest.
 */
class PasswordExpirationTest extends TestCase
{
    /** @test */
    public function a_user_can_access_the_password_expired()
    {
        config(['boilerplate.access.user.password_expires_days' => 30]);

        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->get('/password/expired')->assertOk();
    }

    /** @test */
    public function a_user_with_an_expired_password_cannot_access_dashboard()
    {
        $user = factory(User::class)->states('password_expired')->create();

        $this->actingAs($user);

        $response = $this->get('/dashboard')->assertRedirect('/password/expired');

        $response->assertSessionHas('flash_warning', __('Your password has expired. We require you to change your password every '.config('boilerplate.access.user.password_expires_days').' days for security purposes.'));
    }

    /** @test */
    public function a_user_with_an_expired_password_cannot_access_account()
    {
        $user = factory(User::class)->states('password_expired')->create();

        $this->actingAs($user);

        $response = $this->get('/account')->assertRedirect('/password/expired');

        $response->assertSessionHas('flash_warning', __('Your password has expired. We require you to change your password every '.config('boilerplate.access.user.password_expires_days').' days for security purposes.'));
    }

    /** @test */
    public function password_expiration_update_requires_validation()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->patch('/password/expired');

        $response->assertSessionHasErrors(['current_password', 'password']);
    }

    /** @test */
    public function a_user_can_update_their_expired_password()
    {
        $user = factory(User::class)->states('password_expired')->create();

        $this->actingAs($user);

        $this->get('/account')->assertRedirect('/password/expired');

        $response = $this->patch('/password/expired', [
            'current_password' => '1234',
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ])->assertRedirect('/account');

        $response->assertSessionHas('flash_success', __('Password successfully updated.'));

        $this->get('/account')->assertOk();
    }
}
