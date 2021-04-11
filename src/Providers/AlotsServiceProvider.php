<?php

namespace Durranilab\Alots\Providers;

use Illuminate\Support\ServiceProvider;
use Durranilab\Alots\Alots;
use Durranilab\Alots\Api;

class AlotsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishConfiguration();
        $this->publishMigrations();
    }

    public function register()
    {
        $config = __DIR__ . '/../../config/alots.php';
        $this->mergeConfigFrom($config, 'alots');

        $this->app->singleton(Alots::class, function ($app) {
            $alotsConfig = config('alots');

            return new Alots(
                $alotsConfig['username'],
                $alotsConfig['api_key'],
                $alotsConfig['sender_id']
            );
        });

        $this->app->alias(Alots::class, 'alots');
    }

    public function provides()
    {
        return ['Alots'];
    }

    public function publishConfiguration()
    {
        $path   =   realpath(__DIR__.'/../../config/alots.php');
        $this->publishes([$path => config_path('alots.php')], 'config');
    }

    public function publishMigrations()
    {
        $this->publishes([
            __DIR__.'/../../database/migrations/' => database_path('/migrations')
        ], 'migrations');
    }
}
