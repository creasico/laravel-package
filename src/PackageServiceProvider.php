<?php

namespace Creasi\Laravel;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // .
    }

    public function register()
    {
        $this->app->bind(Package::class, function () {
            return new Package();
        });

        $this->app->alias(Package::class, 'package');
    }
}
