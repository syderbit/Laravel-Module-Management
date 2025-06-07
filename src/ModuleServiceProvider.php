<?php

namespace syderbit\ModuleManagement;

use Illuminate\Support\ServiceProvider;
use syderbit\ModuleManagement\Console\MakeModule;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            MakeModule::class,
        ]);
    }

    public function boot()
    {
        //
    }
}
