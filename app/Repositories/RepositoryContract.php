<?php namespace App\Repositories;

/**
 * Interface RepositoryContract
 *
 * @package App\Repositories
 */
interface RepositoryContract {

	/**
	 * @return mixed
	 */
	public function all();

	/**
	 * @return mixed
	 */
	public function count();

	/**
	 * @param array $data
	 *
	 * @return mixed
	 */
	public function create(array $data);

	/**
	 * @param array $data
	 *
	 * @return mixed
	 */
	public function createMultiple(array $data);

	/**
	 * @return mixed
	 */
	public function delete();

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function deleteById($id);

	/**
	 * @param array $ids
	 *
	 * @return mixed
	 */
	public function deleteMultipleById(array $ids);

	/**
	 * @return mixed
	 */
	public function first();

	/**
	 * @return mixed
	 */
	public function get();

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function getById($id);

	/**
	 * @param $limit
	 *
	 * @return mixed
	 */
	public function limit($limit);

	/**
	 * @param $column
	 * @param $value
	 *
	 * @return mixed
	 */
	public function orderBy($column, $value);

	/**
	 * @param       $id
	 * @param array $data
	 *
	 * @return mixed
	 */
	public function updateById($id, array $data);

	/**
	 * @param        $column
	 * @param        $value
	 * @param string $operator
	 *
	 * @return mixed
	 */
	public function where($column, $value, $operator = '=');

	/**
	 * @param $column
	 * @param $value
	 *
	 * @return mixed
	 */
	public function whereIn($column, $value);

	/**
	 * @param $relations
	 *
	 * @return mixed
	 */
	public function with($relations);
}