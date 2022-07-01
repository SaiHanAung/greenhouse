<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingPlantsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('grower_name');
            $table->date('date_of_plant');
            $table->integer('harvest_day');
            $table->integer('plot_id');
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
        Schema::dropIfExists('setting_plants');
    }
}
