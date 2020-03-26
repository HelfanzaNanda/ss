<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_travels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('license_number', '20')->unique();
            $table->string('business_owner', '30');
            $table->string('business_name', '30');
            $table->string('type', '20');
            $table->text('address');
            $table->string('email', '30')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text ('password')->nullable();
            $table->rememberToken();
            $table->text('path_avatar')->nullable();
            $table->string('telephone', '13');
            $table->enum('active', ['0', '1', '2'])->default('1');
            $table->string('activation_token')->nullable();
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
        Schema::dropIfExists('admin_travels');
    }
}
