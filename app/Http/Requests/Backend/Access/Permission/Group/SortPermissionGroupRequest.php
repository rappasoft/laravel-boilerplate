<?php

namespace App\Http\Requests\Backend\Access\Permission\Group;

use App\Http\Requests\Request;

/**
 * Class SortPermissionGroupRequest
 * @package App\Http\Requests\Backend\Access\Permission\Group
 */
class SortPermissionGroupRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('sort-permission-groups');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
