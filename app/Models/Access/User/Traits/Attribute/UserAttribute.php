<?php

namespace App\Models\Access\User\Traits\Attribute;

/**
 * Class UserAttribute.
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
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>".trans('labels.general.active').'</label>';
        }

        return "<label class='label label-danger'>".trans('labels.general.inactive').'</label>';
    }

    /**
     * @return string
     */
    public function getConfirmedLabelAttribute()
    {
        if ($this->isConfirmed()) {
            if ($this->id != 1 && $this->id != access()->id()) {
                return '<a href="'.route('admin.access.user.unconfirm',
                        $this).'" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.unconfirm').'" name="confirm_item"><label class="label label-success" style="cursor:pointer">'.trans('labels.general.yes').'</label></a>';
            } else {
                return '<label class="label label-success">'.trans('labels.general.yes').'</label>';
            }
        }

        return '<a href="'.route('admin.access.user.confirm', $this).'" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.confirm').'" name="confirm_item"><label class="label label-danger" style="cursor:pointer">'.trans('labels.general.no').'</label></a>';
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
     *
     * @return mixed
     */
    public function getPicture($size = false)
    {
        if (! $size) {
            $size = config('gravatar.default.size');
        }

        return gravatar()->get($this->email, ['size' => $size]);
    }

    /**
     * @param $provider
     *
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
    public function isActive()
    {
        return $this->status == 1;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed == 1;
    }

    /**
     * @return bool
     */
    public function isPending()
    {
        return config('access.users.requires_approval') && $this->confirmed == 0;
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->last_name
            ? $this->first_name.' '.$this->last_name
            : $this->first_name;
    }

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->full_name;
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.access.user.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.view').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.access.user.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getChangePasswordButtonAttribute()
    {
        return '<a href="'.route('admin.access.user.change-password', $this).'" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.change_password').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        if ($this->id != access()->id()) {
            switch ($this->status) {
                case 0:
                    return '<a href="'.route('admin.access.user.mark', [
                        $this,
                        1,
                    ]).'" class="btn btn-xs btn-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.activate').'"></i></a> ';
                // No break

                case 1:
                    return '<a href="'.route('admin.access.user.mark', [
                        $this,
                        0,
                    ]).'" class="btn btn-xs btn-warning"><i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.deactivate').'"></i></a> ';
                // No break

                default:
                    return '';
                // No break
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getConfirmedButtonAttribute()
    {
        if (! $this->isConfirmed() && ! config('access.users.requires_approval')) {
            return '<a href="'.route('admin.access.user.account.confirm.resend', $this).'" class="btn btn-xs btn-success"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title='.trans('buttons.backend.access.users.resend_email').'"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id != access()->id() && $this->id != 1) {
            return '<a href="'.route('admin.access.user.destroy', $this).'"
                 data-method="delete"
                 data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                 data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                 data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
                 class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.access.user.restore', $this).'" name="restore_user" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.restore_user').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.access.user.delete-permanently', $this).'" name="delete_user_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.delete_permanently').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getLoginAsButtonAttribute()
    {
        /*
         * If the admin is currently NOT spoofing a user
         */
        if (! session()->has('admin_user_id') || ! session()->has('temp_user_id')) {
            //Won't break, but don't let them "Login As" themselves
            if ($this->id != access()->id()) {
                return '<a href="'.route('admin.access.user.login-as',
                    $this).'" class="btn btn-xs btn-success"><i class="fa fa-lock" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.login_as',
                    ['user' => $this->full_name]).'"></i></a> ';
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getClearSessionButtonAttribute()
    {
        if ($this->id != access()->id() && config('session.driver') == 'database') {
            return '<a href="'.route('admin.access.user.clear-session', $this).'"
			 	 data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                 data-trans-button-confirm="'.trans('buttons.general.continue').'"
                 data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
                 class="btn btn-xs btn-warning" name="confirm_item"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.access.users.clear_session').'"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return $this->restore_button.$this->delete_permanently_button;
        }

        return
            $this->clear_session_button.
            $this->login_as_button.
            $this->show_button.
            $this->edit_button.
            $this->change_password_button.
            $this->status_button.
            $this->confirmed_button.
            $this->delete_button;
    }
}
