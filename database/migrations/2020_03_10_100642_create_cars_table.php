<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_driver')->unsigned();
            $table->integer('number_plate')->unique();
            $table->string('from', '30');
            $table->string('to', '30');
            $table->integer('price');
            $table->text('picture_travel')->nullable();
            $table->integer('seat');
            $table->timestamps();

            $table->foreign('id_driver')->references('id')->on('drivers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
