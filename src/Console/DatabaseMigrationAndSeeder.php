<?php

namespace MahdiAbbariki\IranProvinces\Console;

use Illuminate\Console\Command;

class DatabaseMigrationAndSeeder extends Command
{
    protected $signature = 'province:database';

    protected $description = 'Create the Tables and run Seeders';

    public function handle()
    {
        if (!file_exists(config_path('iran_provinces.php')))
            $this->error('configuration file has not been published run <province:config>');
        else {
            $pkgDir = substr(__DIR__, strlen(base_path()) + 1);
            $this->info('Migrations and Seeding has started...');
            $this->callSilent('migrate', [
                '--path' => $pkgDir . "/../Database/migrations/provinces",
            ]);

            if (config('iran_provinces.cities'))
                $this->callSilent('migrate', [
                    '--path' => $pkgDir . "/../Database/migrations/cities",
                ]);

            $this->callSilent('db:seed', [
                '--class' => 'MahdiAbbariki\IranProvinces\Database\Seeders\IranProvincesTableSeeder',
                '--force' => true
            ]);
            if (config('iran_provinces.cities'))
                $this->callSilent('db:seed', [
                    '--class' => 'MahdiAbbariki\IranProvinces\Database\Seeders\IranProvincesCitiesTableSeeder',
                    '--force' => true
                ]);
            $this->info('Migrations and Seeding has finished');
            $this->line("");

            $this->comment('Successful. enjoy developing :)');
        }


    }
}
