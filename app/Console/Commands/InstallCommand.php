<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\FilesystemManager;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boilerplate:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will start an interactive installation process';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Laravel Boilerplate Installation');

        $this->createEnvFile();

        if (strlen(config('app.key')) === 0) {
            $this->call('key:generate');
            $this->line('Application Key properly generated');
        }

        $this->updateEnvironmentFile($this->requestDatabaseCredentials());

        $this->call('cache:clear');

        $this->info('Installation complete. Happy Developing');
    }

    /**
     * Update the .env file from an array of $key => $value pairs.
     *
     * @param  array $updatedValues
     * @return void
     */
    protected function updateEnvironmentFile($updatedValues)
    {
        $envFile = $this->laravel->environmentFilePath();
        foreach ($updatedValues as $key => $value) {
            file_put_contents($envFile, preg_replace(
                "/{$key}=(.*)/",
                "{$key}={$value}",
                file_get_contents($envFile)
            ));
        }
    }

    /**
     * Request the local database details from the user.
     *
     * @return array
     */
    protected function requestDatabaseCredentials()
    {
        return [
            'DB_DATABASE' => $this->ask('Database name'),
            'DB_USERNAME' => $this->ask('Database user'),
            'DB_PASSWORD' => $this->secret('Database password'),
        ];
    }

    /**
     * Create the initial .env file.
     */
    protected function createEnvFile()
    {
        if (!file_exists('.env')) {
            copy(base_path('.env.example'), base_path('.env'));
            $this->line('.env file successfully created');
        }
    }
}
