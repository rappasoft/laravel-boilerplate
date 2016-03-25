<?php

namespace App\Repositories\Backend\Access\Permission\Group;

use App\Exceptions\GeneralException;
use App\Models\Access\Permission\PermissionGroup;

/**
 * Class EloquentPermissionGroupRepository
 * @package App\Repositories\Backend\Permission\Group
 */
class EloquentPermissionGroupRepository implements PermissionGroupRepositoryContract
{
    /**
     * @param  $id
     * @return mixed
     */
    public function find($id)
    {
        return PermissionGroup::findOrFail($id);
    }

    /**
     * @param  int     $limit
     * @return mixed
     */
    public function getGroupsPaginated($limit = 50)
    {
        return PermissionGroup::with('children', 'permissions')
            ->whereNull('parent_id')
            ->orderBy('sort', 'asc')
            ->paginate($limit);
    }

    /**
     * @param  bool    $withChildren
     * @return mixed
     */
    public function getAllGroups($withChildren = false)
    {
        if ($withChildren) {
            return PermissionGroup::orderBy('name', 'asc')->get();
        }

        return PermissionGroup::with('children', 'permissions')
            ->whereNull('parent_id')
            ->orderBy('sort', 'asc')
            ->get();
    }

    /**
     * @param  $input
     * @return static
     */
    public function store($input)
    {
        $group       = new PermissionGroup;
        $group->name = $input['name'];
        return $group->save();
    }

    /**
     * @param  $id
     * @param  $input
     * @throws GeneralException
     * @return mixed
     */
    public function update($id, $input)
    {
        $group = $this->find($id);

        //Name is changing for whatever reason
        if ($group->name != $input['name']) {
            if (PermissionGroup::where('name', $input['name'])->count()) {
                throw new GeneralException(trans('exceptions.backend.access.permissions.groups.name_taken'));
            }
        }

        return $group->update($input);
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function destroy($id)
    {
        $group = $this->find($id);

        if ($group->children->count()) {
            throw new GeneralException(trans('exceptions.backend.access.permissions.groups.has_children'));
        }

        if ($group->permissions->count()) {
            throw new GeneralException(trans('exceptions.backend.access.permissions.groups.associated_permissions'));
        }

        return $group->delete();
    }

    /**
     * @param  $hierarchy
     * @return bool
     */
    public function updateSort($hierarchy)
    {
        $parent_sort = 1;
        $child_sort  = 1;

        foreach ($hierarchy as $group) {
            $this->find((int) $group['id'])->update([
                'parent_id' => null,
                'sort'      => $parent_sort,
            ]);

            if (isset($group['children']) && count($group['children'])) {
                foreach ($group['children'] as $child) {
                    $this->find((int) $child['id'])->update([
                        'parent_id' => (int) $group['id'],
                        'sort'      => $child_sort,
                    ]);

                    $child_sort++;
                }
            }

            $parent_sort++;
        }

        return true;
    }
}
