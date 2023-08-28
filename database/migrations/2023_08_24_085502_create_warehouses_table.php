<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar')->comment('اسم المخزن');
            $table->string('name_en')->comment('اسم المخزن');
            $table->longText('details_ar')->nullable()->comment('تفاصيل المخزن');
            $table->longText('details_en')->nullable()->comment('تفاصيل المخزن');
            $table->unsignedBigInteger('city_id')->comment('مكان المخزن');
            $table->text('lan');
            $table->text('lat');
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('warehouses');
    }
}
