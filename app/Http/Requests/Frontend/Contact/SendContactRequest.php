<?php

namespace App\Http\Requests\Frontend\Contact;

use App\Http\Requests\Request;

/**
 * Class SendContactRequest.
 */
class SendContactRequest extends Request
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
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ];
    }
}
