<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traceability_factor extends Model
{
    //
    protected $table = 'traceability_factors';
    protected $fillable = [
        'received_date', 'name', 'type', 'amount', 'price', 'unit', 'source', 'total_price', 'recorder', 'plot_id'
    ];
}
