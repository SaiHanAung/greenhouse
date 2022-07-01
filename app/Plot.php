<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plot extends Model
{
    
    protected $table = 'plots';
    protected $fillable = [
        'name', 'host', 'topic_send', 
        'topic_sub', 'rai_size', 'ngan_size', 
        'square_wah_size', 'latitude', 'longitude', 
        'description', 'user_id', 'img_name',
    ];

}

