<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note_plant_area extends Model
{
    use SoftDeletes;
    
    protected $table = 'note_plant_areas';
    protected $fillable = [
        'date', 'title', 'price', 'notation', 'plot_id'
    ];
}
