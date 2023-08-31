<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
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
                'user_id' => 2,
                'driver_id' => 4,
                'order_id' => 2,
                'date' => Carbon::now(),
                'price' => 20,
                'status' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'user_id' => 2,
                'driver_id' => 4,
                'order_id' => 3,
                'date' => Carbon::now(),
                'price' => 20,
                'status' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],

            [
                'user_id' => 2,
                'driver_id' => 4,
                'order_id' => 4,
                'date' => Carbon::now(),
                'price' => 20,
                'status' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
        ];

        DB::table('offers')->insert($data);
    }
}
