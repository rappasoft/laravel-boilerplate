<?php namespace App\Http\Controllers\Installer;

use App\Helpers\Installer\DatabaseHelper;
use App\Http\Controllers\Controller;

/**
 * Class DatabaseController
 * @package App\Http\Controllers\Installer
 */
class DatabaseController extends Controller {

    /**
     * @param DatabaseHelper $database
     * @return mixed
     */
    public function index(DatabaseHelper $database)
    {
        return view('installer.database')
            ->withResult($database->migrateAndSeed());
    }
}