<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('driver_id');
            $table->bigInteger('order_id');
            $table->dateTime('date');
            $table->double('price','10,2');
            $table->boolean('status')
                ->default(false)->comment('1 => accepted, 0 => rejected');
            $table->foreign('user_id')
                ->on('users')
                ->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('driver_id')
                ->on('users')
                ->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('order_id')
                ->on('orders')
                ->references('id')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('offers');
    }
}
