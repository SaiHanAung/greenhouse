<?php

namespace App\Http\Controllers;

use App\Switches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SwitchesController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($datas)
    {
        //
        $data_switches = DB::table('switches')->get();
        $data_plot = DB::table('plots')->get();
        
            $get_plot_name = DB::table('plots')
                                    ->select('name')
                                    ->where('id', '=', $datas)->get();
            foreach($get_plot_name as $key_name => $value_name){
                foreach($value_name as $key_name_sub => $value_name_sub){
                }
            }
            $get_host_topic = DB::table('plots')
                ->select('host', 'topic_sub')
                ->where('id', '=', $datas)->get();
            // dd($value_topic_sub);                    

            $get_data_switches = DB::table('switches')
                                    ->select('id', 'name', 'port', 'status')
                                    ->where('plot_id', '=', $datas)->get();
        
        // dd($get_data_switches);
        return view('switches.index', compact('datas', 'value_name_sub', 'data_switches', 'get_data_switches', 'get_host_topic'));
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
    public function update(Request $request,Switches $switches)
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

    public function da(Request $request, $id)
    {
        $newPermLevel = $request->input('value');
        $override = (int) $newPermLevel;
    
        DB::table('switches')
            ->where('id', "$id")
            ->update(array('status' =>$override));
    }

    public function da2(Request $request, $id)
    {
        $newPermLevel2 = $request->input('value');
        $override2 = (int) $newPermLevel2;
    
        DB::table('switches')
            ->where('id', "$id")
            ->update(array('port_2' =>$override2));
    }

    public function da3(Request $request, $id)
    {
        $newPermLevel3 = $request->input('value');
        $override3 = (int) $newPermLevel3;
    
        DB::table('switches')
            ->where('id', "$id")
            ->update(array('port_3' =>$override3));
    }

    public function da4(Request $request, $id)
    {
        $newPermLevel4 = $request->input('value');
        $override4 = (int) $newPermLevel4;
    
        DB::table('switches')
            ->where('id', "$id")
            ->update(array('port_4' =>$override4));
    }

    public function da5(Request $request, $id)
    {
        $newPermLevel5 = $request->input('value');
        $override5 = (int) $newPermLevel5;
    
        DB::table('switches')
            ->where('id', "$id")
            ->update(array('port_5' =>$override5));
    }

    public function da6(Request $request, $id)
    {
        $newPermLevel6 = $request->input('value');
        $override6 = (int) $newPermLevel6;
    
        DB::table('switches')
            ->where('id', "$id")
            ->update(array('port_6' =>$override6));
    }

    public function da7(Request $request, $id)
    {
        $newPermLevel7 = $request->input('value');
        $override7 = (int) $newPermLevel7;
    
        DB::table('switches')
            ->where('id', "$id")
            ->update(array('port_7' =>$override7));
    }

    public function da8(Request $request, $id)
    {
        $newPermLevel8 = $request->input('value');
        $override8 = (int) $newPermLevel8;
    
        DB::table('switches')
            ->where('id', "$id")
            ->update(array('port_8' =>$override8));
    }
}
