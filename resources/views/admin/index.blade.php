@extends('admin.layout')

@section('content')

@guest
@if (Route::has('register'))

@endif
@else
<?php
$userID = Auth::user()->id;

$get_data_plot = DB::table('plots')
    ->select('id', 'name', 'host', 'topic_send', 'topic_sub', 'description','img_name')
    ->where('user_id', '=', $userID)->get();
?>
<div class="user-layout-right-content user-layout-right-content-fold">
    <div></div>
    <div class="main-layout products-container">
        <div class="mt-5 mb-3" style="padding-bottom: 1rem; border-bottom:#49cea1 1px solid;">
            <!-- <div class="main-layout--header" style="border-bottom-color:#49cea1;"> -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="main-layout--header-name font-prompt">จัดการผู้ใช้</div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6" style="display: flex; justify-content:flex-end;">
                    <a href="{{ route('logout.perform') }}" class="ant-btn ml-3">
                        <span class="linearicon linearicon-exit"></span>
                        <span class="font-prompt">ออกจากระบบ</span>
                    </a>
                </div>
            </div>
            <div class="main-layout--header-options">
            </div>
        </div>
        <div class="main-layout--content">
            @if ($message = Session::get('success')) 
            <div id="alert" class="alert alerSuccess">
                <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
            </div>
            @endif
            @php $i = 0; $j = 0; $k = 0; $s = 0; $l = 0;@endphp
            <div class="box-border-shadow mt-4 p-3">
                <table id="customers" style="font-family: 'Prompt', sans-serif;">
                    <tr>    
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">ชื่อ</th>
                        <th style="text-align: center;">ที่อยู่</th>
                        <th style="text-align: center;">อีเมล</th>
                        <th style="text-align: center;">ดู</th>
                        <th style="text-align: center;">แก้ไข</th>
                        <th style="text-align: center;">ลบ</th>
                    </tr>
                    @foreach($data_user as $key_data_user => $value_data_user)
                    <tr>
                        <td class="font-prompt" style="text-align: center;">{{ ++$i }}</td>
                        <td class="font-prompt" style="text-align: center;">{{ $value_data_user->name }}</td>
                        <td class="font-prompt" style="text-align: center;">{{ $value_data_user->address }}</td>
                        <td class="font-prompt" style="text-align: center;">{{ $value_data_user->email }}</td>
                        <td class="center">
                            <a href="{{ route('admin.viewUser', ['userID' => $value_data_user->id]) }}" target="_blank" class="btn-info btn-sm center-sub">
                                <img src="/imgs/view.png" alt="icon" style="width: 1.5em;">
                            </a>
                        </td>
                        <td class="center">
                            <a href="{{ route('admin.editPassword', ['userID' => $value_data_user->id]) }}" class="btn-warning btn-sm center-sub">
                                <img src="/imgs/pencil.png" alt="icon" style="width: 1.5em;">
                            </a>
                        </td>
                        <td class="center">
                            <form action="{{ route('admin.destroyUser', ['userID' => $value_data_user->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger btn-sm center-sub" style="font-size: medium; color:white;">X</button>
                            </form>
                        </td>
                    </tr>
            
                    @endforeach
                </table>
            </div>
            <div class="settings-user-content main-list">
                <div class="row">
                    {{--
                        {{$data->links()}}
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endguest
@endsection