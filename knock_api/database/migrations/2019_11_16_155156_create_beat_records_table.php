<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeatRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beat_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beat_id');
            $table->integer('memeber_id');
            $table->string('lattitude');
            $table->string('longitude');
            $table->string('date');
            $table->string('time');
            $table->text('remark');
            $table->text('front_photo');
            $table->text('back_photo');
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
        Schema::dropIfExists('beat_records');
    }
}
