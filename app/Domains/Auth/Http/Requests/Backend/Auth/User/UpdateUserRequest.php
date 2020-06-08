<?php

namespace App\Domains\Auth\Http\Requests\Backend\Auth\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateUserRequest.
 */
class UpdateUserRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'roles' => [Rule::requiredIf(function () {
                return !$this->user->isMasterAdmin();
            }), 'array'],
            'permissions' => ['sometimes', 'array'],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'roles.required' => __('You must select one or more roles.'),
        ];
    }
}
