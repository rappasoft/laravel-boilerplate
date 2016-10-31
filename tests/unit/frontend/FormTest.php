<?php

use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class FormTest
 */
class FormTest extends TestCase
{
	use DatabaseTransactions;

	public function testRegistrationForm() {
		$faker = Faker\Factory::create();
		$password = $faker->password(8);

		// Check if confirmation required is on or off
		if (config('access.users.confirm_email') === true) {
			$this->visit('/register')
				->type($faker->name, 'name')
				->type($faker->safeEmail, 'email')
				->type($password, 'password')
				->type($password, 'password_confirmation')
				->press('Register')
				->see('Your account was successfully created. We have sent you an e-mail to confirm your account.')
				->see('Login')
				->seePageIs('/');
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