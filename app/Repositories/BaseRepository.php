<?php

namespace App\Repositories;

/**
 * Class BaseRepository.
 */
class BaseRepository
{
    /**
     * @return mixed
     */
    protected function getAll()
    {
        return $this->query()->get();
    }

    /**
     * @return mixed
     */
    protected function getCount()
    {
        return $this->query()->count();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    protected function find($id)
    {
        return $this->query()->find($id);
    }

	/**
	 * @return mixed
	 */
	protected function query()
	{
		return call_user_func(static::MODEL.'::query');
	}
}
