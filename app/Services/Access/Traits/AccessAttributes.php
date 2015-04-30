<?php namespace App\Services\Access\Traits;

trait AccessAttributes {

	/*
	 * Get the edit button for a user
	 */
	public function getEditButtonAttribute() {
		return '<a href="'.route('access.users.edit', $this->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>';
	}

	/*
	 * Get the change password button for a user
	 */
	public function getChangePasswordButtonAttribute() {
		return '<a href="'.route('access.user.change-password', $this->id).'" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Change Password"></i></a>';
	}

	/*
	 * Get the activate/deactivate button for a user
	 */
	public function getStatusButtonAttribute() {
		switch($this->status) {
			case 0:
				return '<a href="'.route('access.user.mark', [$this->id, 1]).'" class="btn btn-xs btn-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="Activate User"></i></a> ';

			case 1:
				return '<a href="'.route('access.user.mark', [$this->id, 0]).'" class="btn btn-xs btn-warning"><i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title="Deactivate User"></i></a>';

			default:
				return '';
		}
	}

	/*
	 * Get the delete button for a user, minus the admin
	 */
	public function getDeleteButtonAttribute() {
		return '<a href="'.route('access.users.destroy', $this->id).'" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
	}

	/*
	 * Get the action buttons for the user management screen
	 */
	public function getActionButtonsAttribute() {
		return $this->getEditButtonAttribute().' '.
		$this->getChangePasswordButtonAttribute().' '.
		$this->getStatusButtonAttribute().' '.
		$this->getDeleteButtonAttribute();
	}

}