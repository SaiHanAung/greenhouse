<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('host');
            $table->string('topic_send');
            $table->string('topic_sub');
            $table->integer('rai_size');
            $table->integer('ngan_size');
            $table->integer('square_wah_size');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('description');
            $table->integer('user_id');
            $table->string('img_name');
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
        Schema::dropIfExists('plots');
    }
}
