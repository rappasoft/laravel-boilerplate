<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\ChangePasswordRequest;
use App\Repositories\Frontend\Access\User\UserRepository;

/**
 * Class ChangePasswordController
 * @package App\Http\Controllers\Frontend\Auth
 */
class ChangePasswordController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

	/**
	 * ChangePasswordController constructor.
	 * @param UserRepository $user
	 */
	public function __construct(UserRepository $user)
	{
		$this->user = $user;
	}

	/**
	 * @param ChangePasswordRequest $request
	 * @return mixed
	 */
	public function changePassword(ChangePasswordRequest $request) {
		$this->user->changePassword($request->all());
		return redirect()->route('frontend.user.account')->withFlashSuccess(trans('strings.frontend.user.password_updated'));
	}
}