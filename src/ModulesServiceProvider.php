<?php

namespace syderbit\ModuleManagement;

use Illuminate\Support\ServiceProvider;
use syderbit\ModuleManagement\Console\MakeModule;

class ModulesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }
    public function register()
    {
        $this->commands([
            MakeModule::class,
        ]);
    }

    
}
