<?php

namespace MahdiAbbariki\IranProvinces\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use MahdiAbbariki\IranProvinces\Models\City;
use MahdiAbbariki\IranProvinces\Models\Province;

class IranProvincesSeeder extends Command
{
    protected $signature = 'province:seed';

    protected $description = 'Run the seeders to populate data for provinces and cities according to the configuration file.';

    public function handle()
    {
            if (Schema::hasTable(config('iranProvinces.provinces_table_name')) && !Province::count()) // check if the table is present and empty
                $this->callSilent('db:seed', [
                    '--class' => 'MahdiAbbariki\IranProvinces\Database\Seeders\IranProvincesTableSeeder',
                    '--force' => true
                ]);


            if (config('iranProvinces.cities'))
                if (Schema::hasTable(config('iranProvinces.cities_table_name')) && !City::count())// check if the table is present and empty
                    $this->callSilent('db:seed', [
                        '--class' => 'MahdiAbbariki\IranProvinces\Database\Seeders\IranProvincesCitiesTableSeeder',
                        '--force' => true
                    ]);
            $this->info('Successful. enjoy developing :)');

    }
}
