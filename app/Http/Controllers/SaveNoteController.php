<?php

namespace App\Http\Controllers;

use App\savenote;
use App\Plot;
use App\Sell_produce;
use App\Traceability_factor;
use App\Traceability_use_factor;
use App\Maintenance;
use App\Traceability_harvest;

use App\Note_plant_area;
use App\Note_plant;
use App\Note_harvest;
use App\Note_maintenance;
use App\Note_sell;
use Illuminate\Support\Facades\DB;

use App\Exports\TracFactExport;
use App\Exports\TracUseFactExport;
use App\Exports\TracHarvExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class SaveNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \App\Plot  $plot
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

        $get_data_trac = DB::table('traceability_factors')
            ->select('id', 'received_date', 'type', 'name', 'amount', 'price', 'unit', 'source', 'total_price', 'recorder')
            ->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->paginate(5);
        $check_tract_total_price = DB::table('traceability_factors')->select('total_price')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->count();
        $tract_total_price = DB::table('traceability_factors')->select('total_price')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->get()->sum('total_price');
        // dd($check_tract_total_price);

        $check_data_trac_use_fact = DB::table('traceability_use_factors')->select('id')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->count();
        $get_data_trac_use_fact = DB::table('traceability_use_factors')
            ->select('id', 'date_of_use', 'name_of_use', 'amount', 'unit', 'recorder')
            ->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->paginate(5);

        $check_data_trac_harv = DB::table('traceability_harvests')->select('id')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->count();
        $get_data_trac_harv = DB::table('traceability_harvests')
            ->select('id', 'harvest_date', 'product', 'total_product', 'unit', 'recorder')
            ->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->paginate(5);

        $get_data_maintenance = DB::table('maintenances')
            ->select('id', 'date_of_use', 'name_of_use', 'type_of_use', 'amount', 'unit', 'notation')
            ->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->paginate(5);

        $get_data_sell_produce = DB::table('sell_produce')
            ->select('id', 'sale_date', 'produce', 'amount', 'unit', 'price', 'recorder')
            ->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->paginate(5);
        // dd($harvest_date);
        $check_traceability = DB::table('traceabilitys')
        ->where('plot_id',$plotID)->where('deleted_at', '=', null)->count();

        $get_data_note_plant_area = Note_plant_area::where('plot_id', $plotID)->get()->all();
        $get_data_note_plant = Note_plant::where('plot_id', $plotID)->get()->all();
        $get_data_note_harvest = Note_harvest::where('plot_id', $plotID)->get()->all();
        $get_data_note_maintenance = Note_maintenance::where('plot_id', $plotID)->get()->all();
        $get_data_note_sell = Note_sell::where('plot_id', $plotID)->get()->all();

        $check_plant_area_price = Note_plant_area::where('plot_id', $plotID)->where('deleted_at', null)->count();
        $check_plant_price = Note_plant::where('plot_id', $plotID)->where('deleted_at', null)->count();
        $check_harvest_price = Note_harvest::where('plot_id', $plotID)->where('deleted_at', null)->count();
        $check_maintenance_price = Note_maintenance::where('plot_id', $plotID)->where('deleted_at', null)->count();
        $check_sell_price = Note_sell::where('plot_id', $plotID)->where('deleted_at', null)->count();

        $plant_area_total_price = DB::table('note_plant_areas')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $plant_total_price = DB::table('note_plants')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $harvest_total_price = DB::table('note_harvests')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $maintenance_total_price = DB::table('note_maintenances')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');

        // dd($check_plant_area);
        // foreach($get_data_note_plant_area as $key_note_plant_area => $value_note_plant_area){}
        // dd($get_data_note_sell);

        return view('savenotes.index', compact(
            'plant_area_total_price',
            'plant_total_price',
            'harvest_total_price',
            'maintenance_total_price',
            'check_plant_area_price',
            'check_plant_price',
            'check_harvest_price',
            'check_maintenance_price',
            'get_data_note_plant_area',
            'get_data_note_plant',
            'get_data_note_harvest',
            'get_data_note_maintenance',
            'get_data_note_sell',
            'value_name_sub',
            'plotID',
            'get_data_trac_use_fact',
            'get_data_trac_harv',
            'get_data_trac',
            'tract_total_price',
            'check_tract_total_price',
            'check_data_trac_use_fact',
            'check_data_trac_harv',
            'get_data_sell_produce',
            'get_data_maintenance',
            'check_traceability',
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
        return view('savenotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNotePlantArea(Request $request)
    {
        Note_plant_area::create($request->all());

        return back()->with('success', 'จดบันทึกการเตรียมพื้นที่ปลูกสำเร็จแล้ว');
    }

    public function storeNotePlant(Request $request)
    {
        
        Note_plant::create($request->all());

        return back()->with('success', 'จดบันทึกการเพาะปลูกสำเร็จแล้ว');
    }

    public function storeNoteHarvest(Request $request)
    {
        
        Note_harvest::create($request->all());

        return back()->with('success', 'จดบันทึกการเก็บเกี่ยวผลผลิตสำเร็จแล้ว');
    }

    public function storeNoteMaintenance(Request $request)
    {
        //
        Note_maintenance::create($request->all());
        return back()->with('success', 'จดบันทึกการบำรุงรักษาสำเร็จแล้ว');
    }

    public function storeNoteSell(Request $request)
    {
        //
        Note_sell::create($request->all());

        return back()->with('success', 'จดบันทึกการจำหน่ายสำเร็จแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\savenote  $savenote
     * @return \Illuminate\Http\Response
     */
    public function show(savenote $savenote)
    {
        //
        return view('savenotes.show', compact('savenote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\savenote  $savenote
     * @return \Illuminate\Http\Response
     */
    public function edit(savenote $savenote)
    {
        //
        return view('savenotes.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\savenote  $savenote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, savenote $savenote)
    {
        //
        return view('savenotes.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\savenote  $savenote
     * @return \Illuminate\Http\Response
     */

    public function destroy(savenote $savnote)
    {
        //
        $savnote->delete();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Traceability_factor $traceability_factor
     * @return \Illuminate\Http\Response
     */

    public function destroyNotePlantArea(Note_plant_area $note_plant_area)
    {
        //
        $note_plant_area->delete();

        return back()->with('success', 'ลบบันทึกการเตรียมพื้นที่ปลูกที่เลือกสำเร็จแล้ว');
    }

    public function destroyNotePlant(Note_plant $note_plant)
    {
        //
        $note_plant->delete();

        return back()->with('success', 'ลบบันทึกการเพาะปลูกที่เลือกสำเร็จแล้ว');
    }

    public function destroyNoteHarvest(Note_harvest $note_harvest)
    {
        //
        $note_harvest->delete();

        return back()->with('success', 'ลบบันทึการเก็บเกี่ยวที่เลือกสำเร็จแล้ว');
    }

    public function destroyNoteMaintenance(Note_maintenance $note_maintenance)
    {
        //
        $note_maintenance->delete();

        return back()->with('success', 'ลบบันทึกการบำรุงรักษาที่เลือกสำเร็จแล้ว');
    }

    public function destroyNoteSell(Note_sell $note_sell)
    {
        //
        $note_sell->delete();

        return back()->with('success', 'ลบบันทึกการจำหน่ายผลผลิตที่เลือกสำเร็จแล้ว');
    }

    public function TracFactExcel()
    {
        return Excel::download(new TracFactExport, 'ปัจจัยการผลิต.xlsx');
    }

    public function TracUseFactExcel()
    {
        return Excel::download(new TracUseFactExport, 'การใช้ปัจจัยการผลิต.xlsx');
    }

    public function TracHarvExcel()
    {
        return Excel::download(new TracHarvExport, 'การเก็บเกี่ยวผลผลิต.xlsx');
    }
}
