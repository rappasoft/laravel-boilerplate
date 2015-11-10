<?php namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;

/**
 * Class LanguageController
 * @package App\Http\Controllers
 */
class LanguageController extends Controller
{
    function languageRoute($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}

