<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Plot extends Model
{
    //
    protected $table = 'plots';
    protected $fillable = [
        'name', 'host', 'topic_send', 'topic_sub', 'description', 'user_id', 'img_name', 'file_path'
    ];

}

