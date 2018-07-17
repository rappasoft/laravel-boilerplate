<?php

namespace App\Models\Auth\Traits\Attribute;

/**
 * Trait SocialAccountAttribute.
 */
trait SocialAccountAttribute
{

	/**
	 * @return mixed
	 */
	public function getAuditableLabelAttribute()
	{
		return ucfirst($this->provider);
	}
}
