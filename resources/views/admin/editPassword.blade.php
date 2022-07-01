@extends('admin.layout')

@section('content')

@guest
@if (Route::has('register'))

@endif
@else
<?php
$userID = Auth::user()->id;

$get_data_plot = DB::table('plots')
    ->select('id', 'name', 'host', 'topic_send', 'topic_sub', 'description','img_name', 'file_path')
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

<div class="formEditPassword" style="display: ;">
    <form action="{{ route('admin.editUserPassword', $userID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="ant-modal-mask"></div>
        <div class="ant-modal-wrap ant-modal-centered">
            <div class="ant-modal">
                <div class="ant-modal-content">
                    <div class="ant-modal-header">
                        <div class="ant-modal-title" style="font-size:large;font-weight:bolder;">แก้ไขรหัสผ่านผู้ใช้</div>
                    </div>
                    <div class="ant-modal-body" id="FarmInputRecordTypeAndSourceShow">
                        @foreach($userName as $key_userName => $value_userName)
                        <div class="ant-row ant-form-item ant-form-item-with-help own-custom-form-field normal-offset normal-offset ant-form-item-has-success" style="row-gap: 0px;">
                            <div class="font-prompt">ผู้ใช้ : {{ $value_userName->name }}</div>
                        </div>
                        @endforeach
                        <div class="ant-row ant-form-item ant-form-item-with-help own-custom-form-field normal-offset normal-offset ant-form-item-has-success" style="row-gap: 0px;">
                            <div class="font-prompt">รหัสผ่านใหม่</div>
                            <div class="ant-col ant-form-item-control">
                                <div class="ant-form-item-control-input">
                                    <input class="ant-input font-prompt" type="text" name="password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-modal-footer">
                        <button type="button" id="cancelFormEditPassword" class="ant-btn ant-btn-secondary">
                            <span>ยกเลิก</span>
                        </button>
                        <button type="submit" class="ant-btn ant-btn-primary">
                            <span>ยืนยัน</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endguest
@endsection