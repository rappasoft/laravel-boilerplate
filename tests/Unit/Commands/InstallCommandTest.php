<?php

namespace Tests\Unit\Commands;

use Illuminate\Support\Facades\File;
use Mockery;
use Tests\TestCase;

class InstallCommandTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        File::move(base_path('.env'), base_path('.env.backup'));
        config(['app.key' => '']);
    }

    public function tearDown()
    {
        parent::tearDown();
        File::move(base_path('.env.backup'), base_path('.env'));
    }


    /** @test */
    function it_creates_the_example_file()
    {
        $this->assertFileNotExists('.env');
        $this->artisan('boilerplate:install', ['--no-interaction' => true]);
        $this->assertFileExists(base_path('.env'));
    }

    /** @test */
    function it_generates_an_app_key()
    {
        $key = 'APP_KEY';
        $this->artisan('boilerplate:install', ['--no-interaction' => true]);
        $this->assertStringStartsWith('base64:', $this->getEnvValue($key));
    }

    /** @test */
    function it_sets_the_database_env_config()
    {
        $command = Mockery::mock("App\Console\Commands\InstallCommand[ask,secret]", function ($mock) {
            $mock->shouldReceive('ask')->with('Database name')->andReturn('mydatabase');
            $mock->shouldReceive('ask')->with('Database user')->andReturn('johndoe');
            $mock->shouldReceive('secret')->with('Database password')->andReturn('password');
        });
        app('Illuminate\Contracts\Console\Kernel')->registerCommand($command);

        $this->artisan('boilerplate:install', ['--no-interaction' => true]);

        $this->assertEquals('mydatabase', $this->getEnvValue('DB_DATABASE'));
        $this->assertEquals('johndoe', $this->getEnvValue('DB_USERNAME'));
        $this->assertEquals('password', $this->getEnvValue('DB_PASSWORD'));
    }

    /**
     * returns value of an environment variable
     * @param $key
     * @return mixed
     */
    protected function getEnvValue($key)
    {
        $file = file_get_contents(base_path('.env'));
        preg_match("/{$key}=(.*)/", $file, $matches);
        return $matches[1];
    }
}
