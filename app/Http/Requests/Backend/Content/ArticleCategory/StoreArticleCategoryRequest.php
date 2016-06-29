<?php

namespace App\Http\Requests\Backend\Content\ArticleCategory;

use App\Http\Requests\Request;

/**
 * Class StoreArticleRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreArticleCategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'                  => 'required',
            'slug'                 => 'required',
        ];
    }
}
