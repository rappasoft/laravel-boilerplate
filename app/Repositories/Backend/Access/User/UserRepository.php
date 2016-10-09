<?php

namespace App\Repositories\Backend\Access\User;

use App\Models\Access\User\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Access\User\UserCreated;
use App\Events\Backend\Access\User\UserUpdated;
use App\Events\Backend\Access\User\UserDeleted;
use App\Events\Backend\Access\User\UserRestored;
use App\Events\Backend\Access\User\UserDeactivated;
use App\Events\Backend\Access\User\UserReactivated;
use App\Events\Backend\Access\User\UserPasswordChanged;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Events\Backend\Access\User\UserPermanentlyDeleted;
use App\Repositories\Frontend\Access\User\UserRepositoryContract as FrontendUserRepositoryContract;

/**
 * Class UserRepository
 * @package App\Repositories\User
 */
class UserRepository extends Repository
{
	/**
	 * Associated Repository Model
	 */
	const MODEL = User::class;

    /**
     * @var RoleRepository
     */
    protected $role;

    /**
     * @var FrontendUserRepositoryContract
     */
    protected $user;

    /**
     * @param RoleRepository $role
     * @param FrontendUserRepositoryContract $user
     */
    public function __construct(RoleRepository $role, FrontendUserRepositoryContract $user)
    {
        $this->role = $role;
        $this->user = $user;
    }

	/**
	 * @param int $status
	 * @param bool $trashed
	 * @return mixed
	 */
	public function getForDataTable($status = 1, $trashed = false)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        if ($trashed == "true") {
            return $this->query()->onlyTrashed()
                ->select(['id', 'name', 'email', 'status', 'confirmed', 'created_at', 'updated_at', 'deleted_at'])
                ->get();
        }

