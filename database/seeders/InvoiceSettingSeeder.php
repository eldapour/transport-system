<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSettingSeeder extends Seeder
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
                'company_name_ar' => 'شركة الوطنى السريع للنقليات',
                'company_name_en' => 'national express transport company',
                'location_ar' => 'طريق ابن العميد , السلى',
                'location_en' => 'Ibn al-ameed road, al-sulay',
                'po_box' => '2417: الرياض ,14273 المملكة العربية',
                'cr_no' => '1010352157',
                'vat_no' => '310365617400003',
                'vat' => '15',
                'created_at' => Carbon::now()

            ]
        ];

        DB::table('invoice_settings')->insert($data);
    }
}
