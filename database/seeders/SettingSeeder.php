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
                'conditions_ar' => '<p>1-يحظر شحن النقود والذهب والادوية وما ينص النظام على منعه<br>2-الناقل غير مسئول عن اى اضرار او تلف لا بضاعة قابلة للكسر اثناء التحميل او الحوادث المرورية او الحريق او الكوارث الطبيعية<br>3-أقصى تعويض عن فقدان اى ارسالية قيمة الارسالية الخاصة بناقل او بحد اقصى (100) مائة ريال ما لم يتفق على غير ذلك<br>4- النقل غير مسئول عن محتوى اى ارسالية<br>5- الناقل غير مسئول عن اى ارسالية لم يستلمها المرسل اليه ولم يستقبلها المرسل بعد مرور 21 احدى وعشرون يوما<br>6- استلام وتوقيع نسخة الوثيقة قبولا بكافة شروط النقل<br>7- الحق فى تعليق اى ارساليات يتضح الناقل انها تنتهك شروط النقل<br>8- مدة النقل المتفق عليها خمسة ايام ولا يحق للمرسل تقديم شكوى قبل تلك الفترة<br>&nbsp;</p>',
                'conditions_en' => '<p>1- It is prohibited to ship money, gold, medicines, and anything prohibited by the system<br>2-The carrier is not responsible for any damage or damage to breakable goods during loading, traffic accidents, fire, or natural disasters.<br>3- The maximum compensation for the loss of any consignment is the value of the carrier’s consignment, or a maximum of (100) one hundred riyals, unless otherwise agreed upon.<br>4- Transport is not responsible for the content of any shipment<br>5- The carrier is not responsible for any shipment that the addressee has not received and the sender has not received after 21 twenty-one days.<br>6- Receive and sign a copy of the document accepting all conditions of transportation<br>7- The right to suspend any shipments that the carrier finds to be in violation of the conditions of transportation<br>8- The agreed upon transportation period is five days, and the sender does not have the right to file a complaint before that period</p>',
                'shipment_price' => 30,
            ]);
    }
}
