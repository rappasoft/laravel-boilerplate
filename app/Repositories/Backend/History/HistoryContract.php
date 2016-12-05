<?php namespace App\Repositories\Backend\History;

/**
 * Interface HistoryContract
 * @package App\Repositories\Backend\History
 */
interface HistoryContract {

	/**
	 * @param $type
	 * @param $text
	 * @param null $entity_id
	 * @param null $icon
	 * @param null $class
	 * @param null $assets
	 * @return mixed
	 */
	public function log($type, $text, $entity_id = null, $icon = null, $class = null,  $assets = null);

	/**
	 * @param null $limit
	 * @param bool $paginate
	 * @param int $pagination
	 * @return mixed
	 */
	public function render($limit = null, $paginate = true, $pagination = 10);

	/**
	 * @param $type
	 * @param null $limit
	 * @param bool $paginate
	 * @param int $pagination
	 * @return mixed
	 */
	public function renderType($type, $limit = null, $paginate = true, $pagination = 10);

	/**
	 * @param $type
	 * @param $entity_id
	 * @param null $limit
	 * @param bool $paginate
	 * @param int $pagination
	 * @return mixed
	 */
	public function renderEntity($type, $entity_id, $limit = null, $paginate = true, $pagination = 10);

	/**
	 * @param $text
	 * @param bool $assets
	 * @return mixed
	 */
	public function renderDescription($text, $assets = false);

	/**
	 * @param $history
	 * @param bool $paginate
	 * @return mixed
	 */
	public function buildList($history, $paginate = true);

	/**
	 * @param $query
	 * @param $limit
	 * @param $paginate
	 * @param $pagination
	 * @return mixed
	 */
	public function buildPagination($query, $limit, $paginate, $pagination);
}