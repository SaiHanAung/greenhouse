<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwitchTimeSetTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('switch_time_sets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('port');
            $table->integer('status');
            $table->integer('plot_id');
            $table->time('start_time');
            $table->time('stop_time');
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
        Schema::dropIfExists('switch_time_sets');
    }
}
