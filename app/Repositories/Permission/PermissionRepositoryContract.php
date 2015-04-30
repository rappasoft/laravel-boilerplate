<?php namespace App\Repositories\Permission;

interface PermissionRepositoryContract {
	/**
	 * Find item or throw exception
	 */
	public function findOrThrowException($id, $withRoles = false);

	/*
	 * Get paginated list of resource
	 * param $per_page
	 */
	public function getPermissionsPaginated($per_page, $order_by = 'id', $sort = 'asc');

	/*
	 * Get all of the resource
	 */
	public function getAllPermissions($order_by = 'id', $sort = 'asc', $withRoles = true);

	/*
	 * Get all permissions not associated with a user
	 */
	public function getPermissionsNotAssociatedWithUser();

	/*
	 * Get all permissions not associated with a role
	 */
	public function getPermissionsNotAssociatedWithRole();

	/*
	 * Create the permission
	 */
	public function create($input, $roles);

	/*
	 * Update the current permission
	 */
	public function update($id, $input, $roles);

	/*
	 * Delete the selected permission
	 */
	public function destroy($id);
}