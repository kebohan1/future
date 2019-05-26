<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->time('alarm_time');
            $table->boolean('sunday_switch');
            $table->boolean('monday_switch');
            $table->boolean('tuesday_switch');
            $table->boolean('wednesday_switch');
            $table->boolean('thursday_switch');
            $table->boolean('friday_switch');
            $table->boolean('saturday_switch');
            $table->boolean('active');
            $table->unsignedinteger('uid');
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
        Schema::dropIfExists('notification');
    }
}
