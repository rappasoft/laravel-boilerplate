<?php

use Carbon\Carbon;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use App\Events\Backend\Auth\User\UserRestored;
use App\Events\Backend\Auth\User\UserDeactivated;
use App\Events\Backend\Auth\User\UserReactivated;
use App\Events\Backend\Auth\User\UserPermanentlyDeleted;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class UserRouteTest.
 */
class UserRouteTest extends BrowserKitTestCase
{
    public function testActiveUsers()
    {
        $this->actingAs($this->admin)->visit('/admin/auth/user')->see('Active Users');
    }

    public function testDeactivatedUsers()
    {
        $this->actingAs($this->admin)->visit('/admin/auth/user/deactivated')->see('Deactivated Users');
    }

    public function testDeletedUsers()
    {
        $this->actingAs($this->admin)->visit('/admin/auth/user/deleted')->see('Deleted Users');
    }

    public function testCreateUser()
    {
        $this->actingAs($this->admin)->visit('/admin/auth/user/create')->see('Create User');
    }

    public function testViewUser()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/'.$this->user->id)
             ->see('View User')
             ->see('Overview')
             ->see($this->user->first_name)
             ->see($this->user->last_name)
             ->see($this->user->email);
    }

    public function testEditUser()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/'.$this->user->id.'/edit')
             ->see('Edit User')
             ->see($this->user->first_name)
             ->see($this->user->last_name)
             ->see($this->user->email);
    }

    public function testChangeUserPassword()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/'.$this->user->id.'/password/change')
             ->see('Change Password for '.$this->user->full_name);
    }

    public function testResendUserConfirmationEmail()
    {
        config(['access.users.confirm_email' => true]);
        config(['access.users.requires_approval' => false]);

        $this->actingAs($this->admin)
            ->visit('/admin/auth/user')
            ->visit('/admin/auth/user/'.$this->user->id.'/account/confirm/resend')
            ->seePageIs('/admin/auth/user')
            ->see('This user is already confirmed.');

        $this->user->update(['confirmed' => 0]);

        Notification::fake();

        $this->actingAs($this->admin)
             ->visit('/admin/auth/user')
             ->visit('/admin/auth/user/'.$this->user->id.'/account/confirm/resend')
             ->seePageIs('/admin/auth/user')
             ->see('A new confirmation e-mail has been sent to the address on file.');

        Notification::assertSentTo($this->user, UserNeedsConfirmation::class);
    }

    public function testLoginAsUser()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/'.$this->user->id.'/login-as')
             ->seePageIs('/dashboard')
             ->see('You are currently logged in as '.$this->user->full_name.'.')
             ->see($this->admin->full_name)
             ->assertTrue(auth()->id() == $this->user->id);
    }

    public function testCantLoginAsSelf()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/'.$this->admin->id.'/login-as')
             ->see('Do not try to login as yourself.');
    }

    public function testLogoutAsUser()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/'.$this->user->id.'/login-as')
             ->seePageIs('/dashboard')
             ->see('You are currently logged in as '.$this->user->full_name.'.')
             ->click('Re-Login as '.$this->admin->full_name)
             ->seePageIs('/admin/auth/user')
             ->assertTrue(auth()->id() == $this->admin->id);
    }

    public function testDeactivateReactivateUser()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/'.$this->user->id.'/mark/0')
             ->seePageIs('/admin/auth/user/deactivated')
             ->see('The user was successfully updated.')
             ->seeInDatabase(config('access.table_names.users'), ['id' => $this->user->id, 'active' => 0])
             ->visit('/admin/auth/user/'.$this->user->id.'/mark/1')
             ->seePageIs('/admin/auth/user')
             ->see('The user was successfully updated.')
             ->seeInDatabase(config('access.table_names.users'), ['id' => $this->user->id, 'active' => 1]);

        Event::assertDispatched(UserDeactivated::class);
        Event::assertDispatched(UserReactivated::class);
    }

    public function testCantNotDeactivateSelf()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user')
             ->visit('/admin/auth/user/'.$this->admin->id.'/mark/0')
             ->seePageIs('/admin/auth/user')
             ->see('You can not do that to yourself.');
    }

    public function testRestoreUser()
    {
        // Make sure our events are fired
        Event::fake();

        $this->user->deleted_at = Carbon::now();
        $this->user->save();

        $this->actingAs($this->admin)
             ->notSeeInDatabase(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => null])
             ->visit('/admin/auth/user/'.$this->user->id.'/restore')
             ->seePageIs('/admin/auth/user')
             ->see('The user was successfully restored.')
             ->seeInDatabase(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => null]);

        Event::assertDispatched(UserRestored::class);
    }

    public function testUserIsDeletedBeforeBeingRestored()
    {
        $this->actingAs($this->admin)
             ->seeInDatabase(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => null])
             ->visit('/admin/auth/user')
             ->visit('/admin/auth/user/'.$this->user->id.'/restore')
             ->seePageIs('/admin/auth/user')
             ->see('This user is not deleted so it can not be restored.')
             ->seeInDatabase(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => null]);
    }

    public function testPermanentlyDeleteUser()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
             ->delete('/admin/auth/user/'.$this->user->id)
             ->notSeeInDatabase(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => null])
             ->visit('/admin/auth/user/'.$this->user->id.'/delete')
             ->seePageIs('/admin/auth/user/deleted')
             ->see('The user was deleted permanently.')
             ->notSeeInDatabase(config('access.table_names.users'), ['id' => $this->user->id]);

        Event::assertDispatched(UserPermanentlyDeleted::class);
    }

    public function testUserIsDeletedBeforeBeingPermanentlyDeleted()
    {
        $this->actingAs($this->admin)
             ->seeInDatabase(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => null])
             ->visit('/admin/auth/user')
             ->visit('/admin/auth/user/'.$this->user->id.'/delete')
             ->seePageIs('/admin/auth/user')
             ->see('This user must be deleted first before it can be destroyed permanently.')
             ->seeInDatabase(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => null]);
    }
}
