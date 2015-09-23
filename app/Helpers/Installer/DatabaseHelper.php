<?php namespace App\Helpers\Installer;

use Exception;
use Illuminate\Support\Facades\Artisan;

/**
 * Class DatabaseHelper
 * @package App\Helpers\Installer
 */
class DatabaseHelper {

    /**
     * Migrate and seed the database.
     *
     * @return array
     */
    public function migrateAndSeed()
    {
        $this->generateKey();
        return $this->migrate();
    }

    /**
     * Run the migration and call the seeder.
     *
     * @return array
     */
    private function migrate()
    {
        try{
            Artisan::call('migrate');
        }
        catch(Exception $e){
            return $this->errorResponse($e->getMessage());
        }

        return $this->seed();
    }

    /**
     * Seed the database.
     *
     * @return array
     */
    private function seed()
    {
        try{
            Artisan::call('db:seed');
        }
        catch(Exception $e){
            return $this->errorResponse($e->getMessage());
        }

        return $this->successResponse();
    }

    /**
     * @return array
     */
    private function generateKey() {
        Artisan::call('key:generate');
    }

    /**
     * Return a formatted error messages.
     *
     * @param $message
     * @return array
     */
    private function errorResponse($message)
    {
        return array(
            'errors' => [
                'message' => $message
            ]
        );
    }

    /**
     * Return the success message.
     *
     * @return array
     */
    private function successResponse()
    {
        return array(
            'success' => [
                'code' => 200
            ]
        );
    }
}