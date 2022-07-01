<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switch_time_set extends Model
{
    protected $table = 'switch_time_sets';
    protected $fillable = [
        'name', 'port', 'status', 'plot_id', 'start_time', 'stop_time'
    ];
}
