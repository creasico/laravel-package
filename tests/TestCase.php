<?php

namespace Creasi\Tests;

use Creasi\Laravel\Facades\Package;
use Creasi\Laravel\PackageServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            PackageServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'package' => Package::class,
        ];
    }
}
