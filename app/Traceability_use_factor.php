<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traceability_use_factor extends Model
{
    //
    protected $table = 'traceability_use_factors';
    protected $fillable = [
        'date_of_use', 'name_of_use', 'amount', 'unit', 'recorder', 'plot_id'
    ]; 
}
