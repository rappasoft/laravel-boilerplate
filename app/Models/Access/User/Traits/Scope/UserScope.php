<?php

namespace App\Models\Access\User\Traits\Scope;

/**
 * Class UserScope
 * @package App\Models\Access\User\Traits\Scope
 */
trait UserScope
{

	/**
	 * @param $query
	 * @param bool $confirmed
	 * @return mixed
	 */
	public function scopeConfirmed($query, $confirmed = true) {
		return $query->where('confirmed', $confirmed);
	}

	/**
	 * @param $query
	 * @param bool $status
	 * @return mixed
	 */
	public function scopeActive($query, $status = true) {
		return $query->where('status', $status);
	}
}