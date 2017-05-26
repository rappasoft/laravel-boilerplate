<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\GeneralException;

/**
 * Class Request.
 */
abstract class Request extends FormRequest
{
    /**
     * @var string
     */
    protected $error = '';

    /**
     *
     * @throws GeneralException
     */
    protected function failedAuthorization()
    {
        if (empty($this->error)) {
            $this->error = trans('auth.general_error');
        }

        throw new GeneralException($this->error);
    }
}
