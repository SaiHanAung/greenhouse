<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temp_humid;
use App\Temp;
use App\Humid;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartApiController extends Controller
{
    public function index(Request $request)
    {
        $plot_id = $request->input('value');
        $temps = Temp::latest()->take(30)->where('plot_id', $plot_id)->get()->sortBy('id');
        $timeTemp = $temps->pluck('created_at');
        $tempVals = $temps->pluck('temp');
        $timeTemp_mobile = $temps->pluck('created_at');
        $tempVals_mobile = $temps->pluck('temp');
        
        $humids = Humid::latest()->take(30)->where('plot_id', $plot_id)->get()->sortBy('id');
        $timeHumid = $humids->pluck('created_at');
        $humidVals = $humids->pluck('humid');
        $timeHumid_mobile = $humids->pluck('created_at');
        $humidVals_mobile = $humids->pluck('humid');

        return response()->json(compact('timeTemp', 'tempVals', 'timeHumid', 'humidVals',
                'timeTemp_mobile', 'tempVals_mobile', 'timeHumid_mobile', 'humidVals_mobile',
        ));
    }

    public function showTempSixHour(Request $request)
    {
        $sixHour = Carbon::now()->subHours(6)->format("Y-m-d H:i:s");
        $plot_id = $request->input('value');
        $temps = Temp::latest()->where('plot_id', $plot_id)->where('created_at', '>', $sixHour)->get()->sortBy('id');
        $timeTemp = $temps->pluck('created_at');
        $tempVals = $temps->pluck('temp');
        
        return response()->json(compact('timeTemp', 'tempVals'));
    }

    public function dateShowTemp(Request $request)
    {
        $plot_id = $request->input('value');
        $date = $request->input('dateTemp');
        $temps = Temp::latest()->where('plot_id', $plot_id)->where('date', $date)->get()->sortBy('id');
        $timeTemp = $temps->pluck('created_at');
        $tempVals = $temps->pluck('temp');
        
        return response()->json(compact('timeTemp', 'tempVals'));
    }

    public function dateShowHumid(Request $request)
    {
        $plot_id = $request->input('value');
        $date = $request->input('dateHumid');
        $humids = Humid::latest()->where('plot_id', $plot_id)->where('date', $date)->get()->sortBy('id');
        $timeHumid = $humids->pluck('created_at');
        $humidVals = $humids->pluck('humid');
        
        return response()->json(compact('timeHumid', 'humidVals'));
    }
}
