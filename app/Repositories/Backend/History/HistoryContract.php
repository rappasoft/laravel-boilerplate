<?php namespace App\Repositories\Backend\History;

use App\Models\History\History;

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
	 * @param int $limit
	 * @param bool $paginate
	 * @param int $pagination
	 * @return mixed
	 */
	public function render($limit = null, $paginate = false, $pagination = 10);

	/**
	 * @param $type
	 * @param int $limit
	 * @param bool $paginate
	 * @param int $pagination
	 * @return mixed
	 */
	public function renderType($type, $limit = null, $paginate = false, $pagination = 10);

	/**
	 * @param $entity_id
	 * @param int $limit
	 * @param bool $paginate
	 * @param int $pagination
	 * @return mixed
	 */
	public function renderEntity($entity_id, $limit = null, $paginate = false, $pagination = 10);

	/**
	 * @param $text
	 * @param bool $assets
	 * @return mixed
	 */
	public function renderDescription($text, $assets = false);

	/**
	 * @param $items
	 * @return mixed
	 */
	public function buildList($history);

	/**
	 * @param History $history
	 * @return mixed
	 */
	public function buildItem(History $historyItem);
}