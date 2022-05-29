<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {

        return view('profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $this->validate($request, [
            'name' => 'required',
        ]);

        $user->name = $data['name'];

        $user->save();
        return back();
    }
}
