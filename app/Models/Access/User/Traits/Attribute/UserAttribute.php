<?php namespace App\Models\Access\User\Traits\Attribute;

use Illuminate\Support\Facades\Hash;

/**
 * Class UserAttribute
 * @package App\Models\Access\User\Traits\Attribute
 */
trait UserAttribute {

    /**
     * Hash the users password
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if (Hash::needsRehash($value))
            $this->attributes['password'] = bcrypt($value);
        else
            $this->attributes['password'] = $value;
    }

    /**
     * @return string
     */
    public function getConfirmedLabelAttribute() {
        if ($this->confirmed == 1)
            return "<label class='label label-success'>Yes</label>";
        return "<label class='label label-danger'>No</label>";
    }

    /**
     * @return mixed
     */
    public function getPictureAttribute() {
        return gravatar()->get($this->email, ['size' => 50]);
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute() {
        if (access()->can('edit-users'))
            return '<a href="'.route('admin.access.users.edit', $this->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('crud.edit_button') . '"></i></a> ';
        return '';
    }

    /**
     * @return string
     */
    public function getChangePasswordButtonAttribute() {
        if (access()->can('change-user-password'))
            return '<a href="'.route('admin.access.user.change-password', $this->id).'" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('crud.change_password_button') . '"></i></a>';
        return '';
    }

    /**
     * @return string
     */
    public function getStatusButtonAttribute() {
        switch($this->status) {
            case 0:
                if (access()->can('reactivate-users'))
                    return '<a href="'.route('admin.access.user.mark', [$this->id, 1]).'" class="btn btn-xs btn-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="' . trans('crud.activate_user_button') . '"></i></a> ';
                break;

            case 1:
                $buttons = '';

                if (access()->can('deactivate-users'))
                    $buttons .= '<a href="'.route('admin.access.user.mark', [$this->id, 0]).'" class="btn btn-xs btn-warning"><i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title="' . trans('crud.deactivate_user_button') . '"></i></a> ';

                if (access()->can('ban-users'))
                    $buttons .= '<a href="'.route('admin.access.user.mark', [$this->id, 2]).'" class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('crud.ban_user_button') . '"></i></a> ';

                return $buttons;
                break;

            case 2:
                if (access()->can('reactivate-users'))
                    return '<a href="'.route('admin.access.user.mark', [$this->id, 1]).'" class="btn btn-xs btn-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="' . trans('crud.activate_user_button') . '"></i></a> ';
                break;

            default:
                return '';
                break;
        }

        return '';
    }

    public function getConfirmedButtonAttribute() {
        if (! $this->confirmed)
            if (access()->can('resend-user-confirmation-email'))
                return '<a href="'.route('admin.account.confirm.resend', $this->id).'" class="btn btn-xs btn-success"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Resend Confirmation E-mail"></i></a> ';
        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute() {
        if (access()->can('delete-users'))
            return '<a href="'.route('admin.access.users.destroy', $this->id).'" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('crud.delete_button') . '"></i></a>';
        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute() {
        return $this->getEditButtonAttribute().
        $this->getChangePasswordButtonAttribute().' '.
        $this->getStatusButtonAttribute().
        $this->getConfirmedButtonAttribute().
        $this->getDeleteButtonAttribute();
    }
}