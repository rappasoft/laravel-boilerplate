<?php namespace App\Models\Access\Role;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App
 */
class Role extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table;

	/**
	 *
	 */
	public function __construct()
	{
		$this->table = config('access.roles_table');
	}

	/**
	 * Many-to-Many relations with Users.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function users()
	{
		return $this->belongsToMany(config('auth.model'), config('access.assigned_roles_table'), 'role_id', 'user_id');
	}

	/**
	 * Many-to-Many relations with Permission.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function permissions()
	{
		return $this->belongsToMany(config('access.permission'), config('access.permission_role_table'), 'role_id', 'permission_id')
			->orderBy('display_name', 'asc');
	}

	/**
	 * @return string
	 */
	public function getEditButtonAttribute() {
		return '<a href="'.route('admin.access.roles.edit', $this->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('crud.edit_button') . '"></i></a>';
	}

	/**
	 * @return string
	 */
	public function getDeleteButtonAttribute() {
		if ($this->id != 1) //Cant delete master admin role
			return '<a href="'.route('admin.access.roles.destroy', $this->id).'" class="btn btn-xs btn-danger" data-method="delete"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="' . trans('crud.delete_button') . '"></i></a>';
		return '';
	}

	/**
	 * @return string
	 */
	public function getActionButtonsAttribute() {
		return $this->getEditButtonAttribute().' '.$this->getDeleteButtonAttribute();
	}

	/**
	 * Before delete all constrained foreign relations
	 *
	 * @return bool
	 */
	public function beforeDelete()
	{
		DB::table(config('access.assigned_roles_table'))->where('role_id', $this->id)->delete();
		DB::table(config('access.permission_role_table'))->where('role_id', $this->id)->delete();
	}

	/**
	 * Save the inputted permissions.
	 *
	 * @param mixed $inputPermissions
	 *
	 * @return void
	 */
	public function savePermissions($inputPermissions)
	{
		if (! empty($inputPermissions)) {
			$this->permissions()->sync($inputPermissions);
		} else {
			$this->permissions()->detach();
		}
	}

	/**
	 * Attach permission to current role.
	 *
	 * @param object|array $permission
	 *
	 * @return void
	 */
	public function attachPermission($permission)
	{
		if (is_object($permission)) {
			$permission = $permission->getKey();
		}

		if (is_array($permission)) {
			$permission = $permission['id'];
		}

		$this->permissions()->attach($permission);
	}

	/**
	 * Detach permission form current role.
	 *
	 * @param object|array $permission
	 *
	 * @return void
	 */
	public function detachPermission($permission)
	{
		if (is_object($permission))
			$permission = $permission->getKey();

		if (is_array($permission))
			$permission = $permission['id'];

		$this->permissions()->detach($permission);
	}

	/**
	 * Attach multiple permissions to current role.
	 *
	 * @param mixed $permissions
	 *
	 * @return void
	 */
	public function attachPermissions($permissions)
	{
		foreach ($permissions as $permission) {
			$this->attachPermission($permission);
		}
	}

	/**
	 * Detach multiple permissions from current role
	 *
	 * @param mixed $permissions
	 *
	 * @return void
	 */
	public function detachPermissions($permissions)
	{
		foreach ($permissions as $permission) {
			$this->detachPermission($permission);
		}
	}
}