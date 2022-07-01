<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maintenance extends Model
{
    use SoftDeletes;
    
    protected $table = 'maintenances';
    protected $fillable = [
        'date_of_use', 'name_of_use', 'type_of_use', 'amount', 'unit', 'notation', 'plot_id'
    ];
}
