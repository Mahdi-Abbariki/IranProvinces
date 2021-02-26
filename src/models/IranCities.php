<?php

namespace MahdiAbbariki\IranProvinces\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class IranCities extends Model
{
    use HasFactory;

    public function getTable()
    {
        return config('iran_provinces.cities_table_name');
    }

    public function province(): Relation
    {
        return $this->belongsTo(IranProvinces::class, "province_id", "id");
    }
}
