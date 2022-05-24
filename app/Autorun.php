<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Autorun extends Model
{
    //
    protected $table = 'autoruns';
    protected $fillable = [
        'name', 'work_zone', 'start_time', 'stop_time', 'repeat', 
        'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'plot_id'
    ];
}
