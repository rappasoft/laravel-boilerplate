<?php

namespace App\Http\Controllers;

use app;

/**
 * Class LocaleController.
 */
class LocaleController
{
    /**
     * @param $locale
     * @return \Illuminate\Http\RedirectResponse
     *  @return mixed|\Illuminate\Contracts\Foundation\Application

     */
    public function change($locale)
    {
        app()->setLocale($locale);

        session()->put('locale', $locale);

        return redirect()->back();
    }
}
