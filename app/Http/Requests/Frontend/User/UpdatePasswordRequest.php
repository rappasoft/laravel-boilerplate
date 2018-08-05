<?php

namespace App\Http\Requests\Frontend\User;

use App\Rules\Auth\ChangePassword;
use App\Rules\Auth\UnusedPassword;
use DivineOmega\LaravelPasswordExposedValidationRule\PasswordExposed;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdatePasswordRequest.
 */
class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->canChangePassword();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password'     => [
            	'required',
				'confirmed',
				new ChangePassword(),
				new PasswordExposed(),
				new UnusedPassword($this->user())
			],
        ];
    }
}
