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
    protected $description = 'This command will start and interactive installation process';

    /**
     * @var FilesystemManager
     */
    protected $filesystem;

    public function __construct(FilesystemManager $filesystem)
    {
        parent::__construct();
        $this->filesystem = $filesystem;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        if (! $this->filesystem->disk('base')->exists('.env')) {
            $this->info('Copy .env.example to .env...');
            $this->filesystem->disk('base')->copy('.env.example', '.env');
            $this->info('Generating application key');
            $this->call('key:generate');
            $this->info('Updating database credentials...');
            $this->updateEnvironmentFile($this->requestDatabaseCredentials());
        } else {
            $this->info('.env file found. Abort installation...');
        }

        if (! $this->filesystem->disk('base')->exists('node_modules')) {
            $this->info('Download frontend dependencies...');
            exec('npm install');
            $this->info('Building Frontend...');
            $this->info('npm run dev');
        } else {
            $this->info('Frontend dependencies already installed. Skipping...');
        }

        $this->info('Installation finished!');
        $this->info('To migrate database run: php artisan migrate:fresh --seed');

        return $this;
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
            'DB_PASSWORD' => $this->secret('Database password ("null" for no password)'),
        ];
    }

    /**
     * Update the .env file from an array of $key => $value pairs.
     *
     * @param  array $updatedValues
     * @return void
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function updateEnvironmentFile($updatedValues)
    {
        foreach ($updatedValues as $key => $value) {
            $this->filesystem->disk('base')->put('.env', preg_replace(
                "/{$key}=(.*)/",
                "{$key}={$value}",
                $this->filesystem->disk('base')->get('.env')));
        }
    }
}
