<?php

namespace Tests\Feature\Backend\User;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\Auth\User\UserPasswordChanged;

class ChangeUserPasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_a_user_change_password_page()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();

        $response = $this->get("/admin/auth/user/{$user->id}/password/change");

        $response->assertStatus(200);
    }

    /** @test */
    public function the_passwords_must_match()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();

        $response = $this->patch("/admin/auth/user/{$user->id}/password/change", [
            'password' => '1234567',
            'password_confirmation' => '12345678',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function the_user_password_can_be_changed()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();
        Event::fake();

        $response = $this->patch("/admin/auth/user/{$user->id}/password/change", [
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);

        $response->assertSessionHas(['flash_success' => 'The user\'s password was successfully updated.']);

        Event::assertDispatched(UserPasswordChanged::class);
    }
}
