<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotePlantAreaTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_plant_areas', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('title');
            $table->integer('price');
            $table->string('notation');
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
        Schema::dropIfExists('note_plan_areas');
    }
}
