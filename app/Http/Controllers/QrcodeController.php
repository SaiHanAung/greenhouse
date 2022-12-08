<?php

namespace App\Http\Controllers;

use PDF;
use App\Plot;
use App\Setting_qrcode;
use App\Traceability;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($plotID)
    {
        //
        $get_plot_name = DB::table('plots')
            ->select('name')
            ->where('id', '=', $plotID)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
            foreach ($value_name as $key_name_sub => $value_name_sub) {
            }
        }
        $get_new_plant_dates = DB::table('new_plant_dates')->select('id')
        ->where('plot_id', '=', $plotID)->get();
        foreach ($get_new_plant_dates as $key_new_plant_dates => $value_new_plant_dates) {
        }
        
        $get_reference_id = Traceability::withTrashed()->where('plot_id',$plotID)->get('reference_id');
        foreach($get_reference_id as $key_reference_id => $value_reference_id){}
        $reference_id = $value_reference_id->reference_id;
        
        $tracUrl = "http://127.0.0.1:8000/traceability/" . $plotID . '/' . $reference_id;
        $qrcode = "https://chart.googleapis.com/chart?cht=qr&chl=" . $tracUrl . "&chs=360x360&choe=UTF-8";

        $check_harv_date = DB::table('traceability_harvests')->select('harvest_date')
        ->where('plot_id', '=', $plotID)->where('harvest_date', '!=', null)->count();

        $check_traceability = DB::table('traceabilitys')->select('id')
        ->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->count();

        $check_trac_harv = DB::table('traceability_harvests')->select('id')
        ->where('plot_id', '=', $plotID)->where('deleted_at',null)->count();
        $get_data_plot = DB::table('plots')
            ->select('id', 'name', 'host', 'topic_send', 'topic_sub', 
                    'rai_size', 'ngan_size', 'square_wah_size', 'latitude', 'longitude', 'description', 'img_name')
            ->where('id', '=', $plotID)->get();
            foreach($get_data_plot as $key_data_plot => $value_data_plot){}

        return view('qrcodes.index', compact(
            'value_data_plot',
            'value_name_sub',
            'plotID',
            'qrcode',
            'tracUrl',
            'check_harv_date',
            'check_traceability',
            'reference_id',
            'check_trac_harv',
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadPDF($plotID, Request $request )
    {
        $get_plot_name = DB::table('plots')
            ->select('name')
            ->where('id', '=', $plotID)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
            foreach ($value_name as $key_name_sub => $value_name_sub) {
            }
        }
        $plot_name = Plot::where('id', '=', $plotID)->get('name');
        $new_plant_id = DB::table('new_plant_dates')->select('id', 'plot_id', 'name', 'delete_date')
        ->where('name', '=', $value_name_sub)
        ->where('plot_id', '=', $plotID)->get();
        foreach ($new_plant_id as $key_new_plant_id => $value_new_plant_id) {
        }

        $get_domainname = DB::table('setting_qrcodes')->where('plot_id', '=', $plotID)->get('domainname');
        foreach($get_domainname as $key_domainname => $value_domainname){}

        $get_reference_id = Traceability::withTrashed()->where('plot_id',$plotID)->get('reference_id');
        foreach($get_reference_id as $key_reference_id => $value_reference_id){}
        $reference_id = $value_reference_id->reference_id;

        // $tracUrl ถ้าจะนำไปใช้กับเว็บอื่น ให้เปลี่ยนโดเมนเนม  **ตรง( /traceability/" . $plotID )ไม่ต้องเปลี่่ยน
        // $tracUrl = "https://app-greenhouse-project.herokuapp.com/traceability/" . $plotID;
        $tracUrl = "http://127.0.0.1:8000/traceability/" . $plotID . '/' . $reference_id;
        $qrcode = "https://chart.googleapis.com/chart?cht=qr&chl=" . $tracUrl . "&chs=200x200&choe=UTF-8";

        $setting_plant = DB::table('setting_plants')->where('plot_id',$plotID)->where('deleted_at',null)->get();

        $get_data_trac_harv = DB::table('note_harvests')
            ->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->get();

        $now_date = Carbon::now();

        $pdf = PDF::loadView('pdf', compact('qrcode', 'plotID', 'plot_name', 'setting_plant', 'get_data_trac_harv', 'now_date'));
        return $pdf->download('Qrcode'.'/'.'id'.'-'.$plotID.'/'.'name'.'-'.$value_name_sub.'.pdf');
    }

    public function settingQrcode(Request $request)
    {
        Setting_qrcode::create($request->all());

        return back()->with('success', 'ตั้งค่า Qr Code สำเร็จแล้ว');
    }
}
