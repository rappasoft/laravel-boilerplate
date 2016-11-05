<?php

use App\Models\Access\User\User;
use App\Models\Access\Role\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
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

		// Set up the database
		Artisan::call('migrate:refresh');
		Artisan::call('db:seed');

		// Run the tests in English
		App::setLocale('en');

		/**
		 * Create class properties to be used in tests
		 */
		$this->admin = User::find(1);
		$this->user = User::find(3);
		$this->adminRole = Role::find(1);
		$this->userRole = Role::find(3);
	}
}