<?php

namespace App\Http\Controllers;

use App\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $plot = DB::table('plots')->get();
        // $get_plot_id = $plot;

        // $data = [];
        

        // foreach ( $get_plot_id as $key => $value )
        // {
        //     $get_plot[$key] = DB::table('plots')->select('user_id')->get();
        //     $data[$value->user_id] = $get_plot[$key];

        //     // dd($get_plot[$key]);
        //     // dd($data);
        // }

        $data = Plot::first()->paginate(10);

        return view('plots.index', compact('data'));
                // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plots.create');
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
            'hardware' => 'required'
        ]);

        Plot::create($request->all());

        return redirect()->route('plots.index')
                         ->with('success', 'Plot create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function show(Plot $plot)
    {
        //
        return view('plots.show', compact('plot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function edit(Plot $plot)
    {
        //
        return view('plots.edit', compact('plot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plot $plot)
    {
        //
        $request->validate([
            'name' => 'required',
            'hardware' => 'required'
        ]);

        $plot->update($request->all());

        return redirect()->route('plots.index')
                         ->with('success', 'Plot update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plot $plot)
    {
        //
        $plot->delete();
        return redirect()->route('plots.index')
                         ->with('success', 'Plot deleted successfully.');
    }


}
