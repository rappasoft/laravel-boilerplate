<?php

namespace App\Repositories\Backend\Access\Role;

use App\Models\Access\Role\Role;
use App\Exceptions\GeneralException;

/**
 * Class EloquentRoleRepository
 * @package App\Repositories\Role
 */
class EloquentRoleRepository implements RoleRepositoryContract
{
    /**
     * @param  $id
     * @param  bool $withPermissions
     * @throws GeneralException
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|null|static
     */
    public function findOrThrowException($id, $withPermissions = false)
    {
        if (! is_null(Role::find($id))) {
            if ($withPermissions) {
                return Role::with('permissions')
                    ->find($id);
            }

            return Role::find($id);
        }

        throw new GeneralException(trans('exceptions.backend.access.roles.not_found'));
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getRolesPaginated($per_page, $order_by = 'sort', $sort = 'asc')
    {
        return Role::with('permissions')
            ->orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllRoles($order_by = 'sort', $sort = 'asc', $withPermissions = false)
    {
        if ($withPermissions) {
            return Role::with('permissions')
                ->orderBy($order_by, $sort)
                ->get();
        }

        return Role::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        if (Role::where('name', $input['name'])->first()) {
            throw new GeneralException(trans('exceptions.backend.access.roles.already_exists'));
        }

        //See if the role has all access
        $all = $input['associated-permissions'] == 'all' ? true : false;

        //This config is only required if all is false
        if (!$all)
        //See if the role must contain a permission as per config
        {
            if (config('access.roles.role_must_contain_permission') && count($input['permissions']) == 0) {
                throw new GeneralException(trans('exceptions.backend.access.roles.needs_permission'));
            }
        }

        $role       = new Role;
        $role->name = $input['name'];
        $role->sort = isset($input['sort']) && strlen($input['sort']) > 0 && is_numeric($input['sort']) ? (int) $input['sort'] : 0;

        //See if this role has all permissions and set the flag on the role
        $role->all = $all;

        if ($role->save()) {
            if (!$all) {
                $current     = explode(',', $input['permissions']);
                $permissions = [];

                if (count($current)) {
                    foreach ($current as $perm) {
                        if (is_numeric($perm)) {
                            array_push($permissions, $perm);
                        }

                    }
                }
                $role->attachPermissions($permissions);
            }

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.roles.create_error'));
    }

    /**
     * @param  $id
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input)
    {
        $role = $this->findOrThrowException($id);

        //See if the role has all access, administrator always has all access
        if ($role->id == 1) {
            $all = true;
        } else {
            $all = $input['associated-permissions'] == 'all' ? true : false;
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

        if ($role->save()) {
            //If role has all access detach all permissions because they're not needed
            if ($all) {
                $role->permissions()->sync([]);
            } else {
                //Remove all roles first
                $role->permissions()->sync([]);

                //Attach permissions if the role does not have all access
                $current     = explode(',', $input['permissions']);
                $permissions = [];

                if (count($current)) {
                    foreach ($current as $perm) {
                        if (is_numeric($perm)) {
                            array_push($permissions, $perm);
                        }

                    }
                }
                $role->attachPermissions($permissions);
            }

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.roles.update_error'));
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        //Would be stupid to delete the administrator role
        if ($id == 1) { //id is 1 because of the seeder
            throw new GeneralException(trans('exceptions.backend.access.roles.cant_delete_admin'));
        }

        $role = $this->findOrThrowException($id, true);

        //Don't delete the role is there are users associated
        if ($role->users()->count() > 0) {
            throw new GeneralException(trans('exceptions.backend.access.roles.has_users'));
        }

        //Detach all associated roles
        $role->permissions()->sync([]);

        if ($role->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.roles.delete_error'));
    }

    /**
     * @return mixed
     */
    public function getDefaultUserRole()
    {
        if (is_numeric(config('access.users.default_role'))) {
            return Role::where('id', (int) config('access.users.default_role'))->first();
        }

        return Role::where('name', config('access.users.default_role'))->first();
    }
}
