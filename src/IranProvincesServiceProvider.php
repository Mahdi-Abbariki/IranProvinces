<?php

namespace MahdiAbbariki\IranProvinces;

use Illuminate\Support\ServiceProvider;
use MahdiAbbariki\IranProvinces\Console\CreateConfigFile;
use MahdiAbbariki\IranProvinces\Console\DatabaseMigrationAndSeeder;

class IranProvincesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/Iran_provinces.php', 'iran_provinces');
        $this->publishes([
            __DIR__ . '/Config/Iran_provinces.php' => config_path('iran_provinces.php'),
        ], "config");
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateConfigFile::class,
                DatabaseMigrationAndSeeder::class
            ]);
        }
    }
}
