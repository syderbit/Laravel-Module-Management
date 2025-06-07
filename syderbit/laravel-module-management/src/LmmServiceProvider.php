<?php

namespace syderbit\LmmServiceProvider;

use Illuminate\Support\ServiceProvider;
use syderbit\laravel-module-management\console\make-lmm;
class LmmServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            make-lmm::class,
        ]);
    }
}
