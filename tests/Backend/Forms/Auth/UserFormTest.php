<?php

namespace Tests\Backend\Forms\Auth;

use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use App\Events\Backend\Auth\User\UserCreated;
use App\Events\Backend\Auth\User\UserUpdated;
use App\Events\Backend\Auth\User\UserPasswordChanged;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use Tests\TestCase;

/**
 * Class UserFormTest.
 */
class UserFormTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->setUpAcl();
    }

    /** @test */
    public function create_user_has_required_fields()
    {
        $response = $this->actingAs($this->admin)
            ->post('/admin/auth/user', [
                'first_name' => '',
                'last_name' => '',
                'email' => '',
                'password' => '',
            ]);

        $response->assertSessionHasErrors(['first_name', 'last_name', 'email', 'password']);
    }

    /** @test */
    public function admin_can_create_new_user()
    {
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $response = $this->actingAs($this->admin)
            ->post('/admin/auth/user', [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'active' => '1',
                'confirmed' => '1',
                'timezone' => 'UTC',
                'confirmation_email' => '1',
                'roles' => [1 => 'executive', 2 => 'user'],
            ]);

        $response->assertSessionHas(['flash_success' => 'The user was successfully created.']);

        $this->assertDatabaseHas(config('access.table_names.users'),
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
                'active' => 1,
                'confirmed' => 1,
            ]);
        $this->assertDatabaseHas(config('permission.table_names.model_has_roles'), ['model_id' => 4, 'role_id' => 2]);
        $this->assertDatabaseHas(config('permission.table_names.model_has_roles'), ['model_id' => 4, 'role_id' => 3]);

        Event::assertDispatched(UserCreated::class);
    }

    /** @test */
    public function when_an_unconfirmed_user_is_created_a_notification_will_be_sent()
    {
        $this->withoutExceptionHandling();
        // Make sure our notifications are sent
        Notification::fake();

        $response = $this->actingAs($this->admin)
            ->post('/admin/auth/user', [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'active' => '1',
                'confirmed' => '0',
                'timezone' => 'UTC',
                'confirmation_email' => '1',
                'roles' => [1 => 'executive', 2 => 'user'],
            ]);

        $response->assertSessionHas(['flash_success' => 'The user was successfully created.']);

        $user = User::where('email', 'john@example.com')->first();
        Notification::assertSentTo($user, UserNeedsConfirmation::class);
    }

    /** @test */
    public function user_email_needs_to_be_unique()
    {
        $response = $this->actingAs($this->admin)
            ->post('/admin/auth/user', [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'user@user.com', //a user with this email is created by the ACL seed.
                'password' => 'password',
                'password_confirmation' => 'password',
                'active' => '1',
                'confirmed' => '0',
                'timezone' => 'UTC',
                'confirmation_email' => '1',
                'roles' => [1 => 'executive', 2 => 'user'],
            ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function a_user_has_required_fields()
    {
        $response = $this->actingAs($this->admin)
            ->post('/admin/auth/user', []);

        $response->assertSessionHasErrors(['first_name', 'last_name', 'email', 'timezone', 'password', 'roles']);
    }

    /** @test */
    public function a_user_can_be_updated()
    {
        Event::fake();

        $response = $this->actingAs($this->admin)->patch('/admin/auth/user/' . $this->user->id, [
            'first_name' => 'User',
            'last_name' => 'New',
            'email' => 'user2@user.com',
            'timezone' => 'UTC',
            'roles' => ['administrator', 'executive', 'user'],
        ]);

        $response->assertSessionHas(['flash_success' => 'The user was successfully updated.']);
        $this->assertDatabaseHas(config('access.table_names.users'),
            [
                'id' => $this->user->id,
                'first_name' => 'User',
                'last_name' => 'New',
                'email' => 'user2@user.com',
            ]);
        $this->assertDatabaseHas(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => 1]);
        $this->assertDatabaseHas(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => 2]);
        $this->assertDatabaseHas(config('permission.table_names.model_has_roles'), ['model_id' => $this->user->id, 'role_id' => 3]);

        Event::assertDispatched(UserUpdated::class);
    }

    /** @test */
    public function a_user_can_be_deleted()
    {
        $response = $this->actingAs($this->admin)
            ->delete('/admin/auth/user/' . $this->user->id);

        $response->assertSessionHas(['flash_success' => 'The user was successfully deleted.']);
        $this->assertDatabaseMissing(config('access.table_names.users'), ['id' => $this->user->id, 'deleted_at' => null]);
    }

    /** @test */
    public function the_user_password_can_be_changed()
    {
        Event::fake();

        $response = $this->actingAs($this->admin)
            ->patch('/admin/auth/user/' . $this->user->id . '/password/change',[
                'password' => '12345678',
                'password_confirmation' => '12345678',
            ]);
        $response->assertSessionHas(['flash_success' => 'The user\'s password was successfully updated.']);

        Event::assertDispatched(UserPasswordChanged::class);
    }

    /** @test */
    public function the_passwords_must_match()
    {
        $response = $this->actingAs($this->admin)
            ->patch('/admin/auth/user/' . $this->user->id . '/password/change',[
                'password' => '1234567',
                'password_confirmation' => '12345678',
            ]);

        $response->assertSessionHasErrors('password');
    }
}
