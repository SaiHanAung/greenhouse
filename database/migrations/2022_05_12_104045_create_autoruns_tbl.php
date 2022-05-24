<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorunsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoruns', function (Blueprint $table) {
            $table->id();
            $table->integer('plot_id');
            $table->string('name');
            $table->string('work_zone');
            $table->time('start_time');
            $table->time('stop_time');
            $table->integer('repeat');
            $table->integer('sunday');
            $table->integer('monday');
            $table->integer('tuesday');
            $table->integer('wednesday');
            $table->integer('thursday');
            $table->integer('friday');
            $table->integer('saturday');
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
        Schema::dropIfExists('autoruns');
    }
}
