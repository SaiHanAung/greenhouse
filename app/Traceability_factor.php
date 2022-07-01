<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Traceability_factor extends Model
{
    use SoftDeletes;
    
    protected $table = 'traceability_factors';
    protected $fillable = [
        'received_date', 'name', 'type', 'amount', 'price', 'unit', 'source', 'total_price', 'recorder', 'plot_id'
    ];
}
