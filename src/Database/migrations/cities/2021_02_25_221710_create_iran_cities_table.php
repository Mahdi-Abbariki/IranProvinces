<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIranCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("province_id");
            $table->string('name');
            if (config('iran_provinces.cities_lat_long')) {
                $table->decimal("latitude", 10, 8)->nullable();
                $table->decimal("longitude", 10, 8)->nullable();
            }
            if (config('iran_provinces.timestamps'))
                $table->timestamps();
        });
    }

    public function getTableName(): string
    {
        return config('iran_provinces.cities_table_name');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->getTableName());
    }
}


