<?php

namespace Tests\Feature\Backend\User;

use App\Events\Backend\Auth\User\UserPasswordChanged;
use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

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
                'password' => '1234567',
                'password_confirmation' => '1234567',
            ]);

        $this->assertStringContainsString('The password must be at least 8 characters.', $response->content());
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
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ]);

        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.updated_password')]);

        Event::assertDispatched(UserPasswordChanged::class);
    }

    /** @test */
    public function an_admin_can_use_the_same_password_when_history_is_off_on_backend_user_password_change()
    {
        config(['access.users.password_history' => false]);

        $this->loginAsAdmin();
        $user = factory(User::class)->create(['password' => 'OC4Nzu270N!QBVi%U%qX']);

        $response = $this->patch("/admin/auth/user/{$user->id}/password/change", [
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ]);

        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.updated_password')]);
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX', $user->fresh()->password));
    }

    /** @test */
    public function an_admin_can_not_use_the_same_password_when_history_is_on_on_backend_user_password_change()
    {
        config(['access.users.password_history' => 3]);

        $this->loginAsAdmin();
        $user = factory(User::class)->create(['password' => 'OC4Nzu270N!QBVi%U%qX']);

        $this->patch("/admin/auth/user/{$user->id}/password/change", [
            'password' => 'OC4Nzu270N!QBVi%U%qX_02',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX_02',
        ]);

        $response = $this->patch("/admin/auth/user/{$user->id}/password/change", [
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ]);

        $response->assertSessionHasErrors();
        $errors = session('errors');
        $this->assertSame($errors->get('password')[0], __('auth.password_used'));
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX_02', $user->fresh()->password));
    }
}
