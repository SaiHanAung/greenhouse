<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempHumidTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_humid', function (Blueprint $table) {
            $table->id();
            $table->string('temp')->nullable();
            $table->string('humid')->nullable();
            $table->integer('plot_id')->nullable();
            $table->integer('history_plant_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('temp_humid');
    }
}
