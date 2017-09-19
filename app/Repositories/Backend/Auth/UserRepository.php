<?php

namespace App\Repositories\Backend\Auth;

use App\Models\Auth\User;
use App\Repositories\Traits\CacheResults;
use App\Repositories\BaseEloquentRepository;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseEloquentRepository
{
    use CacheResults;

    /**
     * @var string
     */
    protected $model = User::class;

    /**
     * @return mixed
     */
    public function getUnconfirmedCount()
    {
        return $this->model->where('confirmed', 0)->count();
    }

	/**
	 * @param int    $paged
	 * @param string $orderBy
	 * @param string $sort
	 *
	 * @return mixed
	 */
	public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc')
	{
		return $this->model
			->active()
			->orderBy($orderBy, $sort)
			->paginate($paged);
	}
}