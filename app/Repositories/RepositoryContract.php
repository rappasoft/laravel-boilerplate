<?php

namespace App\Repositories;

/**
 * Forked from https://github.com/dannyweeks/laravel-base-repository
 * Unfortunately there was no working Laravel 5.5 version at the time of this project
 *
 * Interface RepositoryContract
 *
 * @package App\Repositories
 */
interface RepositoryContract
{
    /**
     * Get all items
     *
     * @param  string $columns specific columns to select
     * @param  string $orderBy column to sort by
     * @param  string $sort sort direction
     */
    public function getAll($columns = null, $orderBy = 'created_at', $sort = 'DECS');

    /**
     * Get paged items
     *
     * @param  integer $paged Items per page
     * @param  string $orderBy Column to sort by
     * @param  string $sort Sort direction
     */
    public function getPaginated($paged = 15, $orderBy = 'created_at', $sort = 'DECS');

    /**
     * Items for select options
     *
     * @param  string $data column to display in the option
     * @param  string $key column to be used as the value in option
     * @param  string $orderBy column to sort by
     * @param  string $sort sort direction
     * @return array           array with key value pairs
     */
    public function getForSelect($data, $key = 'id', $orderBy = 'created_at', $sort = 'DECS');

    /**
     * Get item by its id
     *
     * @param  mixed $id
     */
    public function getById($id);

    /**
     * Get instance of model by column
     *
     * @param  mixed $term search term
     * @param  string $column column to search
     */
    public function getItemByColumn($term, $column = 'slug');

    /**
     * Get instance of model by column
     *
     * @param  mixed $term search term
     * @param  string $column column to search
     */
    public function getCollectionByColumn($term, $column = 'slug');

    /**
     * Get item by id or column
     *
     * @param  mixed $term id or term
     * @param  string $column column to search
     */
    public function getActively($term, $column = 'slug');


    /**
     * Create new using mass assignment
     *
     * @param array $data
     */
    public function create(array $data);

    /**
     * Update or crate a record and return the entity
     *
     * @param array $identifiers columns to search for
     * @param array $data
     */
    public function updateOrCreate(array $identifiers, array $data);

    /**
     * Delete a record by it's ID.
     *
     * @param $id
     * @return bool
     */
    public function delete($id);

}