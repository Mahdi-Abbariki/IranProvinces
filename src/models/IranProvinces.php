<?php

namespace MahdiAbbariki\IranProvinces\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class IranProvinces extends Model
{
    use HasFactory;

    public function getTable()
    {
        return config('iran_provinces.provinces_table_name');
    }

    public function cities(): ?Relation
    {
        if ((bool)config('iran_provinces.cities'))
            return $this->hasMany(IranCities::class, "province_id", "id");
        else
            return null;
    }
}
