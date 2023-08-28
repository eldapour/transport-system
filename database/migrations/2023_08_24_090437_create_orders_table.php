<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->longText('image')->comment('صوره الشحنه');
            $table->unsignedBigInteger('from_warehouse')->comment('من المخزن الرئيسي');
            $table->unsignedBigInteger('to_warehouse')->comment('الي المخزن الفرعي');
            $table->double('weight',10,2)->comment('وزن الحموله');
            $table->integer('qty')->comment('الكميه');
            $table->double('value',10,2)->comment('قيمه البضاعه');
            $table->text('type')->comment('نوع الشحنه');
            $table->enum('status',['hanging','waiting','complete'])->comment('حاله الشحنه معلقه او في انتظار الدفع او مكتمله');
            $table->longText('description')->comment('تفاصيل الشحنه');
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('from_warehouse')->on('warehouses')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('to_warehouse')->on('warehouses')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('orders');
    }
}
