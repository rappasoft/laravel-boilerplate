<?php

namespace App\Models\Auth;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\Auth\Traits\Scope\UserScope;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Auth\Traits\SendUserPasswordReset;
use App\Models\Auth\Traits\Attribute\UserAttribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Auth\Traits\Relationship\UserRelationship;

/**
 * Class User.
 */
class User extends Authenticatable
{
    use HasRoles,
        LogsActivity,
        Notifiable,
        SendUserPasswordReset,
        SoftDeletes,
        UserAttribute,
        UserRelationship,
        UserScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'active', 'confirmation_code', 'confirmed'];

    /**
     * The columns that are available to be logged.
     *
     * @var array
     */
    protected static $logAttributes = ['first_name', 'last_name', 'email', 'active', 'confirmed'];

    /**
     * Whether or not to only log the columns that changed.
     *
     * @var bool
     */
    protected static $logOnlyDirty = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * Can change this to just 'users' if you don't want to be able to differentiate between the types of history.
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getLogNameToUse(string $eventName = ''): string
    {
        return $this->getTable().'_'.$eventName;
    }

    /*
     * @param string $eventName
     *
     * @return string
     */

    /**
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent(string $eventName): string
    {
        return ":causer.first_name :causer.last_name has {$eventName} :subject.first_name :subject.last_name";
    }
}
