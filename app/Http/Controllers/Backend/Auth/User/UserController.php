<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Http\Requests\Backend\Auth\User\UpdateUserRequest;
use App\Models\Auth\User;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageUserRequest $request)
    {
        return view('backend.auth.user.index')
            ->withUsers($this->userRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.user.create')
            ->withRoles($roleRepository->with('permissions')->getAll(['id', 'name']))
            ->withPermissions($permissionRepository->getAll(['id', 'name']));
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->store($request->only(
            'first_name',
            'last_name',
            'email',
            'password',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.created'));
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(User $user, ManageUserRequest $request)
    {
        return view('backend.auth.user.show')
            ->withUser($user)
            ->withActivity($user->activity()->latest()->paginate(25));
    }

	/**
	 * @param User                 $user
	 * @param ManageUserRequest    $request
	 * @param RoleRepository       $roleRepository
	 * @param PermissionRepository $permissionRepository
	 *
	 * @return mixed
	 */
	public function edit(User $user, ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
	{
		return view('backend.auth.user.edit')
			->withUser($user)
			->withRoles($roleRepository->getAll())
			->withUserRoles($user->roles->pluck('name')->all())
			->withPermissions($permissionRepository->getAll(['id', 'name']))
			->withUserPermissions($user->permissions->pluck('name')->all());
	}

	/**
	 * @param User              $user
	 * @param UpdateUserRequest $request
	 *
	 * @return mixed
	 */
	public function update(User $user, UpdateUserRequest $request)
	{
		$this->userRepository->update($user->id, $request->only(
			'first_name',
			'last_name',
			'email',
			'roles',
			'permissions'
		));

		return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.updated'));
	}

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function destroy(User $user, ManageUserRequest $request)
    {
        $this->userRepository->delete($user->id);

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('alerts.backend.users.deleted'));
    }
}
