<?php namespace App\Http\Requests\Backend\Access\User;

use App\Http\Requests\Request;

/**
 * Class CreateUserRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class CreateUserRequest extends Request {

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
			'name'					=>  'required',
			'email'					=>	'required|email|unique:users',
			'password'				=>	'required|alpha_num|min:6|confirmed',
			'password_confirmation'	=>	'required|alpha_num|min:6',
		];
	}
}