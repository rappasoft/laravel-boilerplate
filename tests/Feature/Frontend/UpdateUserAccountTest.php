<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

class UpdateUserAccountTest extends TestCase
{
    use RefreshDatabase;

    /**
     * helper method for valid user data with option to override.
     * @param array $userData
     * @return array
     */
    protected function getValidUserData($userData = [])
    {
        return array_merge([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'timezone' => 'UTC',
            'avatar_type' => 'gravatar',
        ], $userData);
    }

    /** @test */
    public function only_authenticated_users_can_access_their_account()
    {
        $this->get('/account')->assertRedirect('/login');
    }

    /** @test */
    public function a_user_can_update_his_profile()
    {
        $user = factory(User::class)->create();
        config(['access.users.change_email' => true]);

        $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
                'timezone' => 'UTC',
                'avatar_type' => 'gravatar',
            ]));
        $user = $user->fresh();

        $this->assertEquals($user->first_name, 'John');
        $this->assertEquals($user->last_name, 'Doe');
        $this->assertEquals($user->email, 'john@example.com');
        $this->assertEquals($user->timezone, 'UTC');
        $this->assertEquals($user->avatar_type, 'gravatar');
    }

    /** @test */
    public function the_email_is_required()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData(['email' => '']));

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function the_first_name_is_required()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData(['first_name' => '']));

        $response->assertSessionHasErrors(['first_name']);
    }

    /** @test */
    public function the_last_name_is_required()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData(['last_name' => '']));

        $response->assertSessionHasErrors(['last_name']);
    }

    /** @test */
    public function the_timezone_is_required()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData(['timezone' => '']));

        $response->assertSessionHasErrors(['timezone']);
    }

    /** @test */
    public function the_avatar_type_is_required()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData(['avatar_type' => '']));

        $response->assertSessionHasErrors(['avatar_type']);
    }

    /** @test */
    public function a_user_can_upload_his_own_avatar()
    {
        $user = factory(User::class)->create();
        Storage::fake('public');

        $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData([
                'avatar_type' => 'storage',
                'avatar_location' => UploadedFile::fake()->image('avatar.jpg'),
            ]));

        Storage::disk('public')->assertExists("{$user->fresh()->avatar_location}");
    }

    /** @test */
    public function the_email_needs_to_be_confirmed_if_confirm_email_is_true()
    {
        $user = factory(User::class)->create();
        config(['access.users.confirm_email' => true]);
        config(['access.users.change_email' => true]);
        Notification::fake();

        $this->assertEquals($user->confirmed, 1);

        $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData());

        $this->assertEquals($user->fresh()->confirmed, 0);
        Notification::assertSentTo($user, UserNeedsConfirmation::class);
    }

    /** @test */
    public function the_email_needs_not_to_be_confirmed_if_confirm_email_is_false()
    {
        $user = factory(User::class)->create();
        config(['access.users.confirm_email' => false]);

        $this->assertEquals($user->confirmed, 1);

        $this->actingAs($user)
            ->patch('/profile/update', $this->getValidUserData());

        $this->assertEquals($user->fresh()->confirmed, 1);
    }
}
