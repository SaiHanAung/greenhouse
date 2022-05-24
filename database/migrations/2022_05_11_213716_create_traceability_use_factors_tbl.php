<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraceabilityUseFactorsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traceability_use_factors', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_use');
            $table->string('name_of_use');
            $table->integer('amount');
            $table->string('unit');
            $table->string('recorder');
            $table->integer('plot_id');
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
        Schema::dropIfExists('traceability_use_factors');
    }
}
