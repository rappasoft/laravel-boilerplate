<?php

use App\Models\Access\User\User;
use App\Models\Access\Role\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class TestCase
 */
abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
	use DatabaseTransactions;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://l5boilerplate.dev';

	/**
	 * @var
	 */
	protected $user;

	/**
	 * @var
	 */
	protected $admin;

	/**
	 * @var
	 */
	protected $userRole;

	/**
	 * @var
	 */
	protected $adminRole;

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
		 * Create two temporary roles
		 */
		$this->adminRole = factory(Role::class)
			->states('admin')
			->create(['name' => 'Test Admin']);
		$this->userRole = factory(Role::class)
			->create(['name' => 'Test User']);

		// Create default user to test with
		$this->user = factory(User::class)
			->states('active', 'confirmed')
			->create();
		$this->user->attachRole($this->userRole->id); //User

		// Create user with admin privileges to test with
		$this->admin = factory(User::class)
			->states('active', 'confirmed')
			->create();
		$this->admin->attachRole($this->adminRole->id); //Administrator
	}
}