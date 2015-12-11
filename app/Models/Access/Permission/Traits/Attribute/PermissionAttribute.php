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
        return $this->system == 1 ? true : false;
    }

    /**
     * @return string
     */
    public function getSystemLabelAttribute()
    {
        switch ($this->system) {
            case 0:
                return '<span class="label label-success">No</span>';

            case 1:
                return '<span class="label label-danger">Yes</span>';
        }
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->can('edit-permissions')) {
            return '<a href="' . route('admin.access.roles.permissions.edit', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('crud.edit_button') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (access()->can('delete-permissions')) {
            return '<a href="' . route('admin.access.roles.permissions.destroy', $this->id) . '" class="btn btn-xs btn-danger" data-method="delete"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('crud.delete_button') . '"></i></a>';
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
        if (!$this->isSystem()) {
            $buttons .= ' ' . $this->getDeleteButtonAttribute();
        }

        return $buttons;
    }
}
