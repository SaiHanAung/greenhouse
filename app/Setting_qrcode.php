<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting_qrcode extends Model
{
    use SoftDeletes;

    protected $table = 'setting_qrcodes';
    protected $fillable = [
        'domainname', 'plot_id'
    ];
}
