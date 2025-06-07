<?php

namespace syderbit\ModuleManagement\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MakeModule extends Command
{
    protected $signature = 'make:module-lmm {name}';
    protected $description = 'Generate a new module under resources/modules with Laravel Module Management';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::studly($this->argument('name'));
        $basePath = resource_path("modules/{$name}");

        $paths = [
            "{$basePath}/app/Http/Controllers",
            "{$basePath}/resources/assets/js",
            "{$basePath}/resources/views",
        ];


        foreach ($paths as $path) {
            File::makeDirectory($path, 0755, true, true);
        }

        //View
        $nameLower = Str::lower($name);
        File::put("{$basePath}/resources/views/{$nameLower}view.blade.php", "<h1>Module {$name}</h1>");
        File::put("{$basePath}/resources/assets/js/{$nameLower}.js", "");


        // Buat controller dari stub
        $stubPath = __DIR__ . '/../../stubs/ModuleController.stub';
        $controllerContent = str_replace(
            [
                'DummyNamespace',
                'DummyClass',
                'DummyView',
                'DummyViewname',
            ],
            [
                "Modules\\{$className}\\Http\\Controllers",
                "{$className}Controller",
                $nameLower,
                "{$nameLower}view",
            ],
            file_get_contents($stubPath)
        );

        //Module
        File::put("{$basePath}/app/Http/Controllers/{$className}Controller.php", $controllerContent);
        $this->info("Module '{$name}' created in resources/modules/{$name}");
    }
}
