<?php

namespace App\Exceptions;

use Exception;

/**
 * Class GeneralException.
 */
class GeneralException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        /*
         * redirect back with a flash message to show a bootstrap alert-error
         */

        return redirect()->back()->withInput()->withFlashDanger($this->getMessage());
    }
}