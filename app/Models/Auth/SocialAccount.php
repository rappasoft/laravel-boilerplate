<?php

namespace App\Models\Auth;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class SocialAccount.
 */
class SocialAccount extends Model implements AuditableContract
{
    use Auditable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'social_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'provider',
        'provider_id',
        'token',
        'avatar',
    ];

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'id',
        'token',
    ];
}
