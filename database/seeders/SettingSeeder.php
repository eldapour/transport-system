<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
                'name_ar' => 'ان تي اكسبريس',
                'name_en' => 'NTexpress',
                'logo' => 'uploads/settings/logo.png',
                'conditions_ar' => 'شروط وأحكام النقل :  يحظر شحن النقود والذهب والأدوية وما ينسى النظام على منعه
الناقل غير مسؤول عن أي اضرار او تلف لاي بساحة قابلة للكسر الهاء التحميل أو الطبيعية بالحراسة المرورية او الحريق او الكرا
القصب تمويلي عن فقدان اي ارسالية قيمة الارسالية الخاصة بناقل أو (100) مائة ريال عالم باقي على غير ذلك
محتوى اي ارسالية النقل غير مسؤولة
الناقل غير مسؤول عن أي ارسالية لم يستلمها المرسل
ستلام والتوقيع نسخة الوثيقة القبولاً بكافة شروط النقل
الحق في التعليق في إرساليات يتضح الناقل أنها التهاب شروط النقل
حدة النقل المثقل عليها خمسة أيام، ولا يحق للموصل تقديم شكوى قبل لتلك الفترة',
                'conditions_en' => 'Transportation Terms & Conditions : 1. is forbidden to ship cash, gold and medicines What the system atipulates la impermissible
2. The carrier is not responsible for any damage or damage to any goods subject to breakage during loading traffic accidents, fire or natural disasters
3. Maximum compensation for the loss of any consignment, the value of the consignment belonging to a carrier, or a maximum of (100) one hundred rats, unless otherwise agreed.
4. Transport is not responsible for the content of any consignment.
5. The carrier is not responsible for any consignment that has not been received by the addressee and has not been received by the sender after the lapse of twenty-one(21) days.
6. Receiving and Signing the policy copy as acceptance of all the Transport conditions.
7. The right to suspend any consignments that the carrier finds to be in violation of the Conditions of Carriage.
B. The agreed period of transport is five days, and the sender has no right to complain before that period',
                'shipment_price' => 30,
            ]);
    }
}
