<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraceabilitysTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traceabilitys', function (Blueprint $table) {
            $table->id();
            $table->string('plot_name');
            $table->string('product');
            $table->string('grower_name');
            $table->date('plant_date');
            $table->date('harvest_date');
            $table->integer('plot_id');
            $table->integer('history_plant_id')->nullable();
            $table->string('reference_id');
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
        Schema::dropIfExists('traceabilitys');
    }
}
