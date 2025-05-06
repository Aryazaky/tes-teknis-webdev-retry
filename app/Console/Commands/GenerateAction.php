<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class GenerateAction extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:action {name} {--data=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new action class';

    /**
     * The name of the default stub file for the generator.
     *
     * @var string
     */
    protected function getStub(): string
    {
        return __DIR__.'/stubs/action.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Actions';
    }

    protected function buildClass($name)
    {
        $class = parent::buildClass($name);

        $dataClass = $this->option('data');

        // If data class is provided, use it and its short name
        $useLine = '';
        $arg = '';

        if ($dataClass) {
            $shortDataClass = class_basename($dataClass);
            $useLine = "use {$dataClass};";
            $arg = "{$shortDataClass} \$data";
        }

        return str_replace(
            [
                '{{dataclass}}',
                '{{dataclass-nameonly}}',
            ],
            [
                $useLine,
                $arg,
            ],
            $class
        );
    }

}
