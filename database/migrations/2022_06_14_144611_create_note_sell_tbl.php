<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteSellTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_sells', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('amount');
            $table->string('unit');
            $table->integer('price');
            $table->integer('total_price');
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
        Schema::dropIfExists('note_sells');
    }
}
