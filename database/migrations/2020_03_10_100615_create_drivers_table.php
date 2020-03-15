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
            $table->string('name', '50');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('email', '30')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->text('path_avatar')->nullable();
            $table->rememberToken();
            $table->enum('status', ['0', '1'])->default('1');
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
