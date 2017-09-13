<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\Auth\SocialAccount;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{

	/**
	 * @return mixed
	 */
	public function providers()
	{
		return $this->hasMany(SocialAccount::class);
	}
}