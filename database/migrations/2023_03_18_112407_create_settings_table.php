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
            $table->id();
            $table->text('logo')->nullable();
            $table->text('bg_img')->nullable();

            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('sub_title_ar')->nullable();
            $table->string('sub_title_en')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('address_en')->nullable();

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('location')->nullable();
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
