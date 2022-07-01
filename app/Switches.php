<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switches extends Model
{

    protected $table = 'switches';
    protected $fillable = [
        'name', 'port', 'status', 'plot_id'
    ];
}
