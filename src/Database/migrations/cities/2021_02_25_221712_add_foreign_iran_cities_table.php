<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignIranCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (config('iran_provinces.cities')) {
            Schema::table($this->getTableName(), function (Blueprint $table) {
                $table->foreign('province_id')->references('id')->on(config('iran_provinces.provinces_table_name'));
            });
        }

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
        Schema::table($this->getTableName(), function (Blueprint $table) {
            $table->dropForeign('province_id');
        });
    }
}


