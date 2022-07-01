<?php

namespace App\Http\Controllers;

use App\Plot;
use App\Traceability_harvest;
use App\Traceability;
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
    // public function index($plotID, $id)
    public function index($plotID,$reference_id)
    {
        $get_data_plot = DB::table('plots')
            ->where('id', '=', $plotID)->get()->all();
        foreach($get_data_plot as $key_data_plot => $value_data_plot){}
        
        $get_standard_user = DB::table('users')
            ->where('id',$value_data_plot->user_id)->get('standard');

        $traceability = Traceability::withTrashed()->where('plot_id',$plotID)->where('reference_id',$reference_id)->get();
        foreach($traceability as $key_traceability => $value_traceability){}

        $get_data_maintenance = DB::table('note_maintenances')
            ->where('plot_id', $plotID)->where('reference_id', $reference_id)->get()->all();
        // dd($get_standard_user);

        return view('traceabilitys.index', compact(
            'get_data_maintenance',
            'get_standard_user',
            'value_traceability',
            'get_data_plot',
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
