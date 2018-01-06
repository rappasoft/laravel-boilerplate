<?php

namespace Tests\Frontend\Forms;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class LoggedInFormTest.
 */
class LoggedInFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_email_is_required_if_change_email_is_true()
    {
        $this->setUpAcl();
        config(['access.users.change_email' => true]);

        $response = $this->actingAs($this->user)
            ->patch('/profile/update', [
                'first_name' => '',
                'last_name' => '',
                'email' => '',
            ]);

        $response->assertSessionHasErrors(['first_name', 'last_name', 'email']);
    }

    /** @test */
    public function the_email_is_not_required_if_change_email_is_false()
    {
        $this->setUpAcl();
        config(['access.users.change_email' => false]);

        $response = $this->actingAs($this->user)
            ->patch('/profile/update', [
                'first_name' => '',
                'last_name' => '',
            ]);

        $response->assertSessionHasErrors(['first_name', 'last_name']);
    }

    /** @test */
    public function the_email_needs_not_to_be_confirmed_if_confirm_email_is_false()
    {
        $this->setUpAcl();

        config(['access.users.change_email' => true]);
        config(['access.users.confirm_email' => false]);

        $this->actingAs($this->user)
            ->patch('/profile/update', [
                'first_name' => 'Edward',
                'last_name' => 'Snowden',
                'email' => 'edward@snowden.com',
                'timezone' => 'UTC',
                'avatar_type' => 'gravatar',
            ]);

        $updatedUser = User::find($this->user->id);

        $this->assertEquals('Edward', $updatedUser->first_name);
        $this->assertEquals('Snowden', $updatedUser->last_name);
        $this->assertEquals('edward@snowden.com', $updatedUser->email);
        $this->assertEquals(1, $updatedUser->confirmed);
    }

    /** @test */
    public function the_email_needs_to_be_confirmed_if_confirm_email_is_true()
    {
        $this->setUpAcl();

        config(['access.users.change_email' => true]);
        config(['access.users.confirm_email' => true]);

        $this->actingAs($this->user)
            ->patch('/profile/update', [
                'first_name' => 'Edward',
                'last_name' => 'Snowden',
                'email' => 'edward@snowden.com',
                'timezone' => 'UTC',
                'avatar_type' => 'gravatar',
            ]);

        $updatedUser = User::find($this->user->id);

        $this->assertEquals($updatedUser->first_name, 'Edward');
        $this->assertEquals($updatedUser->last_name, 'Snowden');
        $this->assertEquals($updatedUser->email, 'edward@snowden.com');
        $this->assertEquals($updatedUser->confirmed, 0);
    }

    /** @test */
    public function the_password_is_required_in_the_password_change_form()
    {
        $this->setUpAcl();

        $response = $this->actingAs($this->user)
            ->patch('/password/update', [
                'old_password' => '',
                'password' => '',
                'password_confirmation' => '',
            ]);
        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function the_password_can_be_changed()
    {
        $this->setUpAcl();

        $this->actingAs($this->user)->followingRedirects()
            ->patch('/password/update', [
                'old_password' => '1234',
                'password' => '12345678',
                'password_confirmation' => '12345678',
            ])->assertSeeText('Password successfully updated.');

        $this->assertTrue(Hash::check('12345678', $this->user->fresh()->password));
    }
}
