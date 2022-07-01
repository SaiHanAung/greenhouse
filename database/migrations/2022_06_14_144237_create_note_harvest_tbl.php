<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteHarvestTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_harvests', function (Blueprint $table) {
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
        Schema::dropIfExists('note_harvests');
    }
}
