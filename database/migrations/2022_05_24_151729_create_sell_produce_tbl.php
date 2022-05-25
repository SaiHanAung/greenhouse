<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSellProduceTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_produce', function (Blueprint $table) {
            $table->id();
            $table->date('sale_date');
            $table->string('produce');
            $table->integer('amount');
            $table->string('unit');
            $table->integer('price');
            $table->string('recorder');
            $table->integer('plot_id');
            $table->timestamps();
        });
        DB::table('sell_produce')->insert([
            [
                'sale_date' => '2022-05-21', 
                'produce' => 'เมล็ด', 
                'amount' => '1', 
                'unit' => 'บาท/กิโลกรัม', 
                'price' => '10', 
                'recorder' => 'ซาย',
                'plot_id' => '1',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_produce');
    }
}
