<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Traceability_use_factor extends Model
{
    use SoftDeletes;
    
    protected $table = 'traceability_use_factors';
    protected $fillable = [
        'date_of_use', 'name_of_use', 'amount', 'unit', 'recorder', 'plot_id'
    ]; 
}
