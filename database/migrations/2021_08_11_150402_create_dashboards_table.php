<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->id();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->string('device_id');
            $table->string('humid');
            $table->string('temp');
            $table->string('port_1');
            $table->string('port_2');
            $table->string('port_3');
            $table->string('port_4');
            $table->string('port_5');
            $table->string('port_6');
            $table->string('port_7');
            $table->string('port_8');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboards');
    }
}
