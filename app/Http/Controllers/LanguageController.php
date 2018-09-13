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

    public function getCurrentLanguage()
    {
        return response()->json(['locale' => \Session::get('locale')]);
    }

    public function getResourceLanguage()
    {
        $locale_name = \Session::get('locale') == null ? env("APP_LOCALE") : \Session::get('locale');
        session()->put('locale', $locale_name);
        $dir = \App::langPath() . '/' . $locale_name;
        $files = scandir($dir, 1);
        if (count($files) > 0) {
            $resource = [];
            foreach ($files as $file) {
                $file_name = pathinfo($file, PATHINFO_FILENAME);
                array_push($resource, [
                    $file_name => \Lang::getLoader()->load(\Session::get('locale'), $file_name)
                ]);
            }
            return response()->json(
                [
                    'locale' => [
                        'code' => \Session::get('locale'), 'resources' => $resource
                    ]
                ]);
        }
        return response()->json(['locale' => ['code' => \Session::get('locale'), 'resources' => 'Recurso no encontrado']]);
    }

    public function changeLanguage($locale)
    {
        if (array_key_exists($locale, config('locale.languages'))) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
