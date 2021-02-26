<?php

namespace MahdiAbbariki\IranProvinces\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IranProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->resourceArray() as $id => $province) {
            $array = [
                "id" => $id,
                "name" => $province
            ];
            if (config('iran_provinces.timestamps'))
                $array["created_at"] = $array["updated_at"] = Carbon::now();
            DB::table(config('iran_provinces.provinces_table_name'))->insert($array);
        }
    }

    protected function resourceArray(): array
    {
        return [
            1 => "آذربایجان شرقی",
            2 => "آذربایجان غربی",
            3 => "اردبیل",
            4 => "اصفهان",
            5 => "البرز",
            6 => "ایلام",
            7 => "بوشهر",
            8 => "تهران",
            9 => "چهارمحال بختیاری",
            10 => "خراسان جنوبی",
            11 => "خراسان رضوی",
            12 => "خراسان شمالی",
            13 => "خوزستان",
            14 => "زنجان",
            15 => "سمنان",
            16 => "سیستان و بلوچستان",
            17 => "فارس",
            18 => "قزوین",
            19 => "قم",
            20 => "کردستان",
            21 => "کرمان",
            22 => "کرمانشاه",
            23 => "کهکیلویه و بویراحمد",
            24 => "گلستان",
            25 => "گیلان",
            26 => "لرستان",
            27 => "مازندران",
            28 => "مرکزی",
            29 => "هرمزگان",
            30 => "همدان",
            31 => "یزد",

        ];
    }
}
