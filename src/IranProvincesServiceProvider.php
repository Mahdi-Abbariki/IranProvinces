<?php

namespace MahdiAbbariki\IranProvinces;

use Illuminate\Support\ServiceProvider;
use MahdiAbbariki\IranProvinces\Console\CreateConfigFile;
use MahdiAbbariki\IranProvinces\Console\DatabaseMigrationAndSeeder;
use MahdiAbbariki\IranProvinces\Console\IranProvincesSeeder;

class IranProvincesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/Database/migrations/cities' => database_path('migrations'),
                __DIR__ . '/Database/migrations/provinces' => database_path('migrations'),
                __DIR__ . '/Database/Seeders' => database_path('seeders'),
            ], 'iran-provinces-db-structure');
        }
        $this->mergeConfigFrom(__DIR__ . '/Config/Iran_provinces.php', 'iran_provinces');
        $this->publishes([
            __DIR__ . '/Config/Iran_provinces.php' => config_path('iranProvinces.php'),
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
                DatabaseMigrationAndSeeder::class,
                IranProvincesSeeder::class,
            ]);
        }
    }
}
