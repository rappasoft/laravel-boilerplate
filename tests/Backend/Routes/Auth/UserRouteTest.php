<?php

namespace Tests\Backend\Routes\Auth;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use App\Events\Backend\Auth\User\UserRestored;
use App\Events\Backend\Auth\User\UserDeactivated;
use App\Events\Backend\Auth\User\UserReactivated;
use App\Events\Backend\Auth\User\UserPermanentlyDeleted;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use Tests\TestCase;

/**
 * Class UserRouteTest.
 */
class UserRouteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_active_users_page()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->get('/admin/auth/user')
            ->assertSeeText('Active Users');
    }

    /** @test */
    public function an_admin_can_access_deactivated_users_page()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->get('/admin/auth/user/deactivated')
            ->assertSeeText('Deactivated Users');
    }

    /** @test */
    public function an_admin_can_access_deleted_users_page()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->get('/admin/auth/user/deleted')
            ->assertSeeText('Deleted Users');
    }

    /** @test */
    public function an_admin_can_access_create_user_page()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->get('/admin/auth/user/create')
            ->assertSeeText('Create User');
    }

    /** @test */
    public function an_admin_can_view_single_user_page()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->get('/admin/auth/user/' . $this->user->id)
            ->assertSeeText('View User')
            ->assertSeeText('Overview')
            ->assertSeeText($this->user->first_name)
            ->assertSeeText($this->user->last_name)
            ->assertSeeText($this->user->email);
    }

    /** @test */
    public function an_admin_can_access_the_edit_user_page()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->get('/admin/auth/user/' . $this->user->id . '/edit')
            ->assertSeeText('Edit User');
    }

    /** @test */
    public function an_admin_can_access_a_user_change_password_page()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->get('/admin/auth/user/' . $this->user->id . '/password/change')
            ->assertSeeText('Change Password for ' . $this->user->full_name);
    }

    /** @test  */
    public function an_admin_can_resend_users_confirmation_email()
    {
        $this->setUpAcl();
        Notification::fake();

        config(['access.users.confirm_email' => true]);
        config(['access.users.requires_approval' => false]);

        $this->actingAs($this->admin)
            ->from('/admin/auth/user')
            ->get('/admin/auth/user/' . $this->user->id . '/account/confirm/resend')
            ->assertRedirect('/admin/auth/user');

        $this->user->update(['confirmed' => 0]);

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->from('/admin/auth/user')
            ->get('/admin/auth/user/' . $this->user->id . '/account/confirm/resend')
            ->assertSeeText('A new confirmation e-mail has been sent to the address on file.');

        Notification::assertSentTo($this->user, UserNeedsConfirmation::class);
    }

    /** @test */
    public function an_admin_can_impersonate_other_users()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->get('/admin/auth/user/' . $this->user->id . '/login-as')
            ->assertSeeText('You are currently logged in as ' . $this->user->full_name . '.')
            ->assertSeeText($this->admin->full_name);

        $this->assertAuthenticatedAs($this->user);
    }

    /** @test */
    public function impersonation_of_himself_does_not_work()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->get('/admin/auth/user/' . $this->admin->id . '/login-as')
            ->assertSeeText('Do not try to login as yourself.');
    }

    /** @test */
    public function an_admin_can_exit_an_impersonation()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->get('/admin/auth/user/' . $this->user->id . '/login-as')
            ->assertSeeText('You are currently logged in as ' . $this->user->full_name . '.');

        $this->assertAuthenticatedAs($this->user);

        $this->get('/logout-as')->assertRedirect('admin/auth/user');

        $this->assertAuthenticatedAs($this->admin);
    }

    /** @test */
    public function an_admin_can_deactivate_users()
    {
        $this->setUpAcl();
        Event::fake();

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->get('/admin/auth/user/' . $this->user->id . '/mark/0')
            ->assertSeeText('The user was successfully updated.');

        Event::assertDispatched(UserDeactivated::class);
    }

    /** @test */
    public function an_admin_can_reactivate_users()
    {
        $this->setUpAcl();
        Event::fake();

        $this->user->update(['active' => 0]);

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->get('/admin/auth/user/' . $this->user->id . '/mark/1')
            ->assertSeeText('The user was successfully updated.');

        Event::assertDispatched(UserReactivated::class);
    }

    /** @test */
    public function an_admin_cant_deactivate_himself()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->get('/admin/auth/user/' . $this->admin->id . '/mark/0')
            ->assertSeeText('You can not do that to yourself.');
    }

    /** @test */
    public function an_admin_can_restore_users()
    {
        $this->setUpAcl();
        Event::fake();

        $this->assertDatabaseHas(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => null]);

        $now = Carbon::now();
        $this->user->deleted_at = $now;
        $this->user->save();

        $this->assertDatabaseHas(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => $now]);

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->get('/admin/auth/user/' . $this->user->id . '/restore')
            ->assertSeeText('The user was successfully restored.');

        $this->assertDatabaseHas(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => null]);
        Event::assertDispatched(UserRestored::class);
    }

    /** @test */
    public function a_not_deleted_user_cant_be_restored()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->get('/admin/auth/user/' . $this->user->id . '/restore')
            ->assertSeeText('This user is not deleted so it can not be restored.');
    }

    /** @test */
    public function an_admin_can_delete_user_permanently()
    {
        $this->setUpAcl();
        Event::fake();

        $this->actingAs($this->admin)
            ->delete('/admin/auth/user/' . $this->user->id);

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->get('/admin/auth/user/' . $this->user->id . '/delete')
            ->assertSeeText('The user was deleted permanently.');

        Event::assertDispatched(UserPermanentlyDeleted::class);
    }

    /** @test */
    public function a_user_must_be_deleted_before_destroed_permanently()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->get('/admin/auth/user/' . $this->user->id . '/delete')
            ->assertSeeText('This user must be deleted first before it can be destroyed permanently.');
    }
}
