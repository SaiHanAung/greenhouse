<?php

namespace App\Http\Controllers;

use App\Autorun;
use App\Plot;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('plots')->get();

        $userID = Auth::user()->id;

        $get_data_plot = DB::table('plots')
            ->select('id', 'name', 'host', 'topic_send', 'topic_sub', 'description','img_name', 'file_path')
            ->where('user_id', '=', $userID)->get();
        
        // dd($get_data_plot);
        return view('plots.index', compact('data', 'get_data_plot'));
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
            'name' => 'required'
        ]);

        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:png,jpg,gif'
            ]);

            $request->file->store('plot_images','public');

            $plot = new Plot([
                "name" => $request->get('name'),
                "img_name" => $request->get('file'),
                "host" => $request->get('host'),
                "topic_send" => $request->get('topic_send'),
                "topic_sub" => $request->get('topic_sub'),
                "description" => $request->get('description'),
                "user_id" => $request->get('user_id'),
                "img_name" => $request->file->getClientOriginalName(),
                "file_path" => $request->file->hashName()
            ]);
            $plot->save();
        }

        // Plot::create($request->all());

        $userID = Auth::user()->id;
        $get_plot_id = DB::table('plots')
            ->select('id')
            ->where('user_id', '=', $userID)->get();
            foreach($get_plot_id as $k_plot_id => $v_plot_id){}

        return redirect()->route('plots.index')
                         ->with('success', 'สร้างแปลงสำเร็จแล้ว');
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
        // $data = Plot::first()->paginate(10);
        $userID = Auth::user()->id;

        $get_data_plot = DB::table('plots')
            ->select('id', 'name', 'host', 'topic_send', 'description')
            ->where('user_id', '=', $userID)->get();

        foreach($get_data_plot as $keydp => $valuedp){}
        foreach($plot as $keypid => $valuepid){}
        $tracUrl = "http://127.0.0.1:8000/traceability/".$plot->id;
        $qrcode = "https://chart.googleapis.com/chart?cht=qr&chl=".$tracUrl."&chs=180x180&choe=UTF-8";

        // dd($qrcode);
        return view('plots.show', compact('plot', 'get_data_plot', 'qrcode'));
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
        
        $plot->update($request->all());

        return back()->with('success', 'แก้ไขแปลงสำเร็จแล้ว');
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
        $userID = Auth::user()->id;
        $get_plot_id = DB::table('plots')
            ->select('id')
            ->where('user_id', '=', $userID)->get();
        foreach($get_plot_id as $k_plot_id => $v_plot_id){}
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
