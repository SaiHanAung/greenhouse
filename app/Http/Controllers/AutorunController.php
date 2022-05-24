<?php

namespace App\Http\Controllers;

use App\Autorun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutorunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($datas)
    {
        //

        $data_plot = DB::table('plots')->get();

        $get_plot_name = DB::table('plots')
            ->select('name')
            ->where('id', '=', $datas)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
            foreach ($value_name as $key_name_sub => $value_name_sub) {
            }
        }

        $get_data_autorun = DB::table('autoruns')
            ->select('id',
                'name',
                'work_zone',
                'start_time',
                'stop_time',
                'repeat',
                'sunday',
                'monday',
                'tuesday',
                'wednesday',
                'thursday',
                'friday',
                'saturday',
                'updated_at'
            )
            ->where('plot_id', '=', $datas)->get();

        // dd($get_data_autorun);
        return view('autoruns.index', compact('datas', 'value_name_sub', 'get_data_autorun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('autoruns.create');
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
            'work_zone' => 'required',
            'start_time' => 'required',
            'stop_time' => 'required'
        ]);

        Autorun::create($request->all());

        // return redirect()->route('autorun.index')
        //                  ->with('success', 'Autorun create successfully.');
        return back()->with('success', 'สร้างการทำงานอัตโนมัติแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autorun  $autorun
     * @return \Illuminate\Http\Response
     */
    public function show(Autorun $autorun)
    {
        //
        $datas = Autorun::get();
        // dd($data);
        return view('autoruns.index', compact('autorun', 'datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autorun  $autorun
     * @return \Illuminate\Http\Response
     */
    public function edit(Autorun $autorun)
    {
        //
        return view('autoruns.edit', compact('autorun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autorun  $autorun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autorun $autorun)
    {
        //
        $request->validate([
            'name' => 'required',
            'work_zone' => 'required',
            'start_time' => 'required',
            'stop_time' => 'required'
        ]);

        $autorun->update($request->all());

        return redirect()->route('autorun.index')
            ->with('success', 'Autorun update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autorun  $autorun
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutoRun $autorun)
    {
        //
        // $data_autorun = Autorun::get();
        // foreach($data_autorun as $key_autorun => $velue_autorun)
        // {
        //     $id = $velue_autorun->id;
        // }
        // Autorun::get();
        // dd($autorun);
        // $id = DB::table('autoruns')->select('id')->get();
        // $id = DB::table('autoruns')->select('id')->get();
        // $data = $autorun.$data;
        // dd($autorun);

        $autorun->delete();

        // DB::table('autoruns')->select('id', '=', $id)->delete($id);
        // $autorun->delete('id', $id);
        return back()->with('success', 'ลบการทำงานอัตโนมัติแล้ว');
    }
}
