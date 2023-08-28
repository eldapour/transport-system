<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name_ar' => 'مخزن الحانه',
                'name_en' => 'Diriyah Governorate',
                'lat' => '24.713552',
                'lan' => '46.675297',
                'city_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],


            [
                'name_ar' => 'مخزن المجمع',
                'name_en' => 'Complex Governorate',
                'lat' => '24.713552',
                'lan' => '46.675297',
                'city_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],

            [
                'name_ar' => 'مخزن الغاط',
                'name_en' => 'Al-Ghat Governorate',
                'lat' => '24.713552',
                'lan' => '46.675297',
                'city_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],

            [
                'name_ar' => 'مخزن الخرج',
                'name_en' => 'Al-Kharj',
                'lat' => '24.713552',
                'lan' => '46.675297',
                'city_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
        ];

        DB::table('warehouses')->insert($data);
    }
}
