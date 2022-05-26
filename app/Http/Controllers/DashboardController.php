<?php

namespace App\Http\Controllers;

use App\Switches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($datas)
    {
        //
        $data_plot = DB::table('plots')->get();

        $get_plot_name = DB::table('plots')
            ->select('name')
            ->where('id', '=', $datas)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
            foreach ($value_name as $key_name_sub => $value_name_sub) {
            }
        }
        $get_host_topic = DB::table('plots')
            ->select('host', 'topic_send', 'topic_sub')
            ->where('id', '=', $datas)->get();
        foreach ($get_host_topic as $keyht => $valueht) {
        }

        $seed = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'เมล็ด')->where('plot_id','=',$datas)->get()->sum('total_price');
        $fertilizer = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'ปุ๋ย')->where('plot_id','=',$datas)->get()->sum('total_price');
        $wage = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'ค่าแรง')->where('plot_id','=',$datas)->get()->sum('total_price');
        $etc = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'ค่าอื่นๆ')->where('plot_id','=',$datas)->get()->sum('total_price');
        // $a = $seed.$datas;
        // dd($seed);
        $check_tract_total_price = DB::table('traceability_factors')->select('total_price')->where('plot_id', '=', $datas)->count();
        $tract_total_price = DB::table('traceability_factors')->select('total_price')->where('plot_id', '=', $datas)->get()->sum('total_price');
        // dd($check_tract_total_price);
        
        return view('dashboards.index', compact('datas', 'value_name_sub', 'get_host_topic', 
                                                'seed','fertilizer', 'wage' ,'etc', 'check_tract_total_price',
                                            'tract_total_price'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);

        // Dashboard_autorun::create($request->all());

        return redirect()->route('dashboards.index')
            ->with('success', 'Auto runs create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function settime($datas)
    {
        //
        $get_plot_name = DB::table('plots')
            ->select('name')
            ->where('id', '=', $datas)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
            foreach ($value_name as $key_name_sub => $value_name_sub) {
            }
        }


        $get_data_settime = DB::table('settimes')
            ->select('id', 'settime_value')
            ->where('plot_id', '=', $datas)->get();

        // dd($value_name_sub);
        return view('settimes.index', compact('datas', 'value_name_sub', 'get_data_settime'));
    }

    public function st(Request $request, $id)
    {
        $newPermLevel = $request->input('value');
        $override = (int) $newPermLevel;

        DB::table('settimes')
            ->where('id', $id)
            ->update(array('settime_value' => $override));

        return back();
    }

    public function destroySwitch(Switches $switches)
    {
        //
        $switches->delete();
        return back()->with('success', 'ลบสวิตซ์สำเร็จแล้ว');
    }
}
