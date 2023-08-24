<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->text('main_img');
            $table->text('images');
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('address_ar');
            $table->string('address_en');
            $table->enum('type',['villa','house']);

            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->integer('kitchen');
            $table->integer('livingroom');

            $table->unsignedBigInteger('services_id');

            $table->foreign('services_id', 'services')
                ->references('id')->on('services')
                ->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('buildings');
    }
}
