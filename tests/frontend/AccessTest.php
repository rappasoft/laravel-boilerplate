<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class AccessTest
 */
class AccessTest extends TestCase {

	use DatabaseTransactions;

	/**
	 *
	 */
	public function test_user_can_see_auth_register(){
		$this->visit( '/auth/register' )->see('Register');
	}

	/**
	 *
	 */
	public function test_user_can_see_auth_login(){
		$this->visit( '/auth/login' )->see('Login');
	}

	/**
	 *
	 */
	public function test_redirect_to_login_if_i_try_to_view_dashboard_without_logging_in() {
		$this->visit( '/dashboard' )
			->seePageIs( '/auth/login' )
			->see( 'Login' );
	}

	/**
	 * TODO: Fix errors on swiftmailer
	 */
	/*public function test_can_create_an_account() {
		$this->visit( '/auth/register' )
			->type( 'Admin Istrator', 'name' )
			->type( 'test@test.com', 'email' )
			->type( '123456', 'password' )
			->type( '123456', 'password_confirmation' )
			->press( 'Register' )
			->seeInDatabase( 'users', [ 'email' => 'test@test.com' ] );
	}*/

	/**
	 *
	 */
	public function test_user_can_login_without_remember_me(){
		$this->visit( '/auth/login' )
			->type( 'user@user.com', 'email' )
			->type( '1234', 'password' )
			->press( 'Login' )
			->seePageIs( '/dashboard' )
			->see('Dashboard');
	}

	/**
	 *
	 */
	public function test_user_can_login_with_remember_me(){
		$this->visit( '/auth/login' )
			->type( 'user@user.com', 'email' )
			->type( '1234', 'password' )
			->check('remember')
			->press( 'Login' )
			->seePageIs( '/dashboard' )
			//missing to check weather remember-me session/cookie exist
			->see('Dashboard');
	}
}