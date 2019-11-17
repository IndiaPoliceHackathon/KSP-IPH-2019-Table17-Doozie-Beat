<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('police_name', 200);
            $table->string('phone_number', 200);
            $table->string('address', 200);
            $table->text('profile_image');
            $table->text('designation_id');
            $table->string('collor_no', 200);
            $table->string('police_station_id', 200);
            $table->string('username', 200);
            $table->string('password', 250);
            $table->rememberToken();
            $table->string('api_token',500)->nullable();
            $table->timestamp('last_seen');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
