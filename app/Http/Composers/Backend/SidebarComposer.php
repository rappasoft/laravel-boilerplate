<?php

namespace App\Http\Composers\Backend;

use App\Repositories\Backend\Access\User\UserRepository;
use Illuminate\View\View;

/**
 * Class SidebarComposer
 *
 * @package App\Http\Composers\Backend
 */
class SidebarComposer
{

	/**
	 * @var UserRepository
	 */
	protected $userRepository;

	/**
	 * SidebarComposer constructor.
	 *
	 * @param UserRepository $userRepository
	 */
	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * @param View $view
	 *
	 * @return bool|mixed
	 */
	public function compose(View $view)
	{
		if (config('access.users.requires_approval')) {
			$view->with('pending_approval', $this->userRepository->getUnconfirmedCount());
		} else {
			$view->with('pending_approval', 0);
		}
	}
}
