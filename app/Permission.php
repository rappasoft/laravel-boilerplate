<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

/**
 * Class VaultPermission
 * @package Rappasoft\Vault
 */
class Permission extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table;

	public function __construct()
	{
		$this->table = Config::get('access.permissions_table');
	}

	/**
	 * Many-to-Many relations with Roles.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function roles()
	{
		return $this->belongsToMany(Config::get('access.role'), Config::get('access.permission_role_table'), 'permission_id', 'role_id');
	}

	/**
	 * Many-to-Many relations with Users.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function users()
	{
		return $this->belongsToMany(Config::get('auth.model'), Config::get('access.permission_user_table'), 'permission_id', 'user_id');
	}

	/*
	 * Get label for whether or not permission is for system
	 */
	public function getSystemLabelAttribute() {
		switch($this->system) {
			case 0:
				return '<span class="label label-success">No</span>';

			case 1:
				return '<span class="label label-danger">Yes</span>';
		}
	}

	/*
	 * Whether or not this permission is a system item
	 */
	public function isSystem() {
		return $this->system == 1 ? true : false;
	}

	/*
	 * Get the edit permission button
	 */
	public function getEditButtonAttribute() {
		return '<a href="'.route('access.roles.permissions.edit', $this->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>';
	}

	/*
	 * Get the delete permission button
	 */
	public function getDeleteButtonAttribute() {
		return '<a href="'.route('access.roles.permissions.destroy', $this->id).'" class="btn btn-xs btn-danger" data-method="delete"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
	}

	/*
	 * Get permission action buttons
	 */
	public function getActionButtonsAttribute() {
		$buttons = '';
		$buttons .= $this->getEditButtonAttribute();

		//If the permission is not a system item it can be deleted
		if (! $this->isSystem()) {
			$buttons .= ' '.$this->getDeleteButtonAttribute();
		}

		return $buttons;
	}

	/**
	 * Before delete all constrained foreign relations.
	 *
	 * @return bool
	 */
	public function beforeDelete()
	{
		DB::table(Config::get('access.permission_role_table'))->where('permission_id', $this->id)->delete();
	}
}