        return $this->query()->select(['id', 'name', 'email', 'status', 'confirmed', 'created_at', 'updated_at', 'deleted_at'])
            ->where('status', $status)
            ->get();
    }

	/**
	 * @param $input
	 * @param $roles
	 */
	public function create($input, $roles)
    {
        $user = $this->createUserStub($input);

		DB::transaction(function() use ($user, $roles, $input) {
			if (parent::save($user)) {

				//User Created, Validate Roles
				if (! count($roles['assignees_roles'])) {
					throw new GeneralException(trans('exceptions.backend.access.users.role_needed_create'));
				}

				//Attach new roles
				$user->attachRoles($roles['assignees_roles']);

				//Send confirmation email if requested
				if (isset($input['confirmation_email']) && $user->confirmed == 0) {
					$this->user->sendConfirmationEmail($user->id);
				}

				event(new UserCreated($user));
				return true;
			}

        	throw new GeneralException(trans('exceptions.backend.access.users.create_error'));
		});
    }

	/**
	 * @param Model $user
	 * @param array $input
	 */
	public function update(Model $user, array $input)
    {
    	$data = $input['data'];
		$roles = $input['roles'];

        $this->checkUserByEmail($data, $user);

		DB::transaction(function() use ($user, $data, $roles) {
			if (parent::update($user, $data)) {
				//For whatever reason this just wont work in the above call, so a second is needed for now
				$user->status = isset($data['status']) ? 1 : 0;
				$user->confirmed = isset($data['confirmed']) ? 1 : 0;
				parent::save($user);

				$this->checkUserRolesCount($roles);
				$this->flushRoles($roles, $user);

				event(new UserUpdated($user));
				return true;
			}

        	throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
		});
    }

	/**
	 * @param Model $user
	 * @param $input
	 * @return bool
	 * @throws GeneralException
	 */
	public function updatePassword(Model $user, $input)
    {
        $user->password = bcrypt($input['password']);

        if (parent::save($user)) {
            event(new UserPasswordChanged($user));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.update_password_error'));
    }

	/**
	 * @param Model $user
	 * @return bool
	 * @throws GeneralException
	 */
	public function delete(Model $user)
    {
        if (access()->id() == $user->id) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_self'));
        }

        if (parent::delete($user)) {
            event(new UserDeleted($user));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
    }

	/**
	 * @param Model $user
	 * @throws GeneralException
	 */
	public function forceDelete(Model $user)
    {
        if (is_null($user->deleted_at)) {
            throw new GeneralException("This user must be deleted first before it can be destroyed permanently.");
        }

		DB::transaction(function() use ($user) {
			if (parent::forceDelete($user)) {
				event(new UserPermanentlyDeleted($user));
				return true;
			}

			throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
		});
    }

	/**
	 * @param Model $user
	 * @return bool
	 * @throws GeneralException
	 */
	public function restore(Model $user)
    {
        if (is_null($user->deleted_at)) {
            throw new GeneralException("This user is not deleted so it can not be restored.");
        }

        if (parent::restore(($user))) {
            event(new UserRestored($user));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }

	/**
	 * @param Model $user
	 * @param $status
	 * @return bool
	 * @throws GeneralException
	 */
	public function mark(Model $user, $status)
    {
        if (access()->id() == $user->id && $status == 0) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
        }

        $user->status = $status;

        switch ($status) {
            case 0:
                event(new UserDeactivated($user));
            break;

            case 1:
                event(new UserReactivated($user));
            break;
        }

        if (parent::save($user)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.mark_error'));
    }

	/**
	 * @param Model $user
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws GeneralException
	 */
	public function loginAs(Model $user)
    {
        // Overwrite who we're logging in as, if we're already logged in as someone else.
        if (session()->has('admin_user_id') && session()->has('temp_user_id')) {
            // Let's not try to login as ourselves.
            if (auth()->id() == $user->id || session()->get('admin_user_id') == $user->id) {
                throw new GeneralException('Do not try to login as yourself.');
            }

            // Overwrite temp user ID.
            session(['temp_user_id' => $user->id]);

            // Login.
            access()->loginUsingId($user->id);

            // Redirect.
            return redirect()->route("frontend.index");
        }

        $this->flushTempSession();

        //Won't break, but don't let them "Login As" themselves
        if (access()->id() == $user->id) {
            throw new GeneralException("Do not try to login as yourself.");
        }

        //Add new session variables
        session(["admin_user_id" => access()->id()]);
        session(["admin_user_name" => access()->user()->name]);
        session(["temp_user_id" => $user->id]);

        //Login user
        access()->loginUsingId($user->id);

        //Redirect to frontend
        return redirect()->route("frontend.index");
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutAs()
    {

        //If for some reason route is getting hit without someone already logged in
        if (! access()->user()) {
            return redirect()->route("auth.login");
        }

        //If admin id is set, relogin
        if (session()->has("admin_user_id") && session()->has("temp_user_id")) {
            //Save admin id
            $admin_id = session()->get("admin_user_id");

            $this->flushTempSession();

            //Relogin admin
            access()->loginUsingId((int)$admin_id);

            //Redirect to backend user page
            return redirect()->route("admin.access.user.index");
        } else {
            $this->flushTempSession();

            //Otherwise logout and redirect to login
            access()->logout();
            return redirect()->route("auth.login");
        }
    }

	/**
	 * Remove old session variables from admin logging in as user
	 */
	public function flushTempSession()
	{
		//Remove any old session variables
		session()->forget("admin_user_id");
		session()->forget("admin_user_name");
		session()->forget("temp_user_id");
	}

    /**
     * @param  $input
     * @param  $user
     * @throws GeneralException
     */
    protected function checkUserByEmail($input, $user)
    {
        //Figure out if email is not the same
        if ($user->email != $input['email']) {
            //Check to see if email exists
            if ($this->query()->where('email', '=', $input['email'])->first()) {
                throw new GeneralException(trans('exceptions.backend.access.users.email_error'));
            }
        }
    }

    /**
     * @param $roles
     * @param $user
     */
    protected function flushRoles($roles, $user)
    {
        //Flush roles out, then add array of new ones
        $user->detachRoles($user->roles);
        $user->attachRoles($roles['assignees_roles']);
    }

    /**
     * @param  $roles
     * @throws GeneralException
     */
    protected function checkUserRolesCount($roles)
    {
        //User Updated, Update Roles
        //Validate that there's at least one role chosen
        if (count($roles['assignees_roles']) == 0) {
            throw new GeneralException(trans('exceptions.backend.access.users.role_needed'));
        }
    }

    /**
     * @param  $input
     * @return mixed
     */
    protected function createUserStub($input)
    {
        $user                    = new User;
        $user->name              = $input['name'];
        $user->email             = $input['email'];
        $user->password          = bcrypt($input['password']);
        $user->status            = isset($input['status']) ? 1 : 0;
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed         = isset($input['confirmed']) ? 1 : 0;
        return $user;
    }
}
