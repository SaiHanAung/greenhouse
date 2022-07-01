<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->select('name', 'id')->where('name',  'like', '%' . $request->name . '%')->get();
        return response()->json(['data' => $users]);
    }
}
