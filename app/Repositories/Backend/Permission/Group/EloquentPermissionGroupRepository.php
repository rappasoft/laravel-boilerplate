<?php namespace App\Repositories\Backend\Permission\Group;

use App\Exceptions\GeneralException;
use App\Models\Access\Permission\PermissionGroup;

/**
 * Class EloquentPermissionGroupRepository
 * @package App\Repositories\Backend\Permission\Group
 */
class EloquentPermissionGroupRepository implements PermissionGroupRepositoryContract {

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {
        return PermissionGroup::findOrFail($id);
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function getGroupsPaginated($limit = 50)
    {
        return PermissionGroup::with('children', 'permissions')
            ->whereNull('parent_id')
            ->orderBy('sort', 'asc')->paginate($limit);
    }

    /**
     * @param $input
     * @return static
     */
    public function store($input) {
        $this->nameCheck($input['name']);
        $group = new PermissionGroup;
        $group->name = $input['name'];
        return $group->save();
    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($id, $input) {
        $this->nameCheck($input['name']);
        return $this->find($id)->update($input);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id) {
        return $this->find($id)->delete();
    }

    /**
     * @param $hierarchy
     * @return bool
     */
    public function updateSort($hierarchy) {
        $parent_sort = 1;
        $child_sort = 1;

        foreach ($hierarchy as $group) {
           $this->find((int)$group['id'])->update([
              'parent_id' => null,
               'sort' => $parent_sort
           ]);

           if (isset($group['children']) && count($group['children'])) {
               foreach ($group['children'] as $child) {
                   $this->find((int)$child['id'])->update([
                       'parent_id' => (int)$group['id'],
                       'sort' => $child_sort
                   ]);

                   $child_sort++;
               }
           }

           $parent_sort++;
        }

        return true;
    }

    /**
     * @param $name
     * @throws GeneralException
     */
    private function nameCheck($name) {
        if (PermissionGroup::where('name', $name)->count())
            throw new GeneralException("There is already a group with that name");
    }
}