<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar')->comment('اسم التطبيق');
            $table->string('name_en')->comment('اسم التطبيق');
            $table->longText('logo')->comment('لوجو التطبيق');
            $table->longText('conditions_ar')->comment('الشروط والاحكام');
            $table->longText('conditions_en')->comment('الشروط والاحكام');
            $table->bigInteger('shipment_price')->comment('سعر الشحنه لكل');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
