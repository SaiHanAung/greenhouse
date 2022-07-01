<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Traceability extends Model
{
    use SoftDeletes;
    
    protected $table = 'traceabilitys';
    protected $fillable = [
        'plot_name', 'product', 'grower_name', 'plant_date', 'harvest_date', 'plot_id', 'reference_id',
    ]; 
}
