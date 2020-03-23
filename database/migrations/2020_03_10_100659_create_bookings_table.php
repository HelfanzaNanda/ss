<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_driver')->unsigned();
            $table->integer('price');
            $table->integer('total_seat');
            $table->integer('total_price');
            $table->date('day');
            $table->time('hour');
            $table->enum('status', ['0', '1', '2'])->default('1');
            $table->timestamps();

            $table->foreign('id_driver')->references('id')->on('drivers')->onDelete('CASCADE');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
