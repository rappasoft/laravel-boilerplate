<?php

use Faker\Factory;
use App\Models\Access\User\User;
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
	 */
	public function testRegistrationForm() {
		// Note: Captcha is disabled by default in phpunit.xml

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
	 */
	public function testLoginForm() {
		$user = factory(User::class)
			->states('active', 'confirmed')
			->create();

		// No roles are attached when using factory
		$user->attachRole(3); // Give User role

		$this->visit('/login')
			->type($user->email, 'email')
			->type($user->password, 'password')
			->press('Login')
			->seePageIs('/dashboard')
			->see($user->email);
	}
}