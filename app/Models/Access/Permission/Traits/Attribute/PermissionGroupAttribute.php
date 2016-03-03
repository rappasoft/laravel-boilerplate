<?php

namespace App\Models\Access\Permission\Traits\Attribute;

/**
 * Class PermissionGroupAttribute
 * @package App\Models\Access\Permission\Traits\Attribute
 */
trait PermissionGroupAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->allow('edit-permission-groups')) {
            return '<a href="' . route('admin.access.roles.permission-group.edit', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (access()->allow('delete-permission-groups')) {
            return '<a href="' . route('admin.access.roles.permission-group.destroy', $this->id) . '" class="btn btn-xs btn-danger" data-method="delete"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute() . ' ' . $this->getDeleteButtonAttribute();
    }
}