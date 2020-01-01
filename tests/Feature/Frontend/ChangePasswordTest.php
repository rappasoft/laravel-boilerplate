<?php

namespace Tests\Feature\Frontend;

use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_password_can_be_validated()
    {
        $user = factory(User::class)->create(['password' => '1234']);

        $response = $this->actingAs($user)
            ->followingRedirects()
            ->patch('/password/update', [
                'old_password' => '1234',
                'password' => '1234567',
                'password_confirmation' => '1234567',
            ]);

        $this->assertStringContainsString('The password must be at least 8 characters.', $response->content());
    }

    /** @test */
    public function the_password_can_be_changed()
    {
        $user = factory(User::class)->create(['password' => '1234']);

        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => '1234',
                'password' => 'OC4Nzu270N!QBVi%U%qX',
                'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
            ]);

        $response->assertSessionHas('flash_success');
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX', $user->fresh()->password));
    }

    /** @test */
    public function the_password_must_be_confirmed()
    {
        $user = factory(User::class)->create(['password' => '1234']);

        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => '1234',
                'password' => 'Boilerplate01',
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
                'password' => 'Boilerplate01',
                'password_confirmation' => 'Boilerplate01',
            ]);

        $response->assertSessionHasErrors('old_password');
    }

    /** @test */
    public function a_user_can_use_the_same_password_when_history_is_off_on_account_change_password()
    {
        config(['access.users.password_history' => false]);

        $user = factory(User::class)->create(['password' => 'OC4Nzu270N!QBVi%U%qX']);

        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'OC4Nzu270N!QBVi%U%qX',
                'password' => 'OC4Nzu270N!QBVi%U%qX_02',
                'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX_02',
            ]);

        $response->assertSessionHas('flash_success');
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX_02', $user->fresh()->password));
    }

    /** @test */
    public function a_user_can_not_use_the_same_password_when_history_is_on_on_account_change_password()
    {
        config(['access.users.password_history' => 3]);

        $user = factory(User::class)->create(['password' => 'OC4Nzu270N!QBVi%U%qX']);

        // Change once
        $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'OC4Nzu270N!QBVi%U%qX',
                'password' => 'OC4Nzu270N!QBVi%U%qX_02',
                'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX_02',
            ]);

        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX_02', $user->fresh()->password));

        // Change back
        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'OC4Nzu270N!QBVi%U%qX_02',
                'password' => 'OC4Nzu270N!QBVi%U%qX',
                'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
            ]);

        $response->assertSessionHasErrors();
        $errors = session('errors');
        $this->assertSame($errors->get('password')[0], __('auth.password_used'));
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX_02', $user->fresh()->password));
    }

    /** @test */
    public function a_user_can_reuse_a_password_after_it_surpasses_the_limit()
    {
        config(['access.users.password_history' => 2]);

        $user = factory(User::class)->create(['password' => 'OC4Nzu270N!QBVi%U%qX']);

        // Change once
        $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'OC4Nzu270N!QBVi%U%qX',
                'password' => 'OC4Nzu270N!QBVi%U%qX_02',
                'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX_02',
            ]);

        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX_02', $user->fresh()->password));

        // Change twice
        $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'OC4Nzu270N!QBVi%U%qX_02',
                'password' => 'OC4Nzu270N!QBVi%U%qX_03',
                'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX_03',
            ]);

        $response = $this->actingAs($user)
            ->patch('/password/update', [
                'old_password' => 'OC4Nzu270N!QBVi%U%qX_03',
                'password' => 'OC4Nzu270N!QBVi%U%qX',
                'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
            ]);

        $response->assertSessionHas('flash_success');
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX', $user->fresh()->password));
    }
}
