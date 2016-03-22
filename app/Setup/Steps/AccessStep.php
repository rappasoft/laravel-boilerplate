<?php

namespace App\Setup\Steps;

use App\Models\Access\Permission\Permission;
use App\Models\Access\Permission\PermissionGroup;
use App\Models\Access\Role\Role;
use DB;
use Illuminate\Support\Collection;
use MarvinLabs\SetupWizard\Steps\BaseStep;

/**
 * Class AccessStep
 *
 * @package app\SetupSteps
 *
 * Setup wizard step to initialize all the access control database information (roles, permissions)
 */
class AccessStep extends BaseStep
{
    public function __construct($id)
    {
        parent::__construct($id);
    }

    public function getFormData()
    {
        $config = $this->getConfiguration();

        return ['count' => [
            'roles'       => count($config['roles']),
            'groups'      => count($config['groups']),
            'permissions' => count($config['permissions']),
        ]];
    }

    public function apply($formData)
    {
        // Just to make sure, clean-up any existing access data
        $this->cleanAccessData();

        // Create each concept data one after the other
        $config = $this->getConfiguration();
        $createdRoles = $this->createRoles($config['roles']);
        $createdGroups = $this->createGroups($config['groups']);
        $createdPermissions = $this->createPermissions($config['permissions'], $createdGroups);

        $this->linkDependentPermissions($config['permissions'], $createdPermissions);
        $this->assignRolePermissions($config['permissions'], $createdPermissions, $createdRoles);

        return true;
    }

    public function undo()
    {
        $this->cleanAccessData();

        return true;
    }

    protected function getConfiguration()
    {
        return config('setup_wizard.access');
    }

    /**
     * Delete existing data about access control
     */
    protected function cleanAccessData()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        $tables = [
            config('access.roles_table'),
            config('access.permissions_table'),
            config('access.permission_role_table'),
            config('access.permission_user_table'),
            config('access.permission_group_table'),
            config('access.permission_dependencies_table'),
        ];

        foreach ($tables as $table) {
            if (env('DB_CONNECTION') == 'mysql') {
                DB::table($table)->truncate();
            } elseif (env('DB_CONNECTION') == 'sqlite') {
                DB::statement('DELETE FROM ' . $table);
            } else {
                DB::statement('TRUNCATE TABLE ' . $table . ' CASCADE');
            }
        }

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }

    /**
     * @param array $roleConfig
     *
     * @return Collection
     */
    protected function createRoles($roleConfig)
    {
        $sortOrder = 0;
        $createdRoles = new Collection();
        $modelClass = config('access.role');

        foreach ($roleConfig as $slug => $desc) {
            $sortOrder = $sortOrder + 1;
            $roleName = isset($desc['name']) ? $desc['name'] : $slug;
            $hasAllPermissions = isset($desc['all']) ? $desc['all'] : false;

            /** @var Role $role */
            $role = new $modelClass;
            $role->name = $roleName;
            $role->all = $hasAllPermissions;
            $role->sort = $sortOrder;
            $role->save();

            $createdRoles->put($slug, $role);
        }

        return $createdRoles;
    }

    /**
     * @param array $groupConfig
     *
     * @return Collection
     */
    protected function createGroups($groupConfig)
    {
        $sortOrder = 1;
        $createdGroups = new Collection();
        $modelClass = config('access.group');

        foreach ($groupConfig as $slug => $desc) {
            $group = $this->createGroup($createdGroups, $modelClass, $slug, $desc);

            ++$sortOrder;
        }

        return $createdGroups;
    }

    /**
     * @param Collection           $createdGroups
     * @param string               $modelClass
     * @param string               $slug
     * @param array                $desc
     * @param PermissionGroup|null $parent
     * @param string               $parentSlug
     *
     * @return PermissionGroup
     */
    protected function createGroup($createdGroups, $modelClass, $slug, $desc, $parent = null, $parentSlug = '')
    {
        $fullSlug = !empty($parentSlug) ? $parentSlug . '.' . $slug : $slug;

        $groupName = isset($desc['name']) ? $desc['name'] : $slug;
        $children = isset($desc['children']) ? $desc['children'] : [];

        /** @var PermissionGroup $group */
        $group = new $modelClass;
        $group->name = $groupName;
        if ($parent != null) $group->parent_id = $parent->id;
        $group->save();

        // Create child groups if any
        if (!empty($children)) {
            foreach ($children as $childSlug => $childDesc) {
                $this->createGroup($createdGroups, $modelClass, $childSlug, $childDesc, $group, $fullSlug);
            }
        }

        // Remember this group with that slug
        $createdGroups->put($fullSlug, $group);

        return $group;
    }

    /**
     * @param array      $permissionConfig
     * @param Collection $groups
     *
     * @return Collection
     */
    protected function createPermissions($permissionConfig, $groups)
    {
        $sortOrder = 0;
        $createdPermissions = new Collection();
        $modelClass = config('access.permission');

        foreach ($permissionConfig as $slug => $desc) {
            $sortOrder = $sortOrder + 1;
            $displayName = isset($desc['display_name']) ? $desc['display_name'] : $slug;
            $isSystem = isset($desc['system']) ? $desc['system'] : false;

            if (isset($desc['group'])) {
                $group = $groups->get($desc['group'], null);
                $groupId = $group == null ? null : $group->id;
            } else {
                $groupId = null;
            }

            /** @var Permission $permission */
            $permission = new $modelClass;
            $permission->name = $slug;
            $permission->display_name = $displayName;
            $permission->system = $isSystem;
            $permission->group_id = $groupId;
            $permission->sort = $sortOrder;
            $permission->save();

            $createdPermissions->put($slug, $permission);
        }

        return $createdPermissions;
    }

    /**
     * @param array      $permissionConfig
     * @param Collection $permissions
     */
    protected function linkDependentPermissions($permissionConfig, $permissions)
    {
        $pivotTable = config('access.permission_dependencies_table');

        foreach ($permissionConfig as $slug => $desc) {
            if (empty($desc['dependency'])) continue;

            $perm = $permissions->get($slug, null);
            foreach ($desc['dependency'] as $dep) {
                $depPerm = $permissions->get($dep, null);

                if ($perm == null || $depPerm == null) continue;

                DB::table($pivotTable)->insert([
                    'permission_id' => $perm->id,
                    'dependency_id' => $depPerm->id,
                ]);
            }
        }
    }

    /**
     * @param array      $permissionConfig
     * @param Collection $permissions
     * @param Collection $roles
     */
    protected function assignRolePermissions($permissionConfig, $permissions, $roles)
    {
        foreach ($permissionConfig as $slug => $desc) {
            if (empty($desc['role'])) continue;

            $perm = $permissions->get($slug, null);
            foreach ($desc['role'] as $r) {
                /** @var Role $role */
                $role = $roles->get($r, null);

                if ($perm == null || $role == null) continue;

                $role->attachPermission($perm);
            }
        }
    }
}
