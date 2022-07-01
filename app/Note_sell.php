<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note_sell extends Model
{
    use SoftDeletes;
    
    protected $table = 'note_sells';
    protected $fillable = [
        'date', 'amount', 'unit', 'price', 'total_price', 'plot_id'
    ];
}
