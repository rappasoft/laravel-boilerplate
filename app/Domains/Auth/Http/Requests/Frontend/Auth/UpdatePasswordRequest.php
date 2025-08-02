<?php

namespace App\Domains\Auth\Http\Requests\Frontend\Auth;

use App\Domains\Auth\Rules\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
// use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

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
            'current_password' => ['required', 'max:100'],
            'password' => array_merge(
                [
                    'required',								// Password is required
                    'max:100',								// Maximum length of 100 characters
                    new UnusedPassword($this->user()),		// Custom rule to check if the password has been used
                ],
			    Password::min(8)							// Require at least 8 characters
			        ->mixedCase()							// Both uppercase and lowercase letters
			        ->numbers()								// Must contain numbers
			        ->symbols()								// Must contain symbols
			        ->uncompromised()						// Ensure the password isn't compromised
                /*PasswordRules::changePassword(
                    $this->email,
                    config('boilerplate.access.user.password_history') ? 'current_password' : null
                )*/
            ),
        ];
    }
}
