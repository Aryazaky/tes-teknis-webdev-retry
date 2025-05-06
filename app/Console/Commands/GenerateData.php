<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class GenerateData extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-data {name} {--fields=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new data class';

    /**
     * The name of the default stub file for the generator.
     *
     * @var string
     */
    protected function getStub(): string
    {
        return __DIR__.'/stubs/data.stub';
    }

    protected function buildClass($name)
    {
        $class = parent::buildClass($name);

        $fieldsOption = $this->option('fields');
        $fieldLines = '';

        if ($fieldsOption) {
            $fields = explode(',', $fieldsOption);

            $fieldLines = collect($fields)
                ->map(function ($field) {
                    [$name, $type] = explode(':', $field);
                    return "public {$type} \${$name};";
                })
                ->implode("\n");
        }

        return str_replace('{{fields}}', $fieldLines, $class);
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Data';
    }
}
