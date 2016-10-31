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
	 * Test the registration form
	 * Test it works with confirming email on or off, and that the confirm email notification is sent
	 */
	public function testRegistrationForm() {
		// Note: Captcha is disabled by default in phpunit.xml

		// Create any needed resources
		$faker = Faker\Factory::create();
		$password = $faker->password(8);

		// Check if confirmation required is on or off
		if (config('access.users.confirm_email')) {
			Notification::fake();

			$this->visit('/register')
				->type($faker->name, 'name')
				->type($faker->safeEmail, 'email')
				->type($password, 'password')
				->type($password, 'password_confirmation')
				->press('Register')
				->see('Your account was successfully created. We have sent you an e-mail to confirm your account.')
				->see('Login')
				->seePageIs('/');

			// Get the last user inserted into the database
			$user = User::orderBy('created_at', 'desc')->first();

			// Check that the user was sent the confirmation email
			Notification::assertSentTo(
				[$user], UserNeedsConfirmation::class
			);
		} else {
			$this->visit('/register')
				->type($faker->name, 'name')
				->type($faker->safeEmail, 'email')
				->type($password, 'password')
				->type($password, 'password_confirmation')
				->press('Register')
				->see('Dashboard')
				->seePageIs('/');
		}
	}
}