<?php

namespace Tests\Feature\Frontend;

use App\Domains\Auth\Models\User;
use Tests\TestCase;

/**
 * Class UserAccountTest.
 */
class UserAccountTest extends TestCase
{
    /** @test */
    public function only_authenticated_users_can_access_their_account()
    {
        $this->get('/account')->assertRedirect('/login');

        $this->actingAs(factory(User::class)->create());

        $this->get('/account')->assertOk();
    }

    /** @test */
    public function profile_update_requires_validation()
    {
        $this->actingAs(factory(User::class)->create());

        config(['boilerplate.access.user.change_email' => true]);

        $response = $this->patch('/profile/update');

        $response->assertSessionHasErrors(['name', 'email']);

        config(['boilerplate.access.user.change_email' => false]);

        $response = $this->patch('/profile/update');

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_user_can_update_their_profile()
    {
        config(['boilerplate.access.user.change_email' => false]);

        $user = factory(User::class)->create([
            'name' => 'Jane Doe',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Jane Doe',
        ]);

        $response = $this->actingAs($user)
            ->patch('/profile/update', [
                'name' => 'John Doe',
            ])->assertRedirect('/account?#information');

        $response->assertSessionHas('flash_success', __('Profile successfully updated.'));

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'John Doe',
        ]);
    }

    /** @test */
    public function a_user_can_update_their_email_address()
    {
        config(['boilerplate.access.user.change_email' => true]);

        $user = factory(User::class)->create([
            'email' => 'jane@doe.com',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'jane@doe.com',
        ]);

        $response = $this->actingAs($user)
            ->patch('/profile/update', [
                'name' => 'John Doe',
                'email' => 'john@doe.com',
            ])->assertRedirect('/email/verify');

        $response->assertSessionHas('resent');
        $response->assertSessionHas('flash_info', __('You must confirm your new e-mail address before you can go any further.'));

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'email_verified_at' => null,
        ]);

        // Double check
        $this->get('/account')->assertRedirect('/email/verify');
    }
}
