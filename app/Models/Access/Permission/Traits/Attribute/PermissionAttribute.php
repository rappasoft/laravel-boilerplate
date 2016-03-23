<?php

namespace App\Models\Access\Permission\Traits\Attribute;

/**
 * Class PermissionAttribute
 * @package App\Models\Access\Permission\Traits\Attribute
 */
trait PermissionAttribute
{
    /**
     * @return bool
     */
    public function isSystem()
    {
        return $this->system == 1;
    }

    /**
     * @return string
     */
    public function getSystemLabelAttribute()
    {
        if ($this->isSystem())
            return '<span class="label label-danger">'. trans('labels.general.yes') .'</span>';
        return '<span class="label label-success">'. trans('labels.general.yes') .'</span>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->allow('edit-permissions')) {
            return '<a href="' . route('admin.access.roles.permissions.edit', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (access()->allow('delete-permissions')) {
            return '<a href="' . route('admin.access.roles.permissions.destroy', $this->id) . '" class="btn btn-xs btn-danger" data-method="delete"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        $buttons = '';
        $buttons .= $this->getEditButtonAttribute();

        //If the permission is not a system item it can be deleted
        if (! $this->isSystem()) {
            $buttons .= ' ' . $this->getDeleteButtonAttribute();
        }

        return $buttons;
    }
}
