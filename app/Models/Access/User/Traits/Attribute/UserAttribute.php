<?php

namespace App\Models\Access\User\Traits\Attribute;

/**
 * Class UserAttribute
 * @package App\Models\Access\User\Traits\Attribute
 */
trait UserAttribute
{

    /**
     * @return mixed
     */
    public function canChangeEmail()
    {
        return config('access.users.change_email');
    }

    /**
     * @return bool
     */
    public function canChangePassword()
    {
        return ! app('session')->has(config('access.socialite_session_name'));
    }

    /**
     * @return string
     */
    public function getConfirmedLabelAttribute()
    {
        if ($this->isConfirmed())
            return "<label class='label label-success'>".trans('labels.general.yes')."</label>";
        return "<label class='label label-danger'>".trans('labels.general.no')."</label>";
    }

    /**
     * @return mixed
     */
    public function getPictureAttribute()
    {
        return $this->getPicture();
    }

    /**
     * @param bool $size
     * @return mixed
     */
    public function getPicture($size = false)
    {
        if (! $size) $size = config('gravatar.default.size');
        return gravatar()->get($this->email, ['size' => $size]);
    }

    /**
     * @param $provider
     * @return bool
     */
    public function hasProvider($provider)
    {
        foreach ($this->providers as $p) {
            if ($p->provider == $provider) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isActive() {
        return $this->status == 1;
    }

    /**
     * @return bool
     */
    public function isConfirmed() {
        return $this->confirmed == 1;
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->allow('edit-users')) {
            return '<a href="' . route('admin.access.users.edit', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getChangePasswordButtonAttribute()
    {
        if (access()->allow('change-user-password')) {
            return '<a href="' . route('admin.access.user.change-password', $this->id) . '" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.change_password') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        switch ($this->status) {
            case 0:
                if (access()->allow('reactivate-users')) {
                    return '<a href="' . route('admin.access.user.mark', [$this->id, 1]) . '" class="btn btn-xs btn-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.activate') . '"></i></a> ';
                }

                break;

            case 1:
                if (access()->allow('deactivate-users')) {
                    return '<a href="' . route('admin.access.user.mark', [$this->id, 0]) . '" class="btn btn-xs btn-warning"><i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.deactivate') . '"></i></a> ';
                }

                break;

            default:
                return '';
                // No break
        }

        return '';
    }

    /**
     * @return string
     */
    public function getConfirmedButtonAttribute()
    {
        if (! $this->isConfirmed()) {
            if (access()->allow('resend-user-confirmation-email')) {
                return '<a href="' . route('admin.account.confirm.resend', $this->id) . '" class="btn btn-xs btn-success"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title=' . trans('buttons.backend.access.users.resend_email') . '"></i></a> ';
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (access()->allow('delete-users')) {
            return '<a href="' . route('admin.access.users.destroy', $this->id) . '"
                 data-method="delete"
                 data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                 data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                 data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
                 class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute() .
        $this->getChangePasswordButtonAttribute() . ' ' .
        $this->getStatusButtonAttribute() .
        $this->getConfirmedButtonAttribute() .
        $this->getDeleteButtonAttribute();
    }
}
