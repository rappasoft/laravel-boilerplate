<?php

namespace App\Repositories\Backend\Auth;

use App\Models\Auth\Role;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseEloquentRepository;
use App\Events\Backend\Auth\Role\RoleCreated;
use App\Events\Backend\Auth\Role\RoleUpdated;

/**
 * Class RoleRepository.
 */
class RoleRepository extends BaseEloquentRepository
{
    /**
     * @var array
     */
    protected $relationships = ['permissions', 'users'];

    /**
     * @var string
     */
    protected $model = Role::class;

    /**
     * @param array $data
     *
     * @return Role
     * @throws GeneralException
     */
    public function create(array $data) : Role
    {
    	// Make sure it doesn't already exist
    	if ($this->roleExists($data['name'])) {
    		throw new GeneralException('A role already exists with the name ' . $data['name']);
		}

        if (! isset($data['permissions'])) {
            $data['permissions'] = [];
        }

        //See if the role must contain a permission as per config
        if (config('access.roles.role_must_contain_permission') && count($data['permissions']) == 0) {
            throw new GeneralException(__('exceptions.backend.access.roles.needs_permission'));
        }

        return DB::transaction(function () use ($data) {
            $role = parent::create(['name' => $data['name']]);

            if ($role) {
                if (count($data['permissions'])) {
                    $role->givePermissionTo($data['permissions']);
                }

                event(new RoleCreated($role));

                return $role;
            }

            throw new GeneralException(trans('exceptions.backend.access.roles.create_error'));
        });
    }

    /**
     * @param mixed $id
     * @param array $data
     *
     * @return mixed
     * @throws GeneralException
     */
    public function update($id, array $data)
    {
    	if ($id == 1) throw new GeneralException('You can not edit the administrator role.');

        $role = Role::findOrFail($id);

        // If the name is changing make sure it doesn't already exist
        if ($role->name != $data['name']) {
			if ($this->roleExists($data['name'])) {
				throw new GeneralException('A role already exists with the name ' . $data['name']);
			}
		}

        if (! isset($data['permissions'])) {
            $data['permissions'] = [];
        }

        //See if the role must contain a permission as per config
        if (config('access.roles.role_must_contain_permission') && count($data['permissions']) == 0) {
            throw new GeneralException(__('exceptions.backend.access.roles.needs_permission'));
        }

        return DB::transaction(function () use ($role, $data) {
            if ($role->update([
                'name' => $data['name'],
            ])) {
                if (count($data['permissions'])) {
                    $role->syncPermissions($data['permissions']);
                }

                event(new RoleUpdated($role));

                return $role;
            }

            throw new GeneralException(trans('exceptions.backend.access.roles.update_error'));
        });
    }

	/**
	 * @param $name
	 *
	 * @return bool
	 */
	protected function roleExists($name) {
    	return $this->model->where('name', $name)->count() > 0;
	}
}
