<?php

use App\Models\Access\User\User;
use Illuminate\Support\Facades\App;

/**
 * Class TestCase
 */
abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

	/**
	 * @var
	 */
	protected $user;

	/**
	 * @var
	 */
	protected $admin;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

	/**
	 * Set up tests.
	 */
	public function setUp()
	{
		parent::setUp();

		// Run the tests in English
		App::setLocale('en');

		/**
		 * Assumes roles were kept from seed
		 */

		// Create default user to test with
		$this->user = factory(User::class)
			->states('active', 'confirmed')
			->create();
		$this->user->attachRole(3); //User

		// Create user with admin privileges to test with
		$this->admin = factory(User::class)
			->states('active', 'confirmed')
			->create();
		$this->admin->attachRole(1); //Administrator
	}
}