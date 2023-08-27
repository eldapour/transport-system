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
            $table->longText('image');
            $table->unsignedBigInteger('from_warehouse');
            $table->unsignedBigInteger('to_warehouse');
            $table->unsignedBigInteger('weight');
            $table->unsignedBigInteger('qty');
            $table->double('value','10,2');
            $table->text('type');
            $table->enum('status',['hanging','waiting','complete']);
            $table->longText('description');

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('from_warehouse')
                ->on('warehouses')
                ->references('id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('to_warehouse')
                ->on('warehouses')
                ->references('id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

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
