<?php

namespace App\Http\Controllers;

use PDF;
use App\Plot;
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

        $userID = Auth::user()->id;

        $get_data_plot = DB::table('plots')
            ->select('id', 'name', 'host', 'topic_send', 'description')
            ->where('user_id', '=', $userID)->get();

        $tracUrl = "https://app-greenhouse-project.herokuapp.com/traceability/" . $datas;
        $qrcode = "https://chart.googleapis.com/chart?cht=qr&chl=" . $tracUrl . "&chs=360x360&choe=UTF-8";

        return view('qrcodes.index', compact(
            'value_name_sub',
            'datas',
            'get_data_plot',
            'qrcode'
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

    public function downloadPDF($datas, Request $request )
    {

        $tracUrl = "https://app-greenhouse-project.herokuapp.com/traceability/" . $datas;
        $qrcode = "https://chart.googleapis.com/chart?cht=qr&chl=" . $tracUrl . "&chs=200x200&choe=UTF-8";

        $pdf = PDF::loadView('pdf', compact('qrcode'));
        return $pdf->download('Qrcode.pdf');
    }
}
