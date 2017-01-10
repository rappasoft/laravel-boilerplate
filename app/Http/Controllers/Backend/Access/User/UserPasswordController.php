<?php

namespace App\Http\Controllers\Backend\Access\User;

use App\Exceptions\GeneralException;
use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Access\User\UserRepository;
use App\Http\Requests\Backend\Access\User\ManageUserRequest;
use App\Http\Requests\Backend\Access\User\UpdateUserPasswordRequest;

/**
 * Class UserPasswordController.
 */
class UserPasswordController extends Controller {
	/**
	 * @var UserRepository
	 */
	protected $users;

	/**
	 * @param UserRepository $users
	 */
	public function __construct( UserRepository $users ) {
		$this->users = $users;
	}

	/**
	 * @param User $user
	 * @param ManageUserRequest $request
	 *
	 * @return mixed
	 * * @throws GeneralException
	 */
	public function edit( User $user, ManageUserRequest $request ) {

		if ( $user->hasRole( 'Administrator' ) && ! access()->hasRole( 'Administrator' ) ) {
			throw new GeneralException( 'You do not have access to do that.' );
		}

		return view( 'backend.access.change-password' )
			->withUser( $user );
	}

	/**
	 * @param User $user
	 * @param UpdateUserPasswordRequest $request
	 *
	 * @return mixed
	 * * @throws GeneralException
	 */
	public function update( User $user, UpdateUserPasswordRequest $request ) {

		if ( $user->hasRole( 'Administrator' ) && ! access()->hasRole( 'Administrator' ) ) {
			throw new GeneralException( 'You do not have access to do that.' );
		}

		$this->users->updatePassword( $user, $request->all() );

		return redirect()->route( 'admin.access.user.index' )->withFlashSuccess( trans( 'alerts.backend.users.updated_password' ) );
	}
}
