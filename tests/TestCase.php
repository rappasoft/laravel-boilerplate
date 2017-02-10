<?php

namespace Tests;

use App\Models\Access\Role\Role;
use App\Models\Access\User\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use DatabaseTransactions;
	  use CreatesApplication;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://l5boilerplate.dev';

    /**
     * @var
     */
    protected $admin;

    /**
     * @var
     */
    protected $executive;

    /**
     * @var
     */
    protected $user;

    /**
     * @var
     */
    protected $adminRole;

    /**
     * @var
     */
    protected $executiveRole;

    /**
     * @var
     */
    protected $userRole;

	/**
	 * @var bool
	 */
	public static $setupDatabase = true;

    /**
     * Set up tests.
     */
    public function setUp()
    {
        parent::setUp();

        // Run the tests in English
        App::setLocale('en');

        if (self::$setupDatabase) {
            $this->setupDatabase();
        }

        /*
         * Create class properties to be used in tests
         */
        $this->admin = User::find(1);
        $this->executive = User::find(2);
        $this->user = User::find(3);
        $this->adminRole = Role::find(1);
        $this->executiveRole = Role::find(2);
        $this->userRole = Role::find(3);
    }

	/**
	 * Set up the database if need be
	 */
	public function setupDatabase()
    {
        // Set up the database
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');

        self::$setupDatabase = false;
    }
}
