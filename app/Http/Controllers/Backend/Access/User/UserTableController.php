<?php

namespace App\Http\Controllers\Backend\Access\User;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Access\User\UserRepository;
use App\Http\Requests\Backend\Access\User\ManageUserRequest;

/**
 * Class UserTableController.
 */
class UserTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageUserRequest $request)
    {
        return Datatables::of($this->users->getForDataTable($request->get('status'), $request->get('trashed')))
        ->escapeColumns(['first_name', 'last_name', 'email'])
        ->editColumn('confirmed', function ($user) {
            return $user->confirmed_label;
        })
            ->addColumn('roles', function ($user) {
                return $user->roles->count() ?
                    implode('<br/>', $user->roles->pluck('name')->toArray()) :
                    trans('labels.general.none');
            })
            ->addColumn('social', function ($user) {
                $accounts = [];

                // Note: If you have a provider that does not have a corresponding
                // font-awesome icon, you can override it here
                foreach ($user->providers as $social) {
                    $accounts[] = '<a href="'.route('admin.access.user.social.unlink',
                            [$user, $social]).'" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.unlink').'" data-method="delete"><i class="fa fa-'.$social->provider.'"></i></a>';
                }

                return count($accounts) ? implode(' ', $accounts) : 'None';
            })
            ->addColumn('actions', function ($user) {
                return $user->action_buttons;
            })
            ->setRowClass(function ($user) {
                return ! $user->isConfirmed() && config('access.users.requires_approval') ? 'danger' : '';
            })
            ->withTrashed()
            ->make(true);
    }
}
