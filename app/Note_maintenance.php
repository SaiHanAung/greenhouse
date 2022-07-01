<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note_maintenance extends Model
{
    use SoftDeletes;
    
    protected $table = 'note_maintenances';
    protected $fillable = [
        'date', 'title', 'price', 'notation', 'plot_id'
    ];
}
