<?php
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Access\User\UserDeleted;
/**
 * Class UserAccessTest.
 */
class UserAccessTest extends TestCase {
	public function testUserCantAccessAdminDashboard() {
		$this->visit( '/' )
		     ->actingAs( $this->user )
		     ->visit( '/admin/dashboard' )
		     ->seePageIs( '/' )
		     ->see( 'You do not have access to do that.' );
	}

	public function testExecutiveCanAccessAdminDashboard() {
		$this->visit( '/' )
		     ->actingAs( $this->executive )
		     ->visit( '/admin/dashboard' )
		     ->seePageIs( '/admin/dashboard' )
		     ->see( $this->executive->name );
	}

	public function testExecutiveCantAccessManageRoles() {
		$this->visit( '/' )
		     ->actingAs( $this->executive )
		     ->visit( '/admin/dashboard' )
		     ->seePageIs( '/admin/dashboard' )
		     ->visit( '/admin/access/role' )
		     ->seePageIs( '/' )
		     ->see( 'You do not have access to do that.' );
	}

	public function testExecutiveCantAccessEditAdminUser() {
		$this->visit( '/' )
		     ->actingAs( $this->executive )
		     ->visit( '/admin/dashboard' )
		     ->seePageIs( '/admin/dashboard' )
		     ->visit( '/admin/access/user/1/edit' )
		     ->seePageIs( '/admin/dashboard' )
		     ->see( 'You do not have access to do that.' );
	}

	public function testExecutiveCantAccessToLoginAsAdministrator() {
		$this->visit( '/' )
		     ->actingAs( $this->executive )
		     ->visit( '/admin/access/user' )
		     ->seePageIs( '/admin/access/user' )
		     ->visit( '/admin/access/user/1/login-as' )
		     ->seePageIs( '/admin/access/user' )
		     ->see( 'You do not have access to do that.' );
	}

	public function testExecutiveCantAccessChangeAdministratorPassword() {
		$this->visit( '/' )
		     ->actingAs( $this->executive )
		     ->visit( '/admin/access/user' )
		     ->seePageIs( '/admin/access/user' )
		     ->visit( '/admin/access/user/1/password/change' )
		     ->seePageIs( '/admin/access/user' )
		     ->see( 'You do not have access to do that.' );
	}

	public function testExecutiveCantAccessChangeAdministratorAccountStatus() {
		$this->visit( '/' )
		     ->actingAs( $this->executive )
		     ->visit( '/admin/access/user' )
		     ->seePageIs( '/admin/access/user' )
		     ->visit( '/admin/access/user/1/mark/0' )
		     ->seePageIs( '/admin/access/user' )
		     ->see( 'You do not have access to do that.' );
	}

}
