<?php namespace App\Http\Requests\Backend\Access\Role;

use App\Http\Requests\Request;

/**
 * Class UpdateRoleRequest
 * @package App\Http\Requests\Backend\Access\Role
 */
class UpdateRoleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required',
		];
	}
}