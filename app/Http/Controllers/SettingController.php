<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index($plotID)
    {
        // return view('setting');

        $get_data_plot = DB::table('plots')
            ->select('id', 'name', 'host', 'topic_send', 'topic_sub', 
                    'rai_size', 'ngan_size', 'square_wah_size', 'latitude', 'longitude', 'description', 'img_name')
            ->where('id', '=', $plotID)->get();
            foreach($get_data_plot as $key_data_plot => $value_data_plot){}

        // dd($value_data_plot);
        $check_traceability = DB::table('traceabilitys')
        ->where('plot_id',$plotID)->where('deleted_at', '=', null)->count();
        
        return view('settings.index', compact('plotID', 
        'get_data_plot',
        'value_data_plot',
        'check_traceability',
    ));
    }
}
