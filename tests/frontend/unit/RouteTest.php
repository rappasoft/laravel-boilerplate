<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class Test
 */
class RouteTest extends TestCase
{

	public function testHomePage()
    {
        $this->visit('/')
             ->assertResponseOk();
    }

	public function testMacroPage()
	{
		$this->visit('/macros')
			->see('Macro Examples');
	}

	public function testLoginPage()
	{
		$this->visit('/login')
			->see('Login');
	}

	public function testRegisterPage()
	{
		$this->visit('/register')
			->see('Register');
	}

	public function testForgotPasswordPage()
	{
		$this->visit('password/reset')
			->see('Reset Password');
	}
}