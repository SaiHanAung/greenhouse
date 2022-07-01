<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Temp_humid extends Model
{
    use SoftDeletes;

    protected $table = 'temp_humid';
    protected $fillable = [
        'temp', 'humid', 'plot_id'
    ];
}
