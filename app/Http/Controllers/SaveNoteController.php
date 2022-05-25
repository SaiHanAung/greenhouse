<?php

namespace App\Http\Controllers;

use App\savenote;
use App\Plot;
use App\Sell_produce;
use App\Traceability_factor;
use App\Traceability_use_factor;
use App\Traceability_harvest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SaveNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \App\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function index($datas)
    {
        //
        $get_plot_name = DB::table('plots')
            ->select('name')
            ->where('id', '=', $datas)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
            foreach ($value_name as $key_name_sub => $value_name_sub) {
            }
        }

        $get_data_trac = DB::table('traceability_factors')
            ->select('id', 'received_date', 'type', 'name', 'amount', 'price', 'unit', 'source', 'total_price', 'recorder')
            ->where('plot_id', '=', $datas)->paginate(5);
        $check_tract_total_price = DB::table('traceability_factors')->select('total_price')->where('plot_id', '=', $datas)->count();
        $tract_total_price = DB::table('traceability_factors')->select('total_price')->where('plot_id', '=', $datas)->get()->sum('total_price');
        // dd($check_tract_total_price);
        $get_data_trac_use_fact = DB::table('traceability_use_factors')
            ->select('id', 'date_of_use', 'name_of_use', 'amount', 'unit', 'recorder')
            ->where('plot_id', '=', $datas)->paginate(5);

        $get_data_trac_harv = DB::table('traceability_harvests')
            ->select('id', 'harvest_date', 'product', 'total_product', 'unit', 'recorder')
            ->where('plot_id', '=', $datas)->paginate(5);

        $get_data_sell_produce = DB::table('sell_produce')
            ->select('id', 'sale_date', 'produce', 'amount', 'unit', 'price', 'recorder')
            ->where('plot_id', '=', $datas)->paginate(5);
        // dd($harvest_date);

        // get date //
        $get_date_trac = DB::table('traceability_factors')
            ->select('received_date')
            ->where('plot_id', '=', $datas)->get();
        foreach($get_date_trac as $key_date_trac_fact => $value_date_trac_fact){
            foreach ($value_date_trac_fact as $key_date_trac_sub => $value_date_trac_sub) {
                $received_date = thaidate('d-m-Y', strtotime($value_date_trac_sub));
            }
        }

        $get_date_trac_use_fact = DB::table('traceability_use_factors')
            ->select('date_of_use')
            ->where('plot_id', '=', $datas)->get();
        foreach($get_date_trac_use_fact as $key_date_trac_use_fact => $value_date_trac_use_fact){
            foreach ($value_date_trac_use_fact as $key_date_trac_use_sub => $value_date_trac_use_sub) {
                $date_of_use = thaidate('d-m-Y', strtotime($value_date_trac_use_sub));
            }
        }

        $get_date_trac_harv = DB::table('traceability_harvests')
            ->select('harvest_date')
            ->where('plot_id', '=', $datas)->get();
        foreach($get_date_trac_harv as $key_date_trac_harv => $value_date_trac_harv){
            foreach ($value_date_trac_harv as $key_date_trac_harv_sub => $value_date_trac_harv_sub) {
                $harvest_date = thaidate('d-m-Y', strtotime($value_date_trac_harv_sub));
            }
        }

        return view('savenotes.index', compact(
            'value_name_sub',
            'datas',
            'get_data_trac_use_fact',
            'get_data_trac_harv',
            'get_data_trac',
            'tract_total_price',
            'check_tract_total_price',
            'get_data_sell_produce',
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
    public function storeTraceabilityFactor(Request $request)
    {
        //
        $request->validate([
            'received_date' => 'required',
            'name' => 'required',
            'price' => 'required',
            'recorder' => 'required'
        ]);

        Traceability_factor::create($request->all());

        return back()->with('success', 'จดบันทึกปัจจัยการผลิตสำเร็จแล้ว');
    }

    public function storeTraceabilityUseFactor(Request $request)
    {
        // 
        Traceability_use_factor::create($request->all());

        return back()->with('success', 'จดบันทึกการใช้ปัจจัยการผลิดสำเร็จแล้ว');
    }

    public function storeTraceabilityHarvest(Request $request)
    {
        //
        Traceability_harvest::create($request->all());

        return back()->with('success', 'จดบันทึกการเก็บเกี่ยวผลผลิตสำเร็จแล้ว');
    }

    public function storeSellProduce(Request $request)
    {
        //
        Sell_produce::create($request->all());

        return back()->with('success', 'จดบันทึกการจำหน่ายผลผลิตสำเร็จแล้ว');
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

    public function destroyTracFact(Traceability_factor $traceability_factor)
    {
        //
        $traceability_factor->delete();

        return back()->with('success', 'ลบบันทึกปัจจัยการผลิตที่เลือกสำเร็จแล้ว');
    }

    public function destroyTracUseFact(Traceability_use_factor $traceability_use_factor)
    {
        //
        $traceability_use_factor->delete();

        return back()->with('success', 'ลบบันทึกการใช้ปัจจัยการผลิตที่เลือกสำเร็จแล้ว');
    }

    public function destroyTracHarv(Traceability_harvest $traceability_harvest)
    {
        //
        $traceability_harvest->delete();

        return back()->with('success', 'ลบบันทึกการเก็บเกี่ยวผลผลิตที่เลือกสำเร็จแล้ว');
    }

    public function destroySellProduce(Sell_produce $sell_produce)
    {
        //
        $sell_produce->delete();

        return back()->with('success', 'ลบบันทึกการจำหน่ายผลผลิตที่เลือกสำเร็จแล้ว');
    }
}
