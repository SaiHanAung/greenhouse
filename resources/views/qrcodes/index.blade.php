@extends('qrcodes.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold font-prompt">
    <div class="main-layout products-container">
        <div class="main-layout--header" style="border-bottom-color:#49cea1;">
            <div class="main-layout--header-name font-prompt">แปลง : {{$value_name_sub}}</div>
            <div class="main-layout--header-options">
                <nav>
                    <div class="nav nav-tabs" style="border-bottom-color: #49cea1;">
                        <button class="nav-link"><a href="{{ route('dashboard.index', $datas) }}" class="clearfonts">แผงควบคุม</a></button>
                        <!-- <button class="nav-link"><a href="{{ route('report.index', $datas) }}" class="clearfonts">รายงาน</a></button> -->
                        <button class="nav-link"><a href="{{ route('savenote.index', $datas) }}" class="clearfonts">จดบันทึก</a></button>
                        <button class="nav-link"><a href="{{ route('plots.show', $datas) }}" class="clearfonts">ตั้งค่า</a></button>
                        <label class="nav-link clearfont active" style="color: #49cea1;border-color: #49cea1;border-bottom-color:transparent;">QR Code</label>
                    </div>
                </nav>
                <a href="{{ route('logout.perform') }}" class="ant-btn ml-3">
                    <span class="linearicon linearicon-exit"></span>
                    <span class="font-prompt">ออกจากระบบ</span>
                </a>
            </div>
        </div>
        <div class="main-layout--content">
            <section style="margin-top: 1.5rem;">
                <div class="w3-container">
                    @if ($message = Session::get('success'))
                    <div id="alert" class="alert alert-success">
                        <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
                    </div>
                    @endif
                    <div class="ant-col ant-col-24" style="padding-left: 16px; padding-right: 16px;">
                        <div class="form-group">
                            <div class="form-group text-center" id="bio">
                                    <img src="{{ $qrcode }}" alt="QrCode">
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <style>
                                            .pointer {cursor: pointer;}
                                        </style>
                                        <div style="justify-content: center;">
                                            <!-- <p class="text-download font-prompt pointer" onclick="download()">ดาวน์โหลด QR Code</p> -->
                                            <a class="bt-create-farm-record font-prompt p-3" href="{{ route('downloadPDF', $datas)}}">ดาวน์โหลด QR Code</a>
                                            <input id="url" name="url" type="hidden" value="{{ $qrcode }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                                @foreach($get_data_plot as $key => $value)
                                <a href="{{ route('traceability.index', ['datas'=>$value->id]) }}"></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


@endsection