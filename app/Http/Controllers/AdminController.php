<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $data_user = DB::table('users')->where('user_type', null)->get();

        // dd($data_user);
        return view('admin.index', compact(
            'data_user',
        ));
    }

    public function editPassword($userID)
    {
        $data_user = DB::table('users')->where('user_type', null)->get();
        $userName = DB::table('users')->where('id', $userID)->get();

        // dd($data_user);
        return view('admin.editPassword', compact(
            'userName',
            'userID',
            'data_user',
        ));
    }

    public function editUserPassword(Request $request, User $user)
    {
        // $userP = User::where('id',$userID);
        // $userP->password = $request->input('password');
        $user->update($request->all());
        return redirect()->route('admin.index')->with('success', 'แก้ไขรหัสผ่านสำเร็จแล้ว');
    }

    public function viewUser($userID)
    {
        $data_user = DB::table('users')->where('user_type', null)->get();
        $get_user = DB::table('users')->where('user_type', null)->where('id', $userID)->get();

        $viewPlot = DB::table('plots')->where('user_id', $userID)->get();
        $plotID = $viewPlot->pluck('id');

        // dd($v->title);
        return view('admin.viewUser', compact(
            'get_user',
            'viewPlot',
            'data_user',
            'userID',
        ));
    }

    public function viewPlot($userID, $plotID)
    {
        $viewPlot = DB::table('plots')->where('user_id', $userID)->get();
        $get_note_plant_areas = DB::table('note_plant_areas')->where('plot_id', $plotID)->where('deleted_at', null)->get();
        $get_note_plants = DB::table('note_plants')->where('plot_id', $plotID)->where('deleted_at', null)->get();
        $note_maintenances = DB::table('note_maintenances')->where('plot_id', $plotID)->where('deleted_at', null)->get();
        $note_harvests = DB::table('note_harvests')->where('plot_id', $plotID)->where('deleted_at', null)->get();
        $note_sells = DB::table('note_sells')->where('plot_id', $plotID)->where('deleted_at', null)->get();

        $plant_area_total_price = DB::table('note_plant_areas')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $plant_total_price = DB::table('note_plants')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $harvest_total_price = DB::table('note_harvests')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $maintenance_total_price = DB::table('note_maintenances')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        
        $get_host_topic = DB::table('plots')->select('host', 'topic_send', 'topic_sub')->where('id', '=', $plotID)->get();

        // dd($v->title);
        return view('admin.viewPlot', compact(
            'get_host_topic',
            'maintenance_total_price',
            'harvest_total_price',
            'plant_total_price',
            'plant_area_total_price',
            'note_sells',
            'note_harvests',
            'note_maintenances',
            'get_note_plants',
            'get_note_plant_areas',
            'viewPlot',
        ));
    }

    public function destroyUser($userID)
    {
        DB::table('users')->where('user_type', null)->where('id', $userID)->delete();

        return redirect()->route('admin.index')
                        ->with('success', 'ลบผู้ใช้ที่เลือกสำเร็จแล้ว');
    }
}
