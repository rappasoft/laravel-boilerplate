<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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