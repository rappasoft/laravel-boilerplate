<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

/**
 * Class LanguageController.
 */
class LanguageController extends Controller
{
    /**
     * @param $locale
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function swap($locale)
    {
        if (array_key_exists($locale, config('locale.languages'))) {

            Session::put('locale', $locale);
            
        }

        return redirect()->back();
    }
}
