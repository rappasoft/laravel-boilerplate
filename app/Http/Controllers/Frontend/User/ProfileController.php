<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Frontend\Auth\UserRepository;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
	/**
	 * @var UserRepository
	 */
	protected $user;

	/**
	 * ProfileController constructor.
	 *
	 * @param UserRepository $user
	 */
	public function __construct(UserRepository $user)
	{
		$this->user = $user;
	}

	/**
	 * @param UpdateProfileRequest $request
	 *
	 * @return mixed
	 */
	public function update(UpdateProfileRequest $request)
	{
		$output = $this->user->update($request->user()->id, $request->only('first_name', 'last_name', 'email'));

		// E-mail address was updated, user has to reconfirm
		if (is_array($output) && $output['email_changed']) {
			auth()->logout();

			return redirect()->route('frontend.auth.login')->withFlashInfo(__('strings.frontend.user.email_changed_notice'));
		}

		return redirect()->route('frontend.user.account')->withFlashSuccess(__('strings.frontend.user.profile_updated'));
	}
}
