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
            ->select('name', 'img_name', 'file_path')
            ->where('id', '=', $datas)->get();

        $get_data_trac = DB::table('traceability_factors')
            ->select('id', 'received_date', 'name', 'amount', 'price', 'unit', 'source', 'total_price', 'recorder')
            ->where('plot_id', '=', $datas)->get();

        $get_data_trac_use_fact = DB::table('traceability_use_factors')
            ->select('id', 'date_of_use', 'name_of_use', 'amount', 'unit', 'recorder')
            ->where('plot_id', '=', $datas)->get()->first();

        $get_data_trac_harv = DB::table('traceability_harvests')
            ->select('id', 'harvest_date', 'product', 'total_product', 'unit', 'recorder')
            ->where('plot_id', '=', $datas)->get()->first();

        // dd($v_plot_id);

        return view('traceabilitys.index', compact(
            'get_data_trac_use_fact',
            'get_data_trac_harv',
            'get_data_trac',
            'datas',
            'get_data_plot'
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
