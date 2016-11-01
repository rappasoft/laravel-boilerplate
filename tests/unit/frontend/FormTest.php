<?php

use Faker\Factory;
use App\Models\Access\User\User;
use Illuminate\Support\Facades\Event;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserRegistered;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class FormTest
 */
class FormTest extends TestCase
{
	use DatabaseTransactions;

	/**
	 * Test that the errors work if nothing is filled in the registration form
	 */
	public function testRegistrationRequiredFields() {
		$this->visit('/register')
			->type('', 'name')
			->type('', 'email')
			->type('', 'password')
			->press('Register')
			->seePageIs('/register')
			->see('The name field is required.')
			->see('The email field is required.')
			->see('The password field is required.');
	}

	/**
	 * Test the registration form
	 * Test it works with confirming email on or off, and that the confirm email notification is sent
	 * Note: Captcha is disabled by default in phpunit.xml
	 */
	public function testRegistrationForm() {
		// Make sure our events are fired
		Event::fake();

		// Create any needed resources
		$faker = Faker\Factory::create();
		$name = $faker->name;
		$email = $faker->safeEmail;
		$password = $faker->password(8);

		// Check if confirmation required is on or off
		if (config('access.users.confirm_email')) {
			Notification::fake();

			$this->visit('/register')
				->type($name, 'name')
				->type($email, 'email')
				->type($password, 'password')
				->type($password, 'password_confirmation')
				->press('Register')
				->see('Your account was successfully created. We have sent you an e-mail to confirm your account.')
				->see('Login')
				->seePageIs('/')
				->seeInDatabase(config('access.users_table'), ['email' => $email, 'name'  => $name]);

			// Get the user that was inserted into the database
			$user = User::where('email', $email)->first();

			// Check that the user was sent the confirmation email
			Notification::assertSentTo(
				[$user], UserNeedsConfirmation::class
			);
		} else {
			$this->visit('/register')
				->type($name, 'name')
				->type($email, 'email')
				->type($password, 'password')
				->type($password, 'password_confirmation')
				->press('Register')
				->see('Dashboard')
				->seePageIs('/')
				->seeInDatabase(config('access.users_table'), ['email' => $email, 'name'  => $name]);
		}

		Event::assertFired(UserRegistered::class);
	}

	/**
	 * Test that the errors work if nothing is filled in the login form
	 */
	public function testLoginRequiredFields() {
		$this->visit('/login')
			->type('', 'email')
			->type('', 'password')
			->press('Login')
			->seePageIs('/login')
			->see('The email field is required.')
			->see('The password field is required.');
	}

	/**
	 * Test that the user is logged in and redirected to the dashboard
	 * Test that the admin is logged in and redirected to the backend
	 */
	public function testLoginForm() {
		// Make sure our events are fired
		Event::fake();

		Auth::logout();

		//User Test
		$this->visit('/login')
			->type($this->user->email, 'email')
			->type('secret', 'password')
			->press('Login')
			->seePageIs('/dashboard')
			->see($this->user->email);

		Auth::logout();

		//Admin Test
		$this->visit('/login')
			->type($this->admin->email, 'email')
			->type('secret', 'password')
			->press('Login')
			->seePageIs('/admin/dashboard')
			->see($this->admin->name)
			->see('Access Management');

		Event::assertFired(UserLoggedIn::class);
	}

	/**
	 * Test that the errors work if nothing is filled in the update account form
	 */
	public function testUpdateProfileRequiredFields() {
		if (config('access.users.change_email')) {
			$this->actingAs($this->user)
				->visit('/account')
				->type('', 'name')
				->type('', 'email')
				->press('update-profile')
				->seePageIs('/account')
				->see('The name field is required.')
				->see('The email field is required.');
		} else {
			$this->actingAs($this->user)
				->visit('/account')
				->type('', 'name')
				->press('update-profile')
				->seePageIs('/account')
				->see('The name field is required.');
		}
	}

	/**
	 * Test that we can target the update profile form and update the profile
	 * Based on whether the user is allowed to alter their email address or not
	 */
	public function testUpdateProfileForm() {
		$rand = rand();

		if (config('access.users.change_email')) {
			$this->actingAs($this->user)
				->visit('/account')
				->see('My Account')
				->type($this->user->name.'_'.$rand, 'name')
				->type('2_'.$this->user->email, 'email')
				->press('update-profile')
				->seePageIs('/account')
				->see('Profile successfully updated.')
				->seeInDatabase(config('access.users_table'), ['email' => '2_'.$this->user->email, 'name'  => $this->user->name.'_'.$rand]);
		} else {
			$this->actingAs($this->user)
				->visit('/account')
				->see('My Account')
				->type($this->user->name.'_'.$rand, 'name')
				->press('update-profile')
				->seePageIs('/account')
				->see('Profile successfully updated.')
				->seeInDatabase(config('access.users_table'), ['name'  => $this->user->name.'_'.$rand]);
		}
	}

	/**
	 * Test that the errors work if nothing is filled in the change password form
	 */
	public function testChangePasswordRequiredFields() {
		$this->actingAs($this->user)
			->visit('/account')
			->type('', 'old_password')
			->type('', 'password')
			->type('', 'password_confirmation')
			->press('change-password')
			->seePageIs('/account')
			->see('The old password field is required.')
			->see('The password field is required.');
	}

	/**
	 * Test that the frontend change password form works
	 */
	public function testChangePasswordForm() {
		$password = '87654321';

		$this->actingAs($this->user)
			->visit('/account')
			->see('My Account')
			->type('secret', 'old_password')
			->type($password, 'password')
			->type($password, 'password_confirmation')
			->press('change-password')
			->seePageIs('/account')
			->see('Password successfully updated.');
	}
}