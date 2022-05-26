<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class TraceabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($datas)
    {
        //
        $get_data_plot = DB::table('plots')
            ->select('name', 'file_path')
            ->where('id', '=', $datas)->get();

        $get_data_trac = DB::table('traceability_factors')
            ->select('id', 'received_date', 'name', 'amount', 'price', 'unit', 'source', 'total_price', 'recorder')
            ->where('plot_id', '=', $datas)->get();

        $check_date_trac_use_fact = DB::table('traceability_use_factors')->select('date_of_use')->where('plot_id', '=', $datas)->count();
        $get_data_trac_use_fact = DB::table('traceability_use_factors')
            ->select('date_of_use')
            ->where('plot_id', '=', $datas)->get()->first();
        // foreach($get_data_trac_use_fact as $key_data_trac_use_fact){}
        
        $check_date_trac_harv = DB::table('traceability_harvests')->select('harvest_date')->where('plot_id', '=', $datas)->count();
        $get_data_trac_harv = DB::table('traceability_harvests')
            ->select('harvest_date')
            ->where('plot_id', '=', $datas)->get()->first();
            // foreach($get_data_trac_harv as $key_data_trac_harv => $value_data_trac_harv){}

        // dd($get_data_plot);

        return view('traceabilitys.index', compact(
            'get_data_trac_use_fact',
            'get_data_trac_harv',
            'get_data_trac',
            'datas',
            'get_data_plot',
            'check_date_trac_use_fact',
            'check_date_trac_harv'
            // 'value_data_trac_use_fact',
            // 'value_data_trac_harv'
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
}
