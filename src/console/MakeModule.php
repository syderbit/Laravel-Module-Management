<?php

namespace syderbit\ModuleManagement\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MakeModule extends Command
{
    protected $signature = 'make:module {name}';
    protected $description = 'Generate a new module under resources/modules';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $basePath = resource_path("modules/{$name}");

        $paths = [
            "{$basePath}/app/Http/Controllers",
            "{$basePath}/resources/assets/js",
            "{$basePath}/resources/views",
        ];

        foreach ($paths as $path) {
            File::makeDirectory($path, 0755, true, true);
        }

        File::put("{$basePath}/resources/views/index.blade.php", "<h1>Module {$name}</h1>");

        $this->info("Module '{$name}' created in resources/modules/{$name}");
    }
}
