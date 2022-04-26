<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;
use App\UserSystemInfoHelper;
class UserSystemInfoController extends Controller
{
  function getusersysteminfo()
  {
    $getip = UserSystemInfoHelper::get_ip();
    $getdevice = UserSystemInfoHelper::get_device();
    $getbrowser = UserSystemInfoHelper::get_browsers();
    $getos = UserSystemInfoHelper::get_os();
    
    // return view('dashboard.index', compact('getip'));
    // echo "<center>$getip <br> $getdevice <br> $getbrowser <br> $getos</center>";
    
  }
}
