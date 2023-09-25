<?php

namespace MahdiAbbariki\IranProvinces\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Province extends Model
{
    use HasFactory;

    public function getTable()
    {
        return config('iranProvinces.provinces_table_name');
    }

    public function cities(): ?Relation
    {
        if ((bool)config('iranProvinces.cities'))
            return $this->hasMany(City::class, "province_id", "id");
        else
            return null;
    }
}
