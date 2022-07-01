@extends('admin.layout')

@section('content')

@guest
@if (Route::has('register'))

@endif
@else
<div class="user-layout-right-content user-layout-right-content-fold">
    <div></div>
    <div class="main-layout products-container">
        <div class="mt-5 mb-3" style="padding-bottom: 1rem; border-bottom:#49cea1 1px solid;">
            <!-- <div class="main-layout--header" style="border-bottom-color:#49cea1;"> -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="main-layout--header-name font-prompt">ข้อมูลผู้ใช้</div>
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
            <div id="alert" class="alert alert-success">
                <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
            </div>
            @endif
            @php $i = 0; $j = 0; $k = 0; $s = 0; $l = 0;@endphp
            <style>
                .font-m {
                    font-size: medium;
                }
                .font-l {
                    font-size: large;
                }
            </style>
            <div class="row">
                <div class="col-sm-6">
                    <div class="box-border-shadow mt-4 p-3">
                        <div class="width-border p-4" style="margin-bottom: -.1em;">
                            <h4 class="font-prompt">รายละเอียดผู้ใช้</h4>
                            <hr>
                            @foreach($get_user as $key_user => $value_user)
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    ชื่อ : {{ $value_user->name }}
                                </span>
                            </div>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    อีเมล : {{ $value_user->email }}
                                </span>
                            </div>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    ที่อยู่ : {{ $value_user->address }}
                                </span>
                            </div>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    มาตรฐานการรับรอง : {{ $value_user->standard }}
                                </span>
                            </div>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    สมัครใช้งาน : {{ $value_user->created_at }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box-border-shadow mt-4 p-3">
                        <div class="width-border p-4" style="margin-bottom: -.1em;">
                            <h4 class="font-prompt">รายการแปลงของผู้ใช้</h4>
                            <hr>
                            @foreach($viewPlot as $key_viewPlot => $value_viewPlot)
                            <a href="{{ route('admin.viewPlot', [$userID, 'plotID' => $value_viewPlot->id]) }}" target="_blank" class="ant-btn">{{$value_viewPlot->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endguest
@endsection