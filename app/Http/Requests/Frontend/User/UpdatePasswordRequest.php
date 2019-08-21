<?php

namespace App\Http\Requests\Frontend\User;

use App\Rules\Auth\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

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
            'old_password' => ['required'],
            'password' => array_merge(
                [
                    new UnusedPassword($this->user()),
                ],
                PasswordRules::changePassword(
                    $this->email,
                    config('access.users.password_history') ? 'old_password' : null
                )
            ),
        ];
    }
}
