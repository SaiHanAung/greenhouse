<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;
use App\UserSystemInfoHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getip = UserSystemInfoHelper::get_ip();
        $getdevice = UserSystemInfoHelper::get_device();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $getos = UserSystemInfoHelper::get_os();
        
        $data = Dashboard::first()->paginate(5);

        return view('dashboard.index', compact('data', 'getip', 'getdevice', 'getbrowser', 'getos'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $getip = UserSystemInfoHelper::get_ip();
        $getdevice = UserSystemInfoHelper::get_device();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $getos = UserSystemInfoHelper::get_os();

        return view('dashboard.create', compact('getip', 'getdevice', 'getbrowser', 'getos'));
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
            'device_id' => 'required',
            'humid' => 'required',
            'temp'  => 'required',
            'port_1'  => 'required',
            'port_2'  => 'required',
            'port_3'  => 'required',
            'port_4'  => 'required',
            'port_5'  => 'required',
            'port_6'  => 'required',
            'port_7'  => 'required',
            'port_8'  => 'required'
        ]);

        Dashboard::create($request->all());

        return redirect()->route('dashboard.index')
                         ->with('success', 'Post create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
        return view('dashboard.show', compact('dashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
        $getip = UserSystemInfoHelper::get_ip();
        $getdevice = UserSystemInfoHelper::get_device();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $getos = UserSystemInfoHelper::get_os();

        return view('dashboard.edit', compact('dashboard','getip', 'getdevice', 'getbrowser', 'getos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
        $request->validate([
            'id' => '',
            'device_id' => 'required',
            'humid' => 'required',
            'temp'  => 'required',
            'port_1'  => 'required',
            'port_2'  => 'required',
            'port_3'  => 'required',
            'port_4'  => 'required',
            'port_5'  => 'required',
            'port_6'  => 'required',
            'port_7'  => 'required',
            'port_8'  => 'required'
        ]);

        $dashboard->update($request->all());

        return redirect()->route('dashboard.index')
                         ->with('success', 'Post update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
        $dashboard->delete();
        return redirect()->route('dashboard.index')
                         ->with('success', 'Post deleted successfully.');
    }

    public function da(Request $request, $id)
    {
        $newPermLevel = $request->input('value');
        $override = (int) $newPermLevel;
    
        DB::table('dashboards')
            ->where('id', "$id")
            ->update(array('port_1' =>$override,
                            // 'port_2' =>$override,
                            // 'port_3' =>$override,
                            // 'port_4' =>$override,
                            // 'port_5' =>$override,
                            // 'port_6' =>$override,
                            // 'port_7' =>$override,
                            // 'port_8' =>$override
                        ));
    }

    public function da2(Request $request, $id)
    {
        $newPermLevel2 = $request->input('value');
        $override2 = (int) $newPermLevel2;
    
        DB::table('dashboards')
            ->where('id', "$id")
            ->update(array('port_2' =>$override2));
    }

    public function da3(Request $request, $id)
    {
        $newPermLevel3 = $request->input('value');
        $override3 = (int) $newPermLevel3;
    
        DB::table('dashboards')
            ->where('id', "$id")
            ->update(array('port_3' =>$override3));
    }

    public function da4(Request $request, $id)
    {
        $newPermLevel4 = $request->input('value');
        $override4 = (int) $newPermLevel4;
    
        DB::table('dashboards')
            ->where('id', "$id")
            ->update(array('port_4' =>$override4));
    }

    public function da5(Request $request, $id)
    {
        $newPermLevel5 = $request->input('value');
        $override5 = (int) $newPermLevel5;
    
        DB::table('dashboards')
            ->where('id', "$id")
            ->update(array('port_5' =>$override5));
    }

    public function da6(Request $request, $id)
    {
        $newPermLevel6 = $request->input('value');
        $override6 = (int) $newPermLevel6;
    
        DB::table('dashboards')
            ->where('id', "$id")
            ->update(array('port_6' =>$override6));
    }

    public function da7(Request $request, $id)
    {
        $newPermLevel7 = $request->input('value');
        $override7 = (int) $newPermLevel7;
    
        DB::table('dashboards')
            ->where('id', "$id")
            ->update(array('port_7' =>$override7));
    }

    public function da8(Request $request, $id)
    {
        $newPermLevel8 = $request->input('value');
        $override8 = (int) $newPermLevel8;
    
        DB::table('dashboards')
            ->where('id', "$id")
            ->update(array('port_8' =>$override8));
    }
}
