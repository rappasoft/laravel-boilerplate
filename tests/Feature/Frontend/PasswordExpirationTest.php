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
    public function a_user_with_an_expired_password_cannot_access_dashboard()
    {
        $user = factory(User::class)->states('password_expired')->create();

        $this->actingAs($user);

        $response = $this->get('/dashboard')
            ->assertRedirect('/password/expired');

        $response->assertSessionHas('flash_warning', __('Your password has expired. We require you to change your password every '.config('boilerplate.access.user.password_expires_days').' days for security purposes.'));
    }

    /** @test */
    public function a_user_with_an_expired_password_cannot_access_account()
    {
        $user = factory(User::class)->states('password_expired')->create();

        $this->actingAs($user);

        $response = $this->get('/account')
            ->assertRedirect('/password/expired');

        $response->assertSessionHas('flash_warning', __('Your password has expired. We require you to change your password every '.config('boilerplate.access.user.password_expires_days').' days for security purposes.'));
    }
}
