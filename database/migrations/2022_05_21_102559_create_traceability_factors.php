<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTraceabilityFactors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traceability_factors', function (Blueprint $table) {
            $table->id();
            $table->date('received_date');
            $table->string('type');
            $table->string('name');
            $table->integer('amount')->nullable();
            $table->integer('price');
            $table->string('unit')->nullable();
            $table->string('source')->nullable();
            $table->integer('total_price')->nullable();
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
        Schema::dropIfExists('traceability_factors');
    }
}
