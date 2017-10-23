<?php

namespace App\Repositories\Backend\History;

/**
 * Interface HistoryContract.
 */
interface HistoryContract
{
    /**
     * @param $type
     *
     * @return mixed
     */
    public function withType($type);

    /**
     * @param $text
     *
     * @return mixed
     */
    public function withText($text);

    /**
     * @param $entity_id
     *
     * @return mixed
     */
    public function withEntity($entity_id);

    /**
     * @param $icon
     *
     * @return mixed
     */
    public function withIcon($icon);

    /**
     * @param $class
     *
     * @return mixed
     */
    public function withClass($class);

    /**
     * @param $assets
     *
     * @return mixed
     */
    public function withAssets($assets);

    /**
     * @return mixed
     */
    public function log();

    /**
     * @param null $limit
     * @param bool $paginate
     * @param int  $pagination
     *
     * @return mixed
     */
    public function render($limit = null, $paginate = true, $pagination = 10);

    /**
     * @param $type
     * @param null $limit
     * @param bool $paginate
     * @param int  $pagination
     *
     * @return mixed
     */
    public function renderType($type, $limit = null, $paginate = true, $pagination = 10);

    /**
     * @param $type
     * @param $entity_id
     * @param null $limit
     * @param bool $paginate
     * @param int  $pagination
     *
     * @return mixed
     */
    public function renderEntity($type, $entity_id, $limit = null, $paginate = true, $pagination = 10);

    /**
     * @param $text
     * @param bool $assets
     *
     * @return mixed
     */
    public function renderDescription($text, $assets = false);

    /**
     * @param $history
     * @param bool $paginate
     *
     * @return mixed
     */
    public function buildList($history, $paginate = true);

    /**
     * @param $query
     * @param $limit
     * @param $paginate
     * @param $pagination
     *
     * @return mixed
     */
    public function buildPagination($query, $limit, $paginate, $pagination);
}
