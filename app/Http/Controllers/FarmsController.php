<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmsController extends Controller
{
    public function index()
    {
        return view('farms');
    }
}
