<?php namespace App\Http\Requests\Frontend\Access;

use App\Http\Requests\Request;

/**
 * Class ResetPasswordEmailRequest
 * @package App\Http\Requests\Frontend\Access
 */
class ResetPasswordEmailRequest extends Request {

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
			'email' => 'required|email'
		];
	}
}