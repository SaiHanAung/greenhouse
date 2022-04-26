<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\switch_log;

class SwitchLogController extends Controller
{
    function save(Request $req)
    {
        print_r($req->input());
        $switch_log = new switch_log;
        $switch_log ->checkbox= $req->checkbox;
        echo $switch_log -> save();
    }
}
