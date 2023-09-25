<?php

namespace MahdiAbbariki\IranProvinces\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class City extends Model
{
    use HasFactory;

    public function getTable()
    {
        return config('iran_provinces.cities_table_name');
    }

    public function province(): Relation
    {
        return $this->belongsTo(Province::class, "province_id", "id");
    }
}
