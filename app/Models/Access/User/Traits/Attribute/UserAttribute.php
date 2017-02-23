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
            return "<label class='label label-success'>".__('Active').'</label>';
        }

        return "<label class='label label-danger'>".__('Inactive').'</label>';
    }

    /**
     * @return string
     */
    public function getConfirmedLabelAttribute()
    {
        if ($this->isConfirmed()) {
            return "<label class='label label-success'>".__('Yes').'</label>';
        }

        return "<label class='label label-danger'>".__('No').'</label>';
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
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.access.user.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.__('View').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.access.user.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.__('Edit').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getChangePasswordButtonAttribute()
    {
        return '<a href="'.route('admin.access.user.change-password', $this).'" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.__('Change Password').'"></i></a> ';
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
                    ]).'" class="btn btn-xs btn-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="'.__('Activate').'"></i></a> ';
                // No break

                case 1:
                    return '<a href="'.route('admin.access.user.mark', [
                        $this,
                        0,
                    ]).'" class="btn btn-xs btn-warning"><i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title="'.__('Deactivate').'"></i></a> ';
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
        if (! $this->isConfirmed()) {
            return '<a href="'.route('admin.access.user.account.confirm.resend', $this).'" class="btn btn-xs btn-success"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title='.__('Resend Confirmation E-mail').'"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id != access()->id()) {
            return '<a href="'.route('admin.access.user.destroy', $this).'"
                 data-method="delete"
                 data-trans-button-cancel="'.__('Cancel').'"
                 data-trans-button-confirm="'.__('Delete').'"
                 data-trans-title="'.__('Are you sure?').'"
                 class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('Delete').'"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.access.user.restore', $this).'" name="restore_user" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.__('Restore User').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.access.user.delete-permanently', $this).'" name="delete_user_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('Delete Permanently').'"></i></a> ';
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
                    $this).'" class="btn btn-xs btn-success"><i class="fa fa-lock" data-toggle="tooltip" data-placement="top" title="'.__('Login As :user',['user' => $this->name]).'"></i></a> ';
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return $this->getRestoreButtonAttribute().
                $this->getDeletePermanentlyButtonAttribute();
        }

        return
            $this->getLoginAsButtonAttribute().
            $this->getShowButtonAttribute().
            $this->getEditButtonAttribute().
            $this->getChangePasswordButtonAttribute().
            $this->getStatusButtonAttribute().
            $this->getConfirmedButtonAttribute().
            $this->getDeleteButtonAttribute();
    }
}
