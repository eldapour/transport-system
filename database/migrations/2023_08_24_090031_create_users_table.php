<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('national_id')->unique()->nullable();
            $table->longText('image')->nullable();
            $table->string('phone')->unique();
            $table->unsignedBigInteger('city_id');
            $table->enum('type', ['driver', 'user']);
            $table->enum('user_type', ['person','company'])->nullable();
            $table->boolean('status')->default(true);
            $table->foreign('city_id')->on('cities')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('users');
    }
}
