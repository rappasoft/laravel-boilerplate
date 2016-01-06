<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;

/**
 * Class LanguageController
 * @package App\Http\Controllers
 */
class LanguageController extends Controller
{
    /**
     * @param $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function swap($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}