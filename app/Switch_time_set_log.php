<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switch_time_set_log extends Model
{
    protected $table = 'switch_time_set_logs';
    protected $fillable = [
        'name', 'port', 'status', 'plot_id'
    ];
}
