<?php

use App\Models\Access\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class RouteTest
 */
class RouteTest extends TestCase
{
	use DatabaseTransactions;

	/**
	 * @var
	 */
	protected $user;

	/**
	 * Set up tests.
	 */
	public function setUp() {
		parent::setUp();

		// Create logged in user to test with
		$this->user = factory(User::class)->create(['confirmation_code' => md5(uniqid(mt_rand(), true))]);
	}

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
			->see('Login');
	}

	/**
	 * Users logged out
	 * Test the account page redirects to login
	 */
	public function testAccountPageLoggedOut() {
		$this->visit('/account')
			->see('Login');
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
			->see($this->user->name);
	}

	/**
	 * Users logged in
	 * Test the dashboard page works and displays the users information
	 */
	public function testDashboardPage() {
		$this->actingAs($this->user)
			->visit('/dashboard')
			->see($this->user->email)
			->see('Joined');
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
			->see('Change Password');
	}

	/**
	 * Users logged in
	 * Test the logout button redirects the user back to home and the login button is again visible
	 */
	public function testLogoutRoute() {
		$this->actingAs($this->user)
			->visit('/logout')
			->see('Login')
			->see('Register');
	}
}