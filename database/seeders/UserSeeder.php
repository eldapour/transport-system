<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'Ahmed Saad',
                'email' => 'ahmed@ahmed.com',
                'password' => Hash::make('123456'),
                'national_id' => 2345678987654,
                'image' => 'uploads/users/avatar.png',
                'phone' => '965433433',
                'city_id' => 1,
                'type' => 'user',
                'user_type' => 'person',
                'status' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Eslam Mohamed',
                'email' => 'eslam@eslam.com',
                'password' => Hash::make('123456'),
                'national_id' => 2225678987654,
                'image' => 'uploads/users/avatar.png',
                'phone' => '9654334666',
                'city_id' => 1,
                'type' => 'driver',
                'user_type' => null,
                'status' => 1,
                'created_at' => Carbon::now()

            ],
            [
                'name' => 'abdallah alhumsi',
                'email' => 'abdallah@abdallah.com',
                'password' => Hash::make('123456'),
                'national_id' => 2343333987654,
                'image' => 'uploads/users/avatar.png',
                'phone' => '965433422666',
                'city_id' => 1,
                'type' => 'user',
                'user_type' => 'company',
                'status' => 1,
                'created_at' => Carbon::now()

            ],
            [
                'name' => 'Client',
                'email' => 'eslamana888@gmail.com',
                'password' => Hash::make('123456'),
                'national_id' => 6620098763,
                'image' => 'uploads/users/avatar.png',
                'phone' => '01062933188',
                'city_id' => 1,
                'type' => 'user',
                'user_type' => 'company',
                'status' => 1,
                'created_at' => Carbon::now()

            ]
        ];
        DB::table('users')->insert($data);
    }
}
