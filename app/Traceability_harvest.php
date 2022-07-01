<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Traceability_harvest extends Model
{
    use SoftDeletes;
    
    protected $table = 'traceability_harvests';
    protected $fillable = [
        'harvest_date', 'product', 'total_product', 'unit', 'recorder', 'plot_id'
    ];
    
}
