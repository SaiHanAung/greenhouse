@extends('qrcodes.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold font-prompt">
    <div class="main-layout products-container">
        <div class="main-layout--header" style="border-bottom-color:#49cea1;">
            <div class="main-layout--header-name font-prompt">แปลง : {{$value_name_sub}}</div>
            <div class="main-layout--header-options">
                <nav>
                    <div class="nav nav-tabs" style="border-bottom-color: #49cea1;">
                        <button class="nav-link"><a href="{{ route('dashboard.index', $plotID) }}" class="clearfonts">แดชบอร์ด</a></button>
                        <!-- <button class="nav-link"><a href="{{ route('report.index', $plotID) }}" class="clearfonts">รายงาน</a></button> -->
                        <button class="nav-link"><a href="{{ route('savenote.index', $plotID) }}" class="clearfonts">จดบันทึก</a></button>
                        <button class="nav-link"><a href="{{ route('setting.index', $plotID) }}" class="clearfonts">ตั้งค่า</a></button>
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
                    <div class="row">
                        <div class="main-layout--header-options">
                            <!-- <a href="javascipt:void(0)" id="openSettingQrcode" class="bt-create-farm-record btn-sm font-prompt mr-2" style="font-size: medium;">ตั้งค่า Qr Code</a> -->
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div id="alert" class="alert alerSuccess">
                        <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
                    </div>
                    @endif 
                    <div class="ant-col ant-col-24" style="margin-top: -1em;">
                        <div class="form-group text-center" id="bio">
                            <div class="row mt-5">
                                <span style="z-index: 1;">** หลังบันทึกการเก็บเกี่ยวผลผลิตในรอบถัดไป ให้กด (สร้าง Qr code) อีกครั้ง &nbsp; เพื่ออัพเดทข้อมูลให้เชื่อมโยงกับแต่ละรอบของการเก็บเกี่ยว</span>
                            </div>
                            <img src="{{ $qrcode }}" alt="QrCode" style="margin-top: -2em;">
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <div style="justify-content: center;">
                                        <a class="bt-create-farm-record font-prompt p-3" href="{{ route('downloadPDF', $plotID)}}">ดาวน์โหลด QR Code</a>
                                        <input id="url" name="url" type="hidden" value="{{ $qrcode }}">
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                            <div class="row mt-5">
                                <span>ลิงค์ตรวจสอบย้อนกลับ : <a href="{{$tracUrl}}" target="_blank">{{$tracUrl}}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


@endsection