<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Exceptions\GeneralException;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Services\Traits\HasAbilities;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class RoleService.
 */
class RoleService extends BaseService
{
    use HasAbilities;

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
     * @return Role
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Role
    {
        DB::beginTransaction();

        try {
            $role = $this->model::create(['name' => $data['name']]);
            $role->syncPermissions($this->getPermissions($data));
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
        DB::beginTransaction();

        try {
            $role->syncPermissions($this->getPermissions($data));
            $role->update(['name' => $data['name']]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the role.'));
        }

        DB::commit();

        return $role;
    }

    /**
     * @param  Role  $role
     *
     * @return bool
     * @throws GeneralException
     */
    public function delete(Role $role): bool
    {
        if ($role->users()->count()) {
            throw new GeneralException(__('You can not delete a role with associated users.'));
        }

        return $this->deleteById($role->id);
    }
}
