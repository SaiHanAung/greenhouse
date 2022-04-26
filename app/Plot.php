<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Plot extends Model
{
    //
    protected $fillable = [
        'name', 'hardware', 'connection_type', 'description', 'user_id'
    ];

}
