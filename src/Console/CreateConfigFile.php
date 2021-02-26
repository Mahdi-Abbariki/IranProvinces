<?php

namespace MahdiAbbariki\IranProvinces\Console;

use Illuminate\Console\Command;

class CreateConfigFile extends Command
{
    protected $signature = 'province:config';

    protected $description = 'Create the starter config file';

    public function handle()
    {
        if (file_exists(config_path('iran_provinces.php')))
            $this->comment('configuration file has already been published.');
        else {
            $this->info('Publishing the configuration file...');
            $this->callSilently('vendor:publish', [
                '--provider' => "MahdiAbbariki\IranProvinces\IranProvincesServiceProvider",
                '--tag' => "config"
            ]);
            $this->comment('Successful. EDIT the configuration file and then run <province:database>');
        }
    }
}
