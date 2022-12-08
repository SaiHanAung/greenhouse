<?php

namespace App\Http\Controllers;

use App\Switches;
use App\Switch_time_set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SwitchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($plotID)
    {
        //
        $data_switches = DB::table('switches')->get();
        $data_plot = DB::table('plots')->get();

        $get_plot_name = DB::table('plots')
            ->select('name')
            ->where('id', '=', $plotID)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
            foreach ($value_name as $key_name_sub => $value_name_sub) {
            }
        }
        $get_host_topic = DB::table('plots')
            ->select('host', 'topic_sub')
            ->where('id', '=', $plotID)->get();
        // dd($value_topic_sub);                    

        $get_data_switches = DB::table('switches')
            ->select('id', 'name', 'port', 'status', 'plot_id')
            ->where('plot_id', '=', $plotID)->get();
        
        $get_switch_log = DB::table('switch_logs')->where('plot_id', $plotID)->where('history_plant_id', null)->latest()->paginate(10);
        foreach($get_switch_log as $key_switch_log => $value_switch_log){}
        $get_switch_time_set_log = DB::table('switch_time_set_logs')->where('plot_id', $plotID)->where('history_plant_id', null)->latest()->paginate(10);
        
        $get_data_switch_time_set = Switch_time_set::where('plot_id', $plotID)->get()->all();

        $get_port = DB::table('switches')
                        ->join('switch_time_sets', 'switch_time_sets.port', '=', 'switches.port')
                        ->select('switches.port')
                        ->get();

        // dd($get_port);
        return view('switches.index', compact(
            'get_port', 
            'get_switch_time_set_log', 
            'get_data_switch_time_set', 
            'get_switch_log', 
            'plotID', 
            'value_name_sub', 
            'data_switches', 
            'get_data_switches', 
            'get_host_topic',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('switches.create');
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
            'name' => 'required',
            'status' => 'required'
        ]);

        Switches::create($request->all());

        return back()->with('success', 'สร้างสวิตซ์สำเร็จแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Switches  $switches
     * @return \Illuminate\Http\Response
     */
    public function show(Switches $switches)
    {
        //
        return view('switches.show', compact('switches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Switches  $switches
     * @return \Illuminate\Http\Response
     */
    public function edit(Switches $switches)
    {
        //
        return view('switches.edit', compact('switches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Switches  $switches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Switches $switches)
    {
        //
        $request->validate([
            'name' => 'required',
            'port' => 'required',
            'status' => 'required'
        ]);

        $switches->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Switches  $switches
     * @return \Illuminate\Http\Response
     */
    public function destroy(Switches $switches)
    {
        //
        // dd($switches);
        $switches->delete();
        return back()->with('success', 'ลบสวิตซ์สำเร็จแล้ว');
    }

    public function da(Request $request, $switchID)
    {
        $plotID = $request->input('plot_id');
        $newPermLevel = $request->input('value');
        $override = (int) $newPermLevel;

        DB::table('switches')
            ->where('id', "$switchID")
            ->update(array('status' => $override));

        $get_switch_name = DB::table('switches')->select('name', 'port')
            ->where('id', $switchID)->get();
        foreach ($get_switch_name as $key_switch_name => $value_switch_name) {
        }

        DB::table('switch_logs')->insert([[
            'plot_id' => $plotID,
            'name' => $value_switch_name->name,
            'port' => $value_switch_name->port,
            'status' => $override,
            'created_at' => Carbon::now(),
        ]]);
    }

    public function switchTimeSetUpdate(Request $request, $switchID)
    {
        $plotIDsts = $request->input('plot_id');
        $newPermLevelsts = $request->input('value');
        $overridests = (int) $newPermLevelsts;

        DB::table('switch_time_sets')
            ->where('id', "$switchID")
            ->update(array('status' => $overridests));

        $get_switch_name = DB::table('switch_time_sets')->select('name', 'port')
            ->where('id', $switchID)->get();
        foreach ($get_switch_name as $key_switch_name => $value_switch_name) {
        }

        DB::table('switch_time_set_logs')->insert([[
            'plot_id' => $plotIDsts,
            'name' => $value_switch_name->name,
            'port' => $value_switch_name->port,
            'status' => $overridests,
            'created_at' => Carbon::now(),
        ]]);
    }

    public function stopTimeSet(Request $request, $switchID)
    {
        $plotID = $request->input('plot_id');
        $value_stop = $request->input('value');
        $stop_time_set = (int) $value_stop;

        DB::table('switch_time_sets')
            ->where('id', "$switchID")
            ->update(array('status' => $stop_time_set));

        $get_switch_name = DB::table('switch_time_sets')->select('name', 'port')
            ->where('id', $switchID)->get();
        foreach ($get_switch_name as $key_switch_name => $value_switch_name) {
        }

        DB::table('switch_time_set_logs')->insert([[
            'plot_id' => $plotID,
            'name' => $value_switch_name->name,
            'port' => $value_switch_name->port,
            'status' => $stop_time_set,
            'created_at' => Carbon::now(),
        ]]);
    }
    public function storeSwichTimeSet(Request $request)
    {
        Switch_time_set::create($request->all());

        return back()->with('success', 'สร้างสวิตช์แบบตั้งเวลาสำเร็จแล้ว');
    }

    public function destroySwichTimeSet(Switch_time_set $switch_time_set)
    {
        $switch_time_set->delete();

        return back()->with('success', 'ลบสวิตช์แบบตั้งเวลาที่เลือกสำเร็จแล้ว');
    }

    public function updateSwitchTimeSet(Request $request, Switch_time_set $switch_time_set)
    {
        $switch_time_set->update($request->all());

        return back()->with('success', 'แก้ไขสวิตช์แบบตั้งเวลาสำเร็จแล้ว');
    }
}
