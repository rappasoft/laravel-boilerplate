<?php

use App\Models\Access\User\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use App\Events\Frontend\Auth\UserLoggedOut;
use App\Events\Frontend\Auth\UserConfirmed;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class RouteTest
 */
class RouteTest extends TestCase
{
	use DatabaseTransactions;

	/**
	 * User Logged Out Frontend
	 */

	/**
	 * Users logged out
	 * Test the homepage works
	 */
	public function testHomePage()
    {
        $this->visit('/')
             ->assertResponseOk();
    }

	/**
	 * Users logged out
	 * Test the macro page works
	 */
	public function testMacroPage()
	{
		$this->visit('/macros')
			->see('Macro Examples');
	}

	/**
	 * Users logged out
	 * Test the login page works
	 */
	public function testLoginPage()
	{
		$this->visit('/login')
			->see('Login');
	}

	/**
	 * Users logged out
	 * Test the register page works
	 */
	public function testRegisterPage()
	{
		$this->visit('/register')
			->see('Register');
	}

	/**
	 * Users logged out
	 * Test the forgot password page works
	 */
	public function testForgotPasswordPage()
	{
		$this->visit('password/reset')
			->see('Reset Password');
	}

	/**
	 * Users logged out
	 * Test the dashboard page redirects to login
	 */
	public function testDashboardPageLoggedOut() {
		$this->visit('/dashboard')
			->seePageIs('/login');
	}

	/**
	 * Users logged out
	 * Test the account page redirects to login
	 */
	public function testAccountPageLoggedOut() {
		$this->visit('/account')
			->seePageIs('/login');
	}

	/**
	 * Create an unconfirmed user and assure the user gets
	 * confirmed when hitting the confirmation route
	 */
	public function testConfirmAccountRoute() {
		Event::fake();

		// Create default user to test with
		$unconfirmed = factory(User::class)
			->states('unconfirmed')
			->create();
		$unconfirmed->attachRole(3); //User

		$this->visit('/account/confirm/'.$unconfirmed->confirmation_code)
			->seePageIs('/login')
			->see('Your account has been successfully confirmed!')
			->seeInDatabase(config('access.users_table'), ['email' => $unconfirmed->email, 'confirmed'  => 1]);

		Event::assertFired(UserConfirmed::class);
	}

	/**
	 * Assure the user gets resent a confirmation email
	 * after hitting the resend confirmation route
	 */
	public function testResendConfirmAccountRoute() {
		Notification::fake();

		$this->visit('/account/confirm/resend/'.$this->user->id)
			->seePageIs('/login')
			->see('A new confirmation e-mail has been sent to the address on file.');

		Notification::assertSentTo(
			[$this->user], UserNeedsConfirmation::class
		);
	}

	/**
	 * Test the language switcher changes the desired language in the session
	 */
	public function testLanguageSwitcher() {
		$this->visit('lang/es')
			->see('Registrarse')
			->assertSessionHas('locale', 'es');

		App::setLocale('en');
	}

	/**
	 * Test the generic 404 page
	 */
	public function test404Page()
	{
		$this->get('7g48hwbfw9eufj')
			->seeStatusCode(404)
			->see('Page Not Found');
	}

	/**
	 * User Logged In Frontend
	 */

	/**
	 * Users logged in
	 * Test the homepage works and the dashboard button appears
	 */
	public function testHomePageLoggedIn()
	{
		$this->actingAs($this->user)
			->visit('/')
			->see('Dashboard')
			->see($this->user->name)
			->dontSee('Administration');
	}

	/**
	 * Users logged in
	 * Test the dashboard page works and displays the users information
	 */
	public function testDashboardPage() {
		$this->actingAs($this->user)
			->visit('/dashboard')
			->see($this->user->email)
			->see('Joined')
			->dontSee('Administration');
	}

	/**
	 * Users logged in
	 * Test the account page works and displays the users information
	 */
	public function testAccountPage() {
		$this->actingAs($this->user)
			->visit('/account')
			->see('My Account')
			->see('Profile')
			->see('Update Information')
			->see('Change Password')
			->dontSee('Administration');
	}

	/**
	 * Admin logged in
	 * Test the account page works and displays the users information
	 */
	public function testLoggedInAdmin()
	{
		$this->actingAs($this->admin)
			->visit('/')
			->see('Administration')
			->see($this->admin->name);
	}

	/**
	 * Users logged in
	 * Test the logout button redirects the user back to home and the login button is again visible
	 */
	public function testLogoutRoute() {
		// Make sure our events are fired
		Event::fake();

		$this->actingAs($this->user)
			->visit('/logout')
			->see('Login')
			->see('Register');

		Event::assertFired(UserLoggedOut::class);
	}
}