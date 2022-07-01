<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Humid extends Model
{
    use SoftDeletes;

    protected $table = 'humids';
    protected $fillable = [
        'humid', 'plot_id'
    ];
}
