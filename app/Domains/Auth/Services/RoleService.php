<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Exceptions\GeneralException;
use App\Domains\Auth\Models\Role;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class RoleService.
 */
class RoleService extends BaseService
{
    /**
     * RoleService constructor.
     *
     * @param  Role  $role
     */
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    /**
     * @param  array  $data
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Role
    {
        $permissions = $this->getPermissions($data);

        DB::beginTransaction();

        try {
            $role = $this->model::create(['name' => $data['name']]);
            $role->syncPermissions($permissions);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the role.'));
        }

        DB::commit();

        return $role;
    }

    /**
     * @param  Role  $role
     * @param  array  $data
     *
     * @return Role
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Role $role, array $data = []): Role
    {
        $permissions = $this->getPermissions($data);

        DB::beginTransaction();

        try {
            $role->syncPermissions($permissions);
            $role->update(['name' => $data['name']]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the role.'));
        }

        DB::commit();

        return $role;
    }

    /**
     * @param  array  $data
     *
     * @return array
     */
    private function getPermissions(array $data = []) : array
    {
        if (! isset($data['permissions']) || ! count($data['permissions'])) {
            return [];
        }

        return $data['permissions'];
    }
}
