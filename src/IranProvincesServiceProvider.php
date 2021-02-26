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
            //config
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

    protected function publishResources()
    {
        $publishingArray = [


            //migrations
            __DIR__ . '/Database/migrations/create_iran_provinces_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_iran_provinces_table.php'),

            //seeders
            __DIR__ . '/Database/Seeders/IranProvincesTableSeeder.php' => database_path('seeders/IranProvincesTableSeeder.php')

        ];

        if ((bool)config('Iran_provinces.cities')) {
            //cities files
            $publishingArray[__DIR__ . '/Database/migrations/create_iran_cities_table.php'] = database_path('migrations/' . date('Y_m_d_His', time()) . '_create_iran_cities_table.php');
            $publishingArray[__DIR__ . '/Database/Seeders/IranProvincesCitiesTableSeeder.php'] = database_path('seeders/IranProvincesCitiesTableSeeder.php');
        }
        return $publishingArray;
    }
}
