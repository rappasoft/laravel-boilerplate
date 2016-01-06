<?php

namespace App\Http\Requests\Backend\Access\Permission\Group;

use App\Http\Requests\Request;

/**
 * Class StorePermissionGroupRequest
 * @package App\Http\Requests\Backend\Access\Permission\Group
 */
class StorePermissionGroupRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-permission-groups');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:permission_groups',
        ];
    }
}
