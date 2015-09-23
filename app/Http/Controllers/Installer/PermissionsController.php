<?php namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use App\Helpers\Installer\CheckPermissions;

/**
 * Class PermissionsController
 * @package App\Http\Controllers\Installer
 */
class PermissionsController extends Controller {

    /**
     * @param CheckPermissions $permissions
     * @return mixed
     */
    public function index(CheckPermissions $permissions)
    {
        return view('installer.permissions')
            ->withPermissions($permissions->check(config('installer.permissions')));
    }
}