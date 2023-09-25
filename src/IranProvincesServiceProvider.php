<?php

namespace MahdiAbbariki\IranProvinces;

use Illuminate\Support\ServiceProvider;
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
        $this->mergeConfigFrom(__DIR__ . '/Config/IranProvinces.php', 'iranProvinces');
        $this->publishes([
            __DIR__ . '/Config/IranProvinces.php' => config_path('iranProvinces.php'),
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
                IranProvincesSeeder::class,
            ]);
        }
    }
}
