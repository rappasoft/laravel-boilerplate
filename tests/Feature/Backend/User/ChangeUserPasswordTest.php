<?php

namespace Tests\Feature\Backend\User;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\Auth\User\UserPasswordChanged;

class ChangeUserPasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_password_can_be_validated()
    {
        $this->loginAsAdmin();
        $user = factory(User::class)->create();

        $response = $this->followingRedirects()
            ->patch("/admin/auth/user/{$user->id}/password/change", [
                'password' => '12345678',
                'password_confirmation' => '12345678',
            ]);

        $this->assertContains(__('auth.password_rules'), $response->content());
    }

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
            'password' => 'Boilerplate',
            'password_confirmation' => 'Boilerplate01',
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
            'password' => 'Boilerplate01',
            'password_confirmation' => 'Boilerplate01',
        ]);

        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.updated_password')]);

        Event::assertDispatched(UserPasswordChanged::class);
    }

    /** @test */
    public function an_admin_can_use_the_same_password_when_history_is_off_on_backend_user_password_change()
    {
        config(['access.users.password_history' => false]);

        $this->loginAsAdmin();
        $user = factory(User::class)->create(['password' => 'Boilerplate01']);

        $response = $this->patch("/admin/auth/user/{$user->id}/password/change", [
            'password' => 'Boilerplate01',
            'password_confirmation' => 'Boilerplate01',
        ]);

        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.updated_password')]);
        $this->assertTrue(Hash::check('Boilerplate01', $user->fresh()->password));
    }

    /** @test */
    public function an_admin_can_not_use_the_same_password_when_history_is_on_on_backend_user_password_change()
    {
        config(['access.users.password_history' => 3]);

        $this->loginAsAdmin();
        $user = factory(User::class)->create(['password' => 'Boilerplate01']);

        $this->patch("/admin/auth/user/{$user->id}/password/change", [
            'password' => 'Boilerplate02',
            'password_confirmation' => 'Boilerplate02',
        ]);

        $response = $this->patch("/admin/auth/user/{$user->id}/password/change", [
            'password' => 'Boilerplate01',
            'password_confirmation' => 'Boilerplate01',
        ]);

        $response->assertSessionHasErrors();
        $errors = session('errors');
        $this->assertEquals($errors->get('password')[0], __('auth.password_used'));
        $this->assertTrue(Hash::check('Boilerplate02', $user->fresh()->password));
    }
}
