<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeatSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beat_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beat_id');
            $table->integer('member_id');
            $table->integer('police_id');
            $table->string('from_date');
            $table->string('to_date');
            $table->integer('frequency');
            $table->integer('no_of_visits');
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
        Schema::dropIfExists('beat_schedules');
    }
}
