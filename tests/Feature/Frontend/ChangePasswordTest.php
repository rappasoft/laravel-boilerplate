<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_password_can_be_changed()
    {
        $user = factory(User::class)->create(['password' => '1234']);

        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => '1234',
                'password' => '12345678',
                'password_confirmation' => '12345678',
            ]);

        $response->assertSessionHas('flash_success');
        $this->assertTrue(Hash::check('12345678', $user->fresh()->password));
    }

    /** @test */
    public function the_password_must_be_confirmed()
    {
        $user = factory(User::class)->create(['password' => '1234']);

        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => '1234',
                'password' => '12345678',
                'password_confirmation' => '',
            ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function the_old_password_is_required_in_the_password_change_form()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => '',
                'password' => '123456',
                'password_confirmation' => '123456',
            ]);

        $response->assertSessionHasErrors('old_password');
    }

    /** @test */
    public function a_user_can_use_the_same_password_when_history_is_off_on_account_change_password()
    {
        config(['access.users.password_history' => false]);

        $user = factory(User::class)->create(['password' => 'secret']);

        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'secret',
                'password' => 'secret',
                'password_confirmation' => 'secret',
            ]);

        $response->assertSessionHas('flash_success');
        $this->assertTrue(Hash::check('secret', $user->fresh()->password));
    }

    /** @test */
    public function a_user_can_not_use_the_same_password_when_history_is_on_on_account_change_password()
    {
        config(['access.users.password_history' => 1]);

        $user = factory(User::class)->create(['password' => 'secret']);

        // Change once
        $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'secret',
                'password' => 'secret2',
                'password_confirmation' => 'secret2',
            ]);

        $this->assertTrue(Hash::check('secret2', $user->fresh()->password));

        // Change back
        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'secret2',
                'password' => 'secret',
                'password_confirmation' => 'secret',
            ]);

        $response->assertSessionHasErrors();
        $errors = session('errors');
        $this->assertEquals($errors->get('password')[0], __('auth.password_used'));
        $this->assertTrue(Hash::check('secret2', $user->fresh()->password));
    }

    /** @test */
    public function a_user_can_reuse_a_password_after_it_surpasses_the_limit()
    {
        config(['access.users.password_history' => 2]);

        $user = factory(User::class)->create(['password' => 'secret']);

        // Change once
        $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'secret',
                'password' => 'secret2',
                'password_confirmation' => 'secret2',
            ]);

        $this->assertTrue(Hash::check('secret2', $user->fresh()->password));

        // Change twice
        $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'secret2',
                'password' => 'secret3',
                'password_confirmation' => 'secret3',
            ]);

        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'secret3',
                'password' => 'secret',
                'password_confirmation' => 'secret',
            ]);

        $response->assertSessionHas('flash_success');
        $this->assertTrue(Hash::check('secret', $user->fresh()->password));
    }
}
