<?php namespace App\Http\Controllers;

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