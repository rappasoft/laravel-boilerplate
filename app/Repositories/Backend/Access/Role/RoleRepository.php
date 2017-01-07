<?php

namespace App\Repositories\Backend\Access\Role;

use App\Models\Access\Role\Role;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Access\Role\RoleCreated;
use App\Events\Backend\Access\Role\RoleDeleted;
use App\Events\Backend\Access\Role\RoleUpdated;

/**
 * Class RoleRepository.
 */
class RoleRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Role::class;

    /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($order_by = 'sort', $sort = 'asc')
    {
        return $this->query()
            ->with('users', 'permissions')
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getForDataTable($order_by = 'sort', $sort = 'asc')
    {
        return $this->query()
            ->with('users', 'permissions')
            ->orderBy($order_by, $sort)
            ->select([
                config('access.roles_table').'.id',
                config('access.roles_table').'.name',
                config('access.roles_table').'.all',
                config('access.roles_table').'.sort',
            ]);
    }

    /**
     * @param array $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        if ($this->query()->where('name', $input['name'])->first()) {
            throw new GeneralException(trans('exceptions.backend.access.roles.already_exists'));
        }

        //See if the role has all access
        $all = $input['associated-permissions'] == 'all' ? true : false;

        if (! isset($input['permissions'])) {
            $input['permissions'] = [];
        }

        //This config is only required if all is false
        if (! $all) {
            //See if the role must contain a permission as per config
            if (config('access.roles.role_must_contain_permission') && count($input['permissions']) == 0) {
                throw new GeneralException(trans('exceptions.backend.access.roles.needs_permission'));
            }
        }

        DB::transaction(function () use ($input, $all) {
            $role = self::MODEL;
            $role = new $role();
            $role->name = $input['name'];
            $role->sort = isset($input['sort']) && strlen($input['sort']) > 0 && is_numeric($input['sort']) ? (int) $input['sort'] : 0;

            //See if this role has all permissions and set the flag on the role
            $role->all = $all;

            if (parent::save($role)) {
                if (! $all) {
                    $permissions = [];

                    if (is_array($input['permissions']) && count($input['permissions'])) {
                        foreach ($input['permissions'] as $perm) {
                            if (is_numeric($perm)) {
                                array_push($permissions, $perm);
                            }
                        }
                    }

                    $role->attachPermissions($permissions);
                }

                event(new RoleCreated($role));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.roles.create_error'));
        });
    }

    /**
     * @param Model $role
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $role, array $input)
    {
        //See if the role has all access, administrator always has all access
        if ($role->id == 1) {
            $all = true;
        } else {
            $all = $input['associated-permissions'] == 'all' ? true : false;
        }

        if (! isset($input['permissions'])) {
            $input['permissions'] = [];
        }

        //This config is only required if all is false
        if (! $all) {
            //See if the role must contain a permission as per config
            if (config('access.roles.role_must_contain_permission') && count($input['permissions']) == 0) {
                throw new GeneralException(trans('exceptions.backend.access.roles.needs_permission'));
            }
        }

        $role->name = $input['name'];
        $role->sort = isset($input['sort']) && strlen($input['sort']) > 0 && is_numeric($input['sort']) ? (int) $input['sort'] : 0;

        //See if this role has all permissions and set the flag on the role
        $role->all = $all;

        DB::transaction(function () use ($role, $input, $all) {
            if (parent::save($role)) {
                //If role has all access detach all permissions because they're not needed
                if ($all) {
                    $role->permissions()->sync([]);
                } else {
                    //Remove all roles first
                    $role->permissions()->sync([]);

                    //Attach permissions if the role does not have all access
                    $permissions = [];

                    if (is_array($input['permissions']) && count($input['permissions'])) {
                        foreach ($input['permissions'] as $perm) {
                            if (is_numeric($perm)) {
                                array_push($permissions, $perm);
                            }
                        }
                    }

                    $role->attachPermissions($permissions);
                }

                event(new RoleUpdated($role));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.roles.update_error'));
        });
    }

    /**
     * @param Model $role
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $role)
    {
        //Would be stupid to delete the administrator role
        if ($role->id == 1) { //id is 1 because of the seeder
            throw new GeneralException(trans('exceptions.backend.access.roles.cant_delete_admin'));
        }

        //Don't delete the role is there are users associated
        if ($role->users()->count() > 0) {
            throw new GeneralException(trans('exceptions.backend.access.roles.has_users'));
        }

        DB::transaction(function () use ($role) {
            //Detach all associated roles
            $role->permissions()->sync([]);

            if (parent::delete($role)) {
                event(new RoleDeleted($role));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.roles.delete_error'));
        });
    }

    /**
     * @return mixed
     */
    public function getDefaultUserRole()
    {
        if (is_numeric(config('access.users.default_role'))) {
            return $this->query()->where('id', (int) config('access.users.default_role'))->first();
        }

        return $this->query()->where('name', config('access.users.default_role'))->first();
    }
}
