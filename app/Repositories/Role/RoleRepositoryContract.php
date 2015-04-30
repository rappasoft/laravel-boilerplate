<?php namespace App\Repositories\Role;

interface RoleRepositoryContract {
	/*
	 * Find item or throw exception
	 */
	public function findOrThrowException($id, $withPermissions = false);

	/*
	 * Get paginated list of resource
	 * param $per_page
	 */
	public function getRolesPaginated($per_page, $order_by = 'id', $sort = 'asc');

	/*
	 * Get all of the resource
	 */
	public function getAllRoles($order_by = 'id', $sort = 'asc', $withPermissions = false);

	/*
	 * Create the role
	 */
	public function create($input, $permissions);

	/*
	 * Update the role
	 */
	public function update($id, $input, $permissions);

	/*
	 * Delete the specified user
	 */
	public function destroy($id);
}