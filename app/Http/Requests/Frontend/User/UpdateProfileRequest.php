<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Validation\Rule;
use App\Helpers\Auth\SocialiteHelper;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class UpdateProfileRequest extends FormRequest
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['sometimes', 'required', 'email'],
            'avatar_type' => ['required', Rule::in(array_merge(['gravatar', 'storage'], (new SocialiteHelper)->getAcceptedProviders()))],
            'avatar_location' => ['sometimes', 'image'],
        ];
    }
}
