<?php namespace App\Models\Access\User;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Access\User\Traits\UserAccess;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Models\Access\User\Traits\Attribute\UserAttribute;
use App\Models\Access\User\Traits\Relationship\UserRelationship;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Class User
 * @package App\Models\Access\User
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable,
		CanResetPassword,
		SoftDeletes,
		UserAccess,
		UserRelationship,
		UserAttribute;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are not mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * For soft deletes
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * @return mixed
	 */
	public function canChangeEmail() {
		return config('access.users.change_email');
	}

	/**
	 * @return bool
     */
	public function isBannedOrDeactivated()
	{
		$blockedStatuses = [0, 2];
		return in_array($this->status, $blockedStatuses);
	}
}
