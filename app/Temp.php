<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Temp extends Model
{
    use SoftDeletes;

    protected $table = 'temps';
    protected $fillable = [
        'temp', 'plot_id'
    ];
}
