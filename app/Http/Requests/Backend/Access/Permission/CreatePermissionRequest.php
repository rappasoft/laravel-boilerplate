<?php namespace App\Http\Requests\Backend\Access\Permission;

use App\Http\Requests\Request;

/**
 * Class CreatePermissionRequest
 * @package App\Http\Requests\Backend\Access\Permission
 */
class CreatePermissionRequest extends Request {

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
			'name'			=>  'required',
			'display_name'	=>	'required',
		];
	}
}