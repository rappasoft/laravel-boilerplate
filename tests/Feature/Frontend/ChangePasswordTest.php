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
        $user = factory(User::class)->create(['password' => Hash::make('1234')]);

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
        $user = factory(User::class)->create(['password' => Hash::make('1234')]);

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
}
