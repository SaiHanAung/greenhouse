<?php

namespace App\Http\Controllers;

use App\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Plot::all();

        // $userID = Auth::user()->id;

        // $get_data_plot = DB::table('plots')
        //     ->select('id', 'name', 'host', 'topic_send', 'topic_sub', 'description','img_name', 'file_path')
        //     ->where('user_id', '=', $userID)->get();
        
        // dd($get_data_plot);
        // return view('plots.index', compact('data', 'get_data_plot'));
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
        $plot = new Plot;
        $plot->name = $request->input('name');
        $plot->host = $request->input('host');
        $plot->topic_send = $request->input('topic_send');
        $plot->topic_sub = $request->input('topic_sub');
        $plot->rai_size = $request->input('rai_size');
        $plot->ngan_size = $request->input('ngan_size');
        $plot->square_wah_size = $request->input('square_wah_size');
        $plot->latitude = $request->input('latitude');
        $plot->longitude = $request->input('longitude');
        $plot->description = $request->input('description');
        $plot->user_id = $request->input('user_id');
        if($request->hasfile('img_name'))
        {
            $file = $request->file('img_name');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('plot_images', $filename);
            $plot->img_name = $filename;
        }
        $plot->save();

        return redirect()->route('plots.index')
                         ->with('success', 'สร้างแปลงสำเร็จแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function show($plotID)
    {
        //
        // $data = Plot::first()->paginate(10);
        // $userID = Auth::user()->id;

        // $get_data_plot = DB::table('plots')
        //     ->select('id', 'name', 'host', 'topic_send', 'topic_sub', 'rai_size', 'ngan_size', 'square_wah_size', 'description', 'img_name')
        //     ->where('user_id', '=', $userID)->get();
        //     foreach($get_data_plot as $key_data_plot => $value_data_plot){}

        // dd($value_data_plot);
        // return view('settings.index', compact('plotID', 'get_data_plot','value_data_plot'));
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
    public function update(Request $request, $plotID)
    {
        //
        // $plot->update($request->all());

        $plot = Plot::find($plotID);
        $plot->name = $request->input('name');
        $plot->host = $request->input('host');
        $plot->topic_send = $request->input('topic_send');
        $plot->topic_sub = $request->input('topic_sub');
        $plot->description = $request->input('description');
        $plot->user_id = $request->input('user_id');

        if($request->hasfile('img_name'))
        {
            $destination = 'plot_images'.$plot->img_name;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('img_name');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('plot_images', $filename);
            $plot->img_name = $filename;
        }

        $plot->update();
        return redirect()->back()->with('success', 'แก้ไขแปลงสำเร็จแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plot  $plot
     * @return \Illuminate\Http\Response 
     */
    public function destroy($plotID)
    {
        //
        $userID = Auth::user()->id;
        $get_plot_id = DB::table('plots')
            ->select('id')
            ->where('user_id', '=', $userID)->get();
        foreach($get_plot_id as $k_plot_id => $v_plot_id){}

        $plot = Plot::find($plotID);
        $destination = 'plot_images'.$plot->img_name;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        // dd($v_plot_id);
        DB::table('autoruns')->select('id')->where('plot_id', '=', $v_plot_id->id)->delete();
        DB::table('switches')->select('id')->where('plot_id', '=', $v_plot_id->id)->delete();
        DB::table('traceability_factors')->select('id')->where('plot_id', '=', $v_plot_id->id)->delete();
        DB::table('traceability_harvests')->select('id')->where('plot_id', '=', $v_plot_id->id)->delete();
        DB::table('traceability_use_factors')->select('id')->where('plot_id', '=', $v_plot_id->id)->delete();

        $plot->delete();
        // dd($get_plot_id );
        return redirect()->route('plots.index')
                         ->with('success', 'ลบแปลงสำเร็จแล้ว');
    }



}
