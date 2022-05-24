<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell_produce extends Model
{
    //
    protected $table = 'sell_produce';
    protected $fillable = [
        'sale_date', 'produce', 'amount', 'unit', 'price', 'recorder', 'plot_id'
    ];
}
