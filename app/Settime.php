<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settime extends Model
{
    //
    protected $table = 'settimes';
    protected $fillable = [
        'settime_value', 'plot_id'
    ];
}
