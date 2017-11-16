<?php

use App\Models\Auth\User;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use App\Events\Backend\Auth\User\UserCreated;
use App\Events\Backend\Auth\User\UserUpdated;
use App\Events\Backend\Auth\User\UserPasswordChanged;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class UserFormTest.
 */
class UserFormTest extends BrowserKitTestCase
{
    public function testCreateUserRequiredFields()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/create')
             ->type('', 'first_name')
             ->type('', 'last_name')
             ->type('', 'email')
             ->type('', 'password')
             ->type('', 'password_confirmation')
             ->press('Create')
             ->see('The first name field is required.')
             ->see('The last name field is required.')
             ->see('The email field is required.')
             ->see('The password field is required.');
    }

    public function testCreateUserPasswordsDoNotMatch()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/create')
             ->type('Test', 'first_name')
             ->type('User', 'last_name')
             ->type('test@test.com', 'email')
             ->type('123456', 'password')
             ->type('1234567', 'password_confirmation')
             ->press('Create')
             ->see('The password confirmation does not match.');
    }

    public function testCreateUserConfirmedForm()
    {
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        config(['access.users.confirm_email' => true]);

        // Create any needed resources
        $faker = Faker\Factory::create();
        $firstName = $faker->firstName;
        $lastName = $faker->lastName;
        $email = $faker->safeEmail;
        $password = $faker->password(8);

        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/create')
             ->submitForm('Create', [
                 'first_name' => $firstName,
                 'last_name' => $lastName,
                 'email' => $email,
                 'password' => $password,
                 'password_confirmation' => $password,
                 'active' => '1',
                 'confirmed' => '1',
                 'confirmation_email' => '1',
                 'roles' => [1 => 'executive', 2 => 'user'],
             ])
             ->seePageIs('/admin/auth/user')
             ->see('The user was successfully created.')
             ->seeInDatabase(config('access.table_names.users'),
                 [
                     'first_name' => $firstName,
                     'last_name' => $lastName,
                     'email' => $email,
                     'active' => 1,
                     'confirmed' => 1,
                 ])
             ->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => 4, 'role_id' => 2])
             ->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => 4, 'role_id' => 3]);

        Event::assertDispatched(UserCreated::class);
    }

    public function testCreateUserUnconfirmedForm()
    {
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        // Make sure our notifications are sent
        Notification::fake();

        // Create any needed resources
        $faker = Faker\Factory::create();
        $firstName = $faker->firstName;
        $lastName = $faker->lastName;
        $email = $faker->safeEmail;
        $password = $faker->password(8);

        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/create')
             ->submitForm('Create', [
                 'first_name' => $firstName,
                 'last_name' => $lastName,
                 'email' => $email,
                 'password' => $password,
                 'password_confirmation' => $password,
                 'confirmed' => false,
                 'active' => '1',
                 'confirmation_email' => '1',
                 'roles' => [1 => 'executive', 2 => 'user'],
             ])
             ->seePageIs('/admin/auth/user')
             ->see('The user was successfully created.')
             ->seeInDatabase(config('access.table_names.users'),
                 [
                     'first_name' => $firstName,
                     'last_name' => $lastName,
                     'email' => $email,
                     'active' => 1,
                     'confirmed' => 0,
                 ])
             ->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => 4, 'role_id' => 2])
             ->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => 4, 'role_id' => 3]);

        // Get the user that was inserted into the database
        $user = User::where('email', $email)->first();

        // Check that the user was sent the confirmation email
        Notification::assertSentTo([$user], UserNeedsConfirmation::class);

        Event::assertDispatched(UserCreated::class);
    }

    public function testCreateUserFailsIfEmailExists()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/create')
             ->type('User', 'first_name')
             ->type('Surname', 'last_name')
             ->type('user@user.com', 'email')
             ->type('123456', 'password')
             ->type('123456', 'password_confirmation')
             ->press('Create')
             ->seePageIs('/admin/auth/user/create')
             ->see('The email has already been taken.');
    }

    public function testUpdateUserRequiredFields()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/3/edit')
             ->type('', 'first_name')
             ->type('', 'last_name')
             ->type('', 'email')
             ->press('Update')
             ->see('The first name field is required.')
             ->see('The last name field is required.')
             ->see('The email field is required.');
    }

    public function testUpdateUserForm()
    {
        // Make sure our events are fired
        Event::fake();

        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/'.$this->user->id.'/edit')
             ->see($this->user->first_name)
             ->see($this->user->last_name)
             ->see($this->user->email)
            ->submitForm('Update', [
                'first_name'  => 'User',
                'last_name'  => 'New',
                'email' => 'user2@user.com',
                'roles' => ['administrator', 'executive', 'user'],
            ])
             ->seePageIs('/admin/auth/user')
             ->see('The user was successfully updated.')
             ->seeInDatabase(config('access.table_names.users'),
                 [
                     'id' => $this->user->id,
                     'first_name'  => 'User',
                     'last_name'  => 'New',
                     'email' => 'user2@user.com',
                 ])
             ->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => 1])
             ->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => 2])
             ->seeInDatabase(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => 3]);

        Event::assertDispatched(UserUpdated::class);
    }

    public function testDeleteUserForm()
    {
        $this->actingAs($this->admin)
             ->delete('/admin/auth/user/'.$this->user->id)
             ->assertRedirectedTo('/admin/auth/user/deleted')
             ->notSeeInDatabase(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => null]);
    }

    public function testChangeUserPasswordForm()
    {
        // Make sure our events are fired
        Event::fake();

        $password = '87654321';

        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/'.$this->user->id.'/password/change')
             ->see('Change Password for '.$this->user->name)
             ->type($password, 'password')
             ->type($password, 'password_confirmation')
             ->press('Update')
             ->seePageIs('/admin/auth/user')
             ->see('The user\'s password was successfully updated.');

        Event::assertDispatched(UserPasswordChanged::class);
    }

    public function testChangeUserPasswordDoNotMatch()
    {
        $this->actingAs($this->admin)
             ->visit('/admin/auth/user/'.$this->user->id.'/password/change')
             ->see('Change Password for '.$this->user->name)
             ->type('123456', 'password')
             ->type('1234567', 'password_confirmation')
             ->press('Update')
             ->seePageIs('/admin/auth/user/'.$this->user->id.'/password/change')
             ->see('The password confirmation does not match.');
    }
}
