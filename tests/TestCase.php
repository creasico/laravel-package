<?php

namespace Creasi\Tests;

use Creasi\Package\ServiceProvider;
use Illuminate\Config\Repository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use RefreshDatabase;
    use DatabaseMigrations;

    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app->useEnvironmentPath(\dirname(__DIR__));

        tap($app->make('config'), function (Repository $config) {
            $config->set('app.locale', 'id');
            $config->set('app.faker_locale', 'id_ID');

            if (env('DB_CONNECTION', 'sqlite')) {
                $config->set('database.default', 'sqlite');

                $database = __DIR__.'/test.sqlite';

                if (! file_exists($database)) {
                    touch($database);
                }

                $config->set('database.connections.sqlite', [
                    'driver' => 'sqlite',
                    'database' => $database,
                    'foreign_key_constraints' => true,
                ]);
            }
        });
    }
}
