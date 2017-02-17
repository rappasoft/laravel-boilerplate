<?php

use Carbon\Carbon;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Access\User\UserRestored;
use App\Events\Backend\Access\User\UserDeactivated;
use App\Events\Backend\Access\User\UserReactivated;
use App\Events\Backend\Access\User\UserPermanentlyDeleted;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class UserRouteTest.
 */
class UserRouteTest extends BrowserKitTestCase
{
    public function testActiveUsers()
    {
        $this->actingAs($this->admin)->visit('/admin/access/user')->see('Active Users');
    }

    public function testDeactivatedUsers()
    {
        $this->actingAs($this->admin)->visit('/admin/access/user/deactivated')->see('Deactivated Users');
    }

    public function testDeletedUsers()
    {
        $this->actingAs($this->admin)->visit('/admin/access/user/deleted')->see('Deleted Users');
    }

    public function testCreateUser()
    {
        $this->actingAs($this->admin)->visit('/admin/access/user/create')->see('Create User');
    }

    public function testViewUser()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/access/user/'.$this->user->id)
             ->see('View User')
             ->see('Overview')
             ->see('History')
             ->see($this->user->name)
             ->see($this->user->email);
    }

    public function testEditUser()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/access/user/'.$this->user->id.'/edit')
             ->see('Edit User')
             ->see($this->user->name)
             ->see($this->user->email);
    }

    public function testChangeUserPassword()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/access/user/'.$this->user->id.'/password/change')
             ->see('Change Password for '.$this->user->name);
    }

    public function testResendUserConfirmationEmail()
    {
        Notification::fake();
        $this->actingAs($this->admin)
             ->visit('/admin/access/user')
             ->visit('/admin/access/user/'.$this->user->id.'/account/confirm/resend')
             ->seePageIs('/admin/access/user')
             ->see('A new confirmation e-mail has been sent to the address on file.');
        Notification::assertSentTo($this->user, UserNeedsConfirmation::class);
    }

    public function testLoginAsUser()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/access/user/'.$this->user->id.'/login-as')
             ->seePageIs('/')
             ->see('You are currently logged in as '.$this->user->name.'.')
             ->see($this->admin->name)
             ->assertTrue(access()->id() == $this->user->id);
    }

    public function testCantLoginAsSelf()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/access/user/'.$this->admin->id.'/login-as')
             ->see('Do not try to login as yourself.');
    }

    public function testLogoutAsUser()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/access/user/'.$this->user->id.'/login-as')
             ->seePageIs('/')
             ->see('You are currently logged in as '.$this->user->name.'.')
             ->click('Re-Login as '.$this->admin->name)
             ->seePageIs('/admin/access/user')
             ->assertTrue(access()->id() == $this->admin->id);
    }

    public function testDeactivateReactivateUser()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
             ->visit('/admin/access/user/'.$this->user->id.'/mark/0')
             ->seePageIs('/admin/access/user/deactivated')
             ->see('The user was successfully updated.')
             ->seeInDatabase(config('access.users_table'), ['id' => $this->user->id, 'status' => 0])
             ->visit('/admin/access/user/'.$this->user->id.'/mark/1')
             ->seePageIs('/admin/access/user')
             ->see('The user was successfully updated.')
             ->seeInDatabase(config('access.users_table'), ['id' => $this->user->id, 'status' => 1]);

        Event::assertDispatched(UserDeactivated::class);
        Event::assertDispatched(UserReactivated::class);
    }

    public function testRestoreUser()
    {
        // Make sure our events are fired
        Event::fake();

        $this->user->deleted_at = Carbon::now();
        $this->user->save();

        $this->actingAs($this->admin)
             ->notSeeInDatabase(config('access.users_table'), ['id' => $this->user->id, 'deleted_at' => null])
             ->visit('/admin/access/user/'.$this->user->id.'/restore')
             ->seePageIs('/admin/access/user')
             ->see('The user was successfully restored.')
             ->seeInDatabase(config('access.users_table'), ['id' => $this->user->id, 'deleted_at' => null]);

        Event::assertDispatched(UserRestored::class);
    }

    public function testUserIsDeletedBeforeBeingRestored()
    {
        $this->actingAs($this->admin)
             ->seeInDatabase(config('access.users_table'), ['id' => $this->user->id, 'deleted_at' => null])
             ->visit('/admin/access/user')
             ->visit('/admin/access/user/'.$this->user->id.'/restore')
             ->seePageIs('/admin/access/user')
             ->see('This user is not deleted so it can not be restored.')
             ->seeInDatabase(config('access.users_table'), ['id' => $this->user->id, 'deleted_at' => null]);
    }

    public function testPermanentlyDeleteUser()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
             ->delete('/admin/access/user/'.$this->user->id)
             ->notSeeInDatabase(config('access.users_table'), ['id' => $this->user->id, 'deleted_at' => null])
             ->visit('/admin/access/user/'.$this->user->id.'/delete')
             ->seePageIs('/admin/access/user/deleted')
             ->see('The user was deleted permanently.')
             ->notSeeInDatabase(config('access.users_table'), ['id' => $this->user->id]);

        Event::assertDispatched(UserPermanentlyDeleted::class);
    }

    public function testUserIsDeletedBeforeBeingPermanentlyDeleted()
    {
        $this->actingAs($this->admin)
             ->seeInDatabase(config('access.users_table'), ['id' => $this->user->id, 'deleted_at' => null])
             ->visit('/admin/access/user')
             ->visit('/admin/access/user/'.$this->user->id.'/delete')
             ->seePageIs('/admin/access/user')
             ->see('This user must be deleted first before it can be destroyed permanently.')
             ->seeInDatabase(config('access.users_table'), ['id' => $this->user->id, 'deleted_at' => null]);
    }

    public function testCantNotDeactivateSelf()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/access/user')
             ->visit('/admin/access/user/'.$this->admin->id.'/mark/0')
             ->seePageIs('/admin/access/user')
             ->see('You can not do that to yourself.');
    }
}
