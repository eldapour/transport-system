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
            $table->id();
            $table->bigInteger('user_id');
            $table->longText('image');
            $table->bigInteger('from_warehouse');
            $table->bigInteger('to_warehouse');
            $table->bigInteger('weight');
            $table->bigInteger('qty');
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
