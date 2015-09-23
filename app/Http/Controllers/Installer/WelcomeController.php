<?php namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;

/**
 * Class WelcomeController
 * @package App\Http\Controllers\Installer
 */
class WelcomeController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('installer.welcome');
    }
}