<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class switch_log extends Model
{
    protected $table = 'switch_log';
    protected $fillable = [
        'name', 'port', 'status', 'plot_id'
    ];
}
