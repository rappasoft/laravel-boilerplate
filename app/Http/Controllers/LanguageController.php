<?php

namespace App\Http\Controllers;

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
    public function __invoke($locale)
    {
        if (array_key_exists($locale, config('locale.languages'))) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
