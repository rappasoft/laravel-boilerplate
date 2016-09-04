<?php namespace App\Models\History;

use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class History
 * package App
 */
class History extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'history';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['type_id', 'user_id', 'entity_id', 'icon', 'class', 'text', 'assets'];

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