<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_travel')->unsigned();
            $table->integer('id_car')->unsigned();
            $table->char('nik','16')->unique();
            $table->char('number_sim', '16')->unique();
            $table->string('name', '50');
            $table->enum('gender', ['m', 'f']);
            $table->string('email', '30')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->text('path_avatar')->nullable();
            $table->text('address');
            $table->string('telephone', '13');
            $table->text('api_token');
            $table->rememberToken();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('drivers');
    }
}
