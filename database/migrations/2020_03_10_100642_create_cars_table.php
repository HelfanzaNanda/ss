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
            $table->integer('id_travel')->unsigned();
            $table->string('number_plate', '11')->unique();
            $table->string('name', '30');
            $table->string('from', '30');
            $table->string('to', '30');
            $table->integer('price');
            $table->text('picture_travel')->nullable();
            $table->integer('seat');
            $table->string('facility', '50');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('id_travel')->references('id')->on('admin_travels')->onDelete('CASCADE');
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
