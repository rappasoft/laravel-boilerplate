<?php

namespace App\Repositories;

/**
 * Class Repository
 * @package App\Repositories
 */
abstract class Repository extends BaseRepository
{
	/**
	 * @return mixed
	 */
	public function getAll()
	{
		return $this->query()->get();
	}

	/**
	 * @return mixed
	 */
	public function getCount() {
		return $this->query()->count();
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function find($id)
	{
		return $this->query()->find($id);
	}
}