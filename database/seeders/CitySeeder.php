<?php

namespace Database\Seeders;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
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
                'name_ar' => 'الرياض',
                'name_en' => 'Riyadh',
                'created_at' => Carbon::now()

            ],
            [
                'name_ar' => 'جده',
                'name_en' => 'Jaddah',
                'created_at' => Carbon::now()

            ],
        ];

        DB::table('cities')->insert($data);
    }
}
