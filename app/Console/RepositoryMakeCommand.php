<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class RepositoryMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:repository';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class.';
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('base')) {
            return __DIR__.'/stubs/baseRepository.stub';
        }

        return __DIR__.'/stubs/repository.stub';
    }

    /**
     * Build the model class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        if ($this->option('model-name')) {
            $modelName = ucfirst($this->option('model-name'));
            return $this->replaceTable($stub,$modelName);
        }

    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
    }

    /**
     * Replace the table for the given stub.
     *
     * @param $stub
     * @param $modelName
     * @return mixed
     */
    protected function replaceTable(&$stub,$modelName)
    {
        $stub = str_replace(
            'DummyModel', $modelName, $stub
        );

        return $stub;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['base', 'b', InputOption::VALUE_NONE, 'Create the base repository.'],
            ['model-name', null, InputOption::VALUE_REQUIRED, 'Define Model name.'],
        ];
    }
}
