<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraceabilityHarvestsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traceability_harvests', function (Blueprint $table) {
            $table->id();
            $table->date('harvest_date');
            $table->string('product');
            $table->integer('total_product');
            $table->string('unit');
            $table->string('recorder');
            $table->integer('plot_id');
            $table->string('history_plant_id')->nullable();
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
        Schema::dropIfExists('traceability_harvests');
    }
}
