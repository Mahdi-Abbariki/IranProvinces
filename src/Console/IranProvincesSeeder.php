<?php

namespace MahdiAbbariki\IranProvinces\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use IranProvinces\models\IranCities;
use IranProvinces\models\IranProvinces;

class IranProvincesSeeder extends Command
{
    protected $signature = 'province:seed';

    protected $description = 'Run the seeders to populate data for provinces and cities according to the configuration file.';

    public function handle()
    {
        if (!file_exists(config_path('iran_provinces.php')))
            $this->error('configuration file has not been published run <province:config>');
        else {
            if (Schema::hasTable(config('iran_provinces.provinces_table_name')) && !IranProvinces::count()) // check if the table is present and empty
                $this->callSilent('db:seed', [
                    '--class' => 'MahdiAbbariki\IranProvinces\Database\Seeders\IranProvincesTableSeeder',
                    '--force' => true
                ]);


            if (config('iran_provinces.cities'))
                if (Schema::hasTable(config('iran_provinces.cities_table_name')) && !IranCities::count())// check if the table is present and empty
                    $this->callSilent('db:seed', [
                        '--class' => 'MahdiAbbariki\IranProvinces\Database\Seeders\IranProvincesCitiesTableSeeder',
                        '--force' => true
                    ]);
            $this->info('Successful. enjoy developing :)');
        }


    }
}
