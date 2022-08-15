<?php

namespace Creasi\Laravel\Package;

use Creasi\Laravel\Package;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    private const LIB_PATH = __DIR__.'/../..';

    public function boot()
    {
        // .
    }

    public function register()
    {
        $this->mergeConfigFrom(self::LIB_PATH.'/config/package.php', 'creasi.package');

        $this->app->bind(Package::class, function () {
            return new Package();
        });

        $this->app->alias(Package::class, 'creasi.package');
    }
}
