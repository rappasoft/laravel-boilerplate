<?php

namespace App\Models\History\Traits\Relationship;

use App\Models\Access\User\User;
use App\Models\History\HistoryType;

/**
 * Class HistoryRelationship
 * @package App\Models\History\Traits\Relationship
 */
trait HistoryRelationship
{

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function user() {
		return $this->hasOne(User::class, 'id', 'user_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function type() {
		return $this->hasOne(HistoryType::class, 'id', 'type_id');
	}
}