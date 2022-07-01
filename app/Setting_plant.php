<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting_plant extends Model
{
    use SoftDeletes;

    protected $table = 'setting_plants';
    protected $fillable = [
        'name', 'grower_name', 'date_of_plant', 'harvest_day', 'plot_id'
    ];
}
