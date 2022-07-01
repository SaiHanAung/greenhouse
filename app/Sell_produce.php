<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sell_produce extends Model
{
    use SoftDeletes;
    
    protected $table = 'sell_produce';
    protected $fillable = [
        'sale_date', 'produce', 'amount', 'unit', 'price', 'recorder', 'plot_id'
    ];
}
