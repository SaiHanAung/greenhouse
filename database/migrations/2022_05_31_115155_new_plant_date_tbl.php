<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewPlantDateTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_plant_dates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('delete_date');
            $table->integer('plot_id');
            $table->date('date_of_plant');
            $table->integer('total_price')->nullable();
            $table->integer('total_sale')->nullable();
            $table->string('reference_id')->nullable();
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
        Schema::dropIfExists('new_plant_dates');
    }
}
