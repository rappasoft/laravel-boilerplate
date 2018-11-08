<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Arcanedev\NoCaptcha\Rules\CaptchaRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterRequest.
 */
class RegisterRequest extends FormRequest
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
            'first_name'           => ['required', 'string', 'max:191'],
            'last_name'            => ['required', 'string', 'max:191'],
            'email'                => ['required', 'string', 'email', 'max:191', Rule::unique('users')],
            'password'             => ['required', 'string', 'min:6', 'confirmed'],
            'g-recaptcha-response' => ['required_if:captcha_status,true', new CaptchaRule()],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
        ];
    }
}
