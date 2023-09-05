<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(WarehousesSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OfferSeeder::class);
        $this->call(InvoiceSettingSeeder::class);
    }
}
