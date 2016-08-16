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
	 * @return mixed
	 */
	public function render($limit = false, $paginate = false, $perpage = 10, $pagename = 'history');

	/**
	 * @param $type
	 * @return mixed
	 */
	public function renderType($type, $limit = false, $paginate = false, $perpage = 10, $pagename = 'history');

	/**
	 * @param $entity_id
	 * @return mixed
	 */
	public function renderEntity($entity_id, $limit = false, $paginate = false, $perpage = 10, $pagename = 'history');

	/**
	 * @return mixed
	 */
	public function renderJson($perpage = 10);

	/**
	 * @return mixed
	 */
	public function renderTypeJson($type, $perpage = 10);

	/**
	 * @return mixed
	 */
	public function renderEntityJson($entity_id, $perpage = 10);

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
	public function buildList($items);

	/**
	 * @param History $history
	 * @return mixed
	 */
	public function buildItem(History $history);
}