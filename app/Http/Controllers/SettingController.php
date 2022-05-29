<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index($datas)
    {
        // return view('setting');

        $get_data_plot = DB::table('plots')
            ->select('id', 'name', 'host', 'topic_send', 'topic_sub', 'description','img_name', 'file_path')
            ->where('id', '=', $datas)->get();
            foreach($get_data_plot as $key_data_plot => $value_data_plot){}

        // dd($value_data_plot);
        return view('settings.index', compact('datas', 'get_data_plot','value_data_plot'));
    }
}
