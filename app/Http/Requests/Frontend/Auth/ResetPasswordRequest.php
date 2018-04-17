<?php

namespace App\Http\Requests\Frontend\Auth;

use App\Rules\Auth\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ResetPasswordRequest.
 */
class ResetPasswordRequest extends FormRequest
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
            'token' => 'required',
            'email' => 'required|email',
            'password'     => ['required', 'min:6', 'confirmed', new UnusedPassword($this->get('token'))],
        ];
    }
}
