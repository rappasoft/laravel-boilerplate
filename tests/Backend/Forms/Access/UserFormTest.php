<?php

use App\Models\Access\User\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use App\Events\Backend\Access\User\UserCreated;
use App\Events\Backend\Access\User\UserDeleted;
use App\Events\Backend\Access\User\UserUpdated;
use App\Events\Backend\Access\User\UserPasswordChanged;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class UserFormTest.
 */
class UserFormTest extends TestCase
{
    public function testCreateUserRequiredFields()
    {
        $this->actingAs($this->admin)
            ->visit('/admin/access/user/create')
            ->type('', 'name')
            ->type('', 'email')
            ->type('', 'password')
            ->type('', 'password_confirmation')
            ->press('Create')
            ->see('The name field is required.')
            ->see('The email field is required.')
            ->see('The password field is required.');
    }

    public function testCreateUserPasswordsDoNotMatch()
    {
        $this->actingAs($this->admin)
            ->visit('/admin/access/user/create')
            ->type('Test User', 'name')
            ->type('test@test.com', 'email')
            ->type('123456', 'password')
            ->type('1234567', 'password_confirmation')
            ->press('Create')
            ->see('The password confirmation does not match.');
    }

    public function testCreateUserConfirmedForm()
    {
        // Make sure our events are fired
        Event::fake();

        // Create any needed resources
        $faker = Faker\Factory::create();
        $name = $faker->name;
        $email = $faker->safeEmail;
        $password = $faker->password(8);

        $this->actingAs($this->admin)
            ->visit('/admin/access/user/create')
            ->type($name, 'name')
            ->type($email, 'email')
            ->type($password, 'password')
            ->type($password, 'password_confirmation')
            ->seeIsChecked('status')
            ->seeIsChecked('confirmed')
            ->dontSeeIsChecked('confirmation_email')
            ->check('assignees_roles[2]')
            ->check('assignees_roles[3]')
            ->press('Create')
            ->seePageIs('/admin/access/user')
            ->see('The user was successfully created.')
            ->seeInDatabase('users', ['name' => $name, 'email' => $email, 'status' => 1, 'confirmed' => 1])
            ->seeInDatabase('role_user', ['user_id' => 4, 'role_id' => 2])
            ->seeInDatabase('role_user', ['user_id' => 4, 'role_id' => 3]);

        Event::assertFired(UserCreated::class);
    }

    public function testCreateUserUnconfirmedForm()
    {
        // Make sure our events are fired
        Event::fake();

        // Make sure our notifications are sent
        Notification::fake();

        // Create any needed resources
        $faker = Faker\Factory::create();
        $name = $faker->name;
        $email = $faker->safeEmail;
        $password = $faker->password(8);

        $this->actingAs($this->admin)
            ->visit('/admin/access/user/create')
            ->type($name, 'name')
            ->type($email, 'email')
            ->type($password, 'password')
            ->type($password, 'password_confirmation')
            ->seeIsChecked('status')
            ->uncheck('confirmed')
            ->check('confirmation_email')
            ->check('assignees_roles[2]')
            ->check('assignees_roles[3]')
            ->press('Create')
            ->seePageIs('/admin/access/user')
            ->see('The user was successfully created.')
            ->seeInDatabase('users', ['name' => $name, 'email' => $email, 'status' => 1, 'confirmed' => 0])
            ->seeInDatabase('role_user', ['user_id' => 4, 'role_id' => 2])
            ->seeInDatabase('role_user', ['user_id' => 4, 'role_id' => 3]);

        // Get the user that was inserted into the database
        $user = User::where('email', $email)->first();

        // Check that the user was sent the confirmation email
        Notification::assertSentTo(
            [$user], UserNeedsConfirmation::class
        );

        Event::assertFired(UserCreated::class);
    }

    public function testCreateUserFailsIfEmailExists()
    {
        $this->actingAs($this->admin)
            ->visit('/admin/access/user/create')
            ->type('User', 'name')
            ->type('user@user.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press('Create')
            ->seePageIs('/admin/access/user/create')
            ->see('The email has already been taken.');
    }

    public function testUpdateUserRequiredFields()
    {
        $this->actingAs($this->admin)
            ->visit('/admin/access/user/3/edit')
            ->type('', 'name')
            ->type('', 'email')
            ->press('Update')
            ->see('The name field is required.')
            ->see('The email field is required.');
    }

    public function testUpdateUserForm()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
            ->visit('/admin/access/user/'.$this->user->id.'/edit')
            ->see($this->user->name)
            ->see($this->user->email)
            ->type('User New', 'name')
            ->type('user2@user.com', 'email')
            ->uncheck('status')
            ->uncheck('confirmed')
            ->check('assignees_roles[2]')
            ->uncheck('assignees_roles[3]')
            ->press('Update')
            ->seePageIs('/admin/access/user')
            ->see('The user was successfully updated.')
            ->seeInDatabase('users', ['id' => $this->user->id, 'name' => 'User New', 'email' => 'user2@user.com', 'status' => 0, 'confirmed' => 0])
            ->seeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => 2])
            ->notSeeInDatabase('role_user', ['user_id' => $this->user->id, 'role_id' => 3]);

        Event::assertFired(UserUpdated::class);
    }

    public function testDeleteUserForm()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
            ->delete('/admin/access/user/'.$this->user->id)
            ->assertRedirectedTo('/admin/access/user/deleted')
            ->notSeeInDatabase('users', ['id' => $this->user->id, 'deleted_at' => null]);

        Event::assertFired(UserDeleted::class);
    }

    public function testUserCanNotDeleteSelf()
    {
        $this->actingAs($this->admin)
            ->visit('/admin/access/user')
            ->delete('/admin/access/user/'.$this->admin->id)
            ->assertRedirectedTo('/admin/access/user')
            ->seeInDatabase('users', ['id' => $this->admin->id, 'deleted_at' => null])
            ->seeInSession(['flash_danger' => 'You can not delete yourself.']);
    }

    public function testChangeUserPasswordRequiredFields()
    {
        $this->actingAs($this->admin)
            ->visit('/admin/access/user/'.$this->user->id.'/password/change')
            ->see('Change Password for '.$this->user->name)
            ->type('', 'password')
            ->type('', 'password_confirmation')
            ->press('Update')
            ->seePageIs('/admin/access/user/'.$this->user->id.'/password/change')
            ->see('The password field is required.');
    }

    public function testChangeUserPasswordForm()
    {
        // Make sure our events are fired
        Event::fake();

        $password = '87654321';

        $this->actingAs($this->admin)
            ->visit('/admin/access/user/'.$this->user->id.'/password/change')
            ->see('Change Password for '.$this->user->name)
            ->type($password, 'password')
            ->type($password, 'password_confirmation')
            ->press('Update')
            ->seePageIs('/admin/access/user')
            ->see('The user\'s password was successfully updated.');

        Event::assertFired(UserPasswordChanged::class);
    }

    public function testChangeUserPasswordDoNotMatch()
    {
        $this->actingAs($this->admin)
            ->visit('/admin/access/user/'.$this->user->id.'/password/change')
            ->see('Change Password for '.$this->user->name)
            ->type('123456', 'password')
            ->type('1234567', 'password_confirmation')
            ->press('Update')
            ->seePageIs('/admin/access/user/'.$this->user->id.'/password/change')
            ->see('The password confirmation does not match.');
    }
}
