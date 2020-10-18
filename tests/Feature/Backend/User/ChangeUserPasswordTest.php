<?php

namespace Tests\Feature\Backend\User;

use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * Class ChangeUserPasswordTest.
 */
class ChangeUserPasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_a_user_with_correct_permissions_can_visit_the_change_user_password_page()
    {
        $this->actingAs($user = User::factory()->admin()->create());

        $user->syncPermissions(['admin.access.user.change-password']);

        $newUser = User::factory()->create();

        $this->get('/admin/auth/user/'.$newUser->id.'/password/change')->assertOk();

        $user->syncPermissions([]);

        $response = $this->get('/admin/auth/user/'.$newUser->id.'/password/change');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function only_a_user_with_correct_permissions_can_change_a_users_password()
    {
        $this->actingAs($user = User::factory()->admin()->create());

        $user->syncPermissions(['admin.access.user.change-password']);

        $newUser = User::factory()->create();

        $response = $this->patch('/admin/auth/user/'.$newUser->id.'/password/change', [
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ]);

        $response->assertSessionHas('flash_success', __('The user\'s password was successfully updated.'));

        $user->syncPermissions([]);

        $response = $this->patch('/admin/auth/user/'.$newUser->id.'/password/change', [
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ]);

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function the_password_can_be_validated()
    {
        $this->loginAsAdmin();

        $user = User::factory()->create();

        $response = $this->patch("/admin/auth/user/{$user->id}/password/change", [
            'password' => '1234567',
            'password_confirmation' => '1234567',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function the_passwords_must_match()
    {
        $this->loginAsAdmin();

        $user = User::factory()->create();

        $response = $this->patch("/admin/auth/user/{$user->id}/password/change", [
            'password' => 'Boilerplate',
            'password_confirmation' => 'Boilerplate01',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function only_the_master_admin_can_view_the_change_password_screen()
    {
        $this->actingAs($user = User::factory()->admin()->create());

        $user->syncPermissions(['admin.access.user.change-password']);

        $admin = $this->getMasterAdmin();

        $response = $this->get('/admin/auth/user/'.$admin->id.'/password/change');

        $response->assertSessionHas('flash_danger', __('Only the administrator can change their password.'));

        $this->logout();

        $this->loginAsAdmin();

        $this->get('/admin/auth/user/'.$admin->id.'/password/change')->assertOk();
    }

    /** @test */
    public function only_the_master_admin_can_change_their_password()
    {
        $this->actingAs($user = User::factory()->admin()->create());

        $user->syncPermissions(['admin.access.user.change-password']);

        $admin = $this->getMasterAdmin();

        $response = $this->patch('/admin/auth/user/'.$admin->id.'/password/change', [
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ]);

        $response->assertSessionHas('flash_danger', __('Only the administrator can change their password.'));

        $this->logout();

        $this->loginAsAdmin();

        $response = $this->patch('/admin/auth/user/'.$admin->id.'/password/change', [
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ]);

        $response->assertSessionHas('flash_success', __('The user\'s password was successfully updated.'));
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX', $admin->fresh()->password));
    }

    /** @test */
    public function an_admin_can_use_the_same_password_when_history_is_off_on_backend_user_password_change()
    {
        config(['boilerplate.access.user.password_history' => false]);

        $this->loginAsAdmin();

        $user = User::factory()->create(['password' => 'OC4Nzu270N!QBVi%U%qX']);

        $response = $this->patch("/admin/auth/user/{$user->id}/password/change", [
            'password' => 'OC4Nzu270N!QBVi%U%qX',
            'password_confirmation' => 'OC4Nzu270N!QBVi%U%qX',
        ]);

        $response->assertSessionHas('flash_success', __('The user\'s password was successfully updated.'));
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX', $user->fresh()->password));
    }

    /** @test */
    public function an_admin_can_not_use_the_same_password_when_history_is_on_on_backend_user_password_change()
    {
        config(['boilerplate.access.user.password_history' => 3]);

        $this->loginAsAdmin();

        $user = User::factory()->create(['password' => 'OC4Nzu270N!QBVi%U%qX']);

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
        $this->assertSame($errors->get('password')[0], __('You can not set a password that you have previously used within the last 3 times.'));
        $this->assertTrue(Hash::check('OC4Nzu270N!QBVi%U%qX_02', $user->fresh()->password));
    }
}
