<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note_harvest extends Model
{
    use SoftDeletes;
    
    protected $table = 'note_harvests';
    protected $fillable = [
        'date', 'title', 'price', 'notation', 'plot_id'
    ];
}
