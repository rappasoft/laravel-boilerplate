<?php

namespace Tests\Backend\Routes\Auth;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use App\Events\Backend\Auth\User\UserRestored;
use App\Events\Backend\Auth\User\UserDeactivated;
use App\Events\Backend\Auth\User\UserReactivated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\Auth\User\UserPermanentlyDeleted;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

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
            ->get('/admin/auth/user/'.$this->user->id)
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
            ->get('/admin/auth/user/'.$this->user->id.'/edit')
            ->assertSeeText('Edit User');
    }

    /** @test */
    public function an_admin_can_access_a_user_change_password_page()
    {
        $this->setUpAcl();

        $this->actingAs($this->admin)
            ->get('/admin/auth/user/'.$this->user->id.'/password/change')
            ->assertSeeText('Change Password for '.$this->user->full_name);
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
            ->get('/admin/auth/user/'.$this->user->id.'/account/confirm/resend')
            ->assertRedirect('/admin/auth/user');

        $this->user->update(['confirmed' => 0]);

        $this->actingAs($this->admin)
            ->followingRedirects()
            ->from('/admin/auth/user')
            ->get('/admin/auth/user/'.$this->user->id.'/account/confirm/resend')
            ->assertSeeText('A new confirmation e-mail has been sent to the address on file.');

        Notification::assertSentTo($this->user, UserNeedsConfirmation::class);
    }
}
