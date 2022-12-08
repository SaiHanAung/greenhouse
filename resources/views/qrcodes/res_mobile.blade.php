<div class="side-mobile">
    <div id="mySidenav" class="sidenav">
        <a href="{{ route('plots.index') }}" class="font-prompt">จัดการฟาร์ม</a>
        <ul>
            <li style="list-style-type: none;"><a href="{{ route('dashboard.index', $plotID) }}" class="font-prompt">แผงควบคุม</a></li>
            <li style="list-style-type: none;"><a href="{{ route('savenote.index', $plotID) }}" class="font-prompt">จดบันทึก</a></li>
            <li style="list-style-type: none;"><a href="{{ route('setting.index', $plotID) }}" class="font-prompt">ตั้งค่า</a></li>
            <li style="list-style-type: none;"><a href="javascript:void(0)" style="color: #49cea1;" class="font-prompt">QR Code</a></li>
        </ul>
        <a href="{{ route('profile') }}" class="font-prompt">โปรไฟล์</a>
        <a href="{{ route('logout.perform') }}" class="font-prompt">ออกจากระบบ</a>
    </div>

    <div id="main" style="position:relative;">
        <div class="row">
            <div class="col-6">
                <span style="cursor:pointer;">
                    <div class="container" onclick="slider(this)" style="width:fit-content;">
                        <div class="bar1-x"></div>
                        <div class="bar2-x"></div>
                        <div class="bar3-x"></div>
                    </div>
                </span>
            </div>
            <div class="col-6">
                <label class="font-prompt vertical-center"><strong id="plotName" style="font-size: x-large;font-weight:bolder;"> แปลง : {{$value_data_plot->name}}</strong></label>
            </div>
        </div>
    </div>
    <div class="row" style="margin: -0.5em 0 2em 0;">
        <hr>
        <div class="col-12 mt-4">
            <div class="container">
                <span style="z-index: 10;">** หลังบันทึกการเก็บเกี่ยวผลผลิตในรอบถัดไป ให้กด (สร้าง Qr code) อีกครั้ง &nbsp; เพื่ออัพเดทข้อมูลให้เชื่อมโยงกับแต่ละรอบของการเก็บเกี่ยว</span>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <img src="{{ $qrcode }}" alt="QrCode" width="80%">
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <a class="bt-create-farm-record font-prompt p-3" href="{{ route('downloadPDF', $plotID)}}">ดาวน์โหลด QR Code</a>
                <input id="url" name="url" type="hidden" value="{{ $qrcode }}">
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center mt-3">
                <span>ลิงค์ตรวจสอบย้อนกลับ :</span>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <a href="{{$tracUrl}}" target="_blank">{{$tracUrl}}</a>
            </div>
        </div>
    </div>
</div>