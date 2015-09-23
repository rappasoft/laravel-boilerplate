<?php namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use App\Helpers\Installer\CheckRequirements;

/**
 * Class RequirementsController
 * @package App\Http\Controllers\Installer
 */
class RequirementsController extends Controller {

    /**
     * @param CheckRequirements $requirements
     * @return mixed
     */
    public function index(CheckRequirements $requirements) {
        return view('installer.requirements')
            ->withRequirements($requirements->check(config('installer.requirements')));
    }
}