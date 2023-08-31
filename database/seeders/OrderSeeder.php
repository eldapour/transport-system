<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
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

                'user_id' => 4,
                'image' => 'uploads/orders/1.png',
                'from_warehouse' => 2,
                'to_warehouse' => 3,
                'weight' => 1.00,
                'qty' => 10,
                'type' => 'شحنه رخام',
                'value' => 1000.00,
                'status' => 'hanging',
                'description' => 'نقل شحنة الرخام هو عملية تتطلب دقة وعناية خاصة لضمان وصول البضائع بسلامة تامة وبدون تلف. تشمل عملية نقل الرخام عدة خطوات متسلسلة تشمل التحضير والتعبئة والتحميل والنقل والتفريغ. إليك وصفاً لعملية نقل شحنة الرخام',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],


            [

                'user_id' => 4,
                'image' => 'uploads/orders/2.png',
                'from_warehouse' => 3,
                'to_warehouse' => 1,
                'weight' => 1.00,
                'qty' => 20,
                'type' => 'شحنه زجاج',
                'value' => 2000.00,
                'status' => 'waiting',
                'description' => 'نقل شحنة زجاج تُعتبر عملية حساسة تتطلب اهتمامًا واعية للتفاصيل وتقنيات متخصصة لضمان وصول الزجاج بسلامة وبدون تلف. إليك وصفًا لعملية نقل شحنة زجاج',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],



            [

                'user_id' => 4,
                'image' => 'uploads/orders/3.png',
                'from_warehouse' => 2,
                'to_warehouse' => 1,
                'weight' => 1.00,
                'qty' => 35,
                'type' => 'شحنه نقل اسماك',
                'value' => 9000.00,
                'status' => 'waiting',
                'description' => 'نقل شحنة أسماك يُعد عملية حساسة ومعقدة تتطلب اهتمامًا كبيرًا بالصحة والسلامة الغذائية وظروف النقل. إليك وصفًا لعملية نقل شحنة أسماك',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],

            [

                'user_id' => 4,
                'image' => 'uploads/orders/4.png',
                'from_warehouse' => 1,
                'to_warehouse' => 2,
                'weight' => 1.00,
                'qty' => 25,
                'type' => 'شحنه نقل بضائع',
                'value' => 4000.00,
                'status' => 'complete',
                'description' => 'نقل شحنة بضائع هو عملية متعددة المراحل تتطلب تخطيطًا دقيقًا وتنسيقًا فعالًا لضمان وصول البضائع بأمان وفي حالة جيدة إلى وجهتها. إليك وصفًا لعملية نقل شحنة بضائع',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
        ];

        DB::table('orders')->insert($data);
    }
}
