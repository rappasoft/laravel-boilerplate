<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Request
 * @package App\Http\Requests
 */
abstract class Request extends FormRequest
{
    // @Acknowledgement
    // https://www.damchey.com/2015/06/redirect-all-laravel-5-formrequest-authorize-failures-to-a-routeurl/
    //A generic error message, can be overridden in the sub class
    protected $error = '';

    public function forbiddenResponse()
    {
        if (empty($error)) {
            $this->error = trans('auth.general_error');
        }
        return redirect()->back()->withErrors($this->error);
    }
}
