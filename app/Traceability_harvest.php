<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traceability_harvest extends Model
{
    //
    protected $table = 'traceability_harvests';
    protected $fillable = [
        'harvest_date', 'product', 'total_product', 'unit', 'recorder', 'plot_id'
    ];
    
}
