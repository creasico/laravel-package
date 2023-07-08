<?php

namespace Creasi\Package;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    private const LIB_PATH = __DIR__.'/..';

    public function boot()
    {
        if (app()->runningInConsole()) {
            $this->registerPublishables();

            $this->registerCommands();
        }

        $this->loadTranslationsFrom(self::LIB_PATH.'/resources/lang', 'creasico');
    }

    public function register()
    {
        if (! app()->configurationIsCached()) {
            $this->mergeConfigFrom(self::LIB_PATH.'/config/package.php', 'creasi.package');
        }

        $this->app->bind('creasi.package', function () {
            return new class
            {
                public function lorem()
                {
                    return 'Lorem ipsum';
                }
            };
        });

        if (app()->environment('testing')) {
            Factory::guessFactoryNamesUsing(function (string $modelName) {
                return Factory::$namespace.\class_basename($modelName).'Factory';
            });
        }
    }

    protected function registerPublishables()
    {
        $this->publishes([
            self::LIB_PATH.'/config/creasico.php' => \config_path('creasi/package.php'),
        ], ['creasi-config', 'creasi-package-config']);

        $this->publishes([
            self::LIB_PATH.'/resources/lang' => \resource_path('vendor/creasico'),
        ], ['creasi-lang', 'creasi-package-lang']);

        $migrations = self::LIB_PATH.'/database/migrations';

        $this->publishes([
            $migrations.'/2022_05_11_000001_create_package_table.php' => database_path('migrations/2022_05_11_000001_create_package_table.php'),
        ], ['creasi-db', 'creasi-package-db']);

        $this->loadMigrationsFrom($migrations);
    }

    protected function registerCommands()
    {
        $this->commands([]);
    }
}
