<?php namespace App\Models\Access\Permission;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionGroup
 * @package App
 */
class PermissionGroup extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     *
     */
    public function __construct()
    {
        $this->table = config('access.permission_group_table');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children() {
        return $this->hasMany(PermissionGroup::class, 'parent_id', 'id')->orderBy('sort', 'asc');
    }

    /**
     * @return mixed
     */
    public function permissions() {
        return $this->hasMany(Permission::class, 'group_id')->orderBy('sort', 'asc');
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute() {
        if (access()->can('edit-permission-groups'))
            return '<a href="'.route('admin.access.roles.permission-group.edit', $this->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('crud.edit_button') . '"></i></a>';
        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute() {
        if (access()->can('delete-permission-groups'))
            return '<a href="'.route('admin.access.roles.permission-group.destroy', $this->id).'" class="btn btn-xs btn-danger" data-method="delete"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('crud.delete_button') . '"></i></a>';
        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute() {
        return $this->getEditButtonAttribute().' '.$this->getDeleteButtonAttribute();
    }
}