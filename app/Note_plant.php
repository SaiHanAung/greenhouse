<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note_plant extends Model
{
    use SoftDeletes;
    
    protected $table = 'note_plants';
    protected $fillable = [
        'date', 'title', 'price', 'notation', 'plot_id'
    ];
}
