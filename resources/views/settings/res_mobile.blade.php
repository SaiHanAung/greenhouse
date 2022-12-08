<div class="side-mobile">
    <div id="mySidenav" class="sidenav">
        <a href="{{ route('plots.index') }}" class="font-prompt">จัดการฟาร์ม</a>
        <ul>
            <li style="list-style-type: none;"><a href="{{ route('dashboard.index', $plotID) }}" class="font-prompt">แผงควบคุม</a></li>
            <li style="list-style-type: none;"><a href="{{ route('savenote.index', $plotID) }}" class="font-prompt">จดบันทึก</a></li>
            <li style="list-style-type: none;"><a href="javascript:void(0)" style="color: #49cea1;" class="font-prompt">ตั้งค่า</a></li>
            <li style="list-style-type: none;"><a href="{{ route('qrcode.index', $plotID) }}" class="font-prompt">QR Code</a></li>
        </ul>
        <a href="{{ route('profile') }}" class="font-prompt">โปรไฟล์</a>
        <a href="{{ route('logout.perform') }}" class="font-prompt">ออกจากระบบ</a>
    </div>

    <div id="main" style="position:relative;">
        <div class="row" style="margin-top: -1em;">
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
                <label class="font-prompt vertical-center"><strong id="plotName" style="font-size: large;font-weight:bolder;"> แปลง : {{$value_data_plot->name}}</strong></label>
            </div>
        </div>
    </div>
    <hr style="margin: -1em 0 .5em 0">
    <div class="container">
        <div class="row" style="margin-top: -1em;">
            <div class="bt-last">
                <button class="bt-edit-farm-record btn-sm mr-2" id="openFormEditPlotOnMobile">แก้ไข</button>
                <button type="button" onclick="document.getElementById('delete-plot-mobile').style.display='block'" class="bt-delete-farm-record btn-sm">ลบแปลง</button>
            </div>
            <div class="col-12 mt-3">
                <div class="width-border">
                    <div class="p-4">
                        <h4 class="font-prompt">รายละเอียดแปลง</h4>
                        <div class="row">
                            <label class="mb-2" style="font-size:medium;"><strong>ขนาดแปลง : </strong><span style="font-size: medium;">{{ $value_data_plot->rai_size }} ไร่ {{ $value_data_plot->ngan_size }} งาน {{ $value_data_plot->square_wah_size }} ตารางวา</span></label>
                        </div>
                        <div class="row">
                            <label class="mb-2" style="font-size:medium;"><strong>ละติจูด : </strong><span style="font-size: medium;">{{ $value_data_plot->latitude }}</span></label>
                        </div>
                        <div class="row">
                            <label class="mb-2" style="font-size:medium;"><strong>ลองจิจูด : </strong><span style="font-size: medium;">{{ $value_data_plot->longitude }}</span></label>
                        </div>
                        <div class="row">
                            <label style="font-size:medium;"><strong>คำอธิบาย : </strong><span style="font-size: medium;">{{ $value_data_plot->description }}</span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" style="margin-top: -2em;">
                <div class="width-border">
                    <div class="p-4">
                        <h3 class="font-prompt">รายละเอียดระบบไอโอที</h3>
                        <div class="row">
                            <label class="mb-2" style="font-size:large;"><strong>โฮสต์ : </strong><span>{{ $value_data_plot->host }}</span></label>
                        </div>
                        <div class="row">
                            <label class="mb-2" style="font-size:large;"><strong>ท็อปปิกรับข้อมูล : </strong><span style="font-size: medium;">{{ $value_data_plot->topic_send }}</span></label>
                        </div>
                        <div class="row">
                            <label class="mb-2" style="font-size:large;"><strong>ท็อปปิกส่งข้อมูล : </strong><span style="font-size: medium;">{{ $value_data_plot->topic_sub }}</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="edit-plot-mobile" style="display:none">
    <form action="{{ route('plots.update', $plotID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="ant-modal-mask"></div>
        <div class="ant-modal-wrap">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mt-4 ml-3" style="font-weight: bolder; font-size: x-large;">แก้ไขแปลง</div>
                                </div>
                            </div>
                            <center>
                                <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                            </center>
                        </div>
                        <div class="card-body">
                            @foreach($get_data_plot as $key => $value)
                            <div class="row">
                                <center>
                                    <label class="font-prompt" style="font-weight: bolder; font-size: large;">รายละเอียดแปลง</label>
                                </center>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label style="font-size: medium;">ชื่อแปลง</label>
                                    <input type="text" name="name" class="ant-input font-prompt" value="{{ $value->name }}" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <label style="font-size: medium;">ขนาดแปลง</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="rai_size" type="number" class="ant-input" required style="width:50%;" value="{{ $value->rai_size }}"> ไร่
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-4"></div>
                                        <div class="col-8">
                                            <input name="ngan_size" type="number" class="ant-input" required style="width:50%;" value="{{ $value->ngan_size }}"> งาน
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-4"></div>
                                        <div class="col-8">
                                            <input name="square_wah_size" type="number" class="ant-input" required style="width:50%;" value="{{ $value->square_wah_size }}"> ตารางวา
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">ละติจูด</label>
                                    <input type="text" name="latitude" class="ant-input font-prompt" value="{{ $value->latitude }}" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">ลองจิจูด</label>
                                    <input type="text" name="longitude" class="ant-input font-prompt" value="{{ $value->longitude }}" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">รูปภาพ</label>
                                    <input class="font-prompt" type="file" name="img_name" required style="cursor:pointer;">
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <center>
                                                <img src="{{ asset('plot_images/'.$value->img_name) }}" alt="Image" width="90%">
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <label style="font-size: medium;">รายละเอียด</label>
                                    <input type="text" rows="5" name="description" class="font-prompt ant-input @error('description') is-invalid @enderror" value="{{ $value->description }}" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <center>
                                    <label class="font-prompt" style="font-weight: bolder; font-size: large;">รายละเอียดระบบไอโอที</label>
                                </center>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">โฮสต์</label>
                                    <input type="text" name="host" class="ant-input font-prompt" value="{{ $value->host }}" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">ท็อปปิก รับข้อมูล</label>
                                    <input type="text" name="topic_send" class="ant-input font-prompt" value="{{ $value->topic_send }}" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">ท็อปปิก ส่งข้อมูล</label>
                                    <input type="text" name="topic_sub" class="ant-input font-prompt" value="{{ $value->topic_sub }}" required>
                                </div>
                            </div>
                            @endforeach
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="ant-modal-footer mt-4">
                                <button class="ant-btn ant-btn-secondary" id="cancelFormEditPlotMobile">
                                    <span>ยกเลิก</span>
                                </button>
                                <button type="submit" class="ant-btn ant-btn-primary">
                                    <span>ยืนยัน</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </form>
</div>

<div class="form-setting-plant-mobile" style="display: none;">
    <form action="{{ route('dashboard.storeSettingPlant') }}" method="POST">
        @csrf
        <div class="ant-modal-mask"></div>
        <div class="ant-modal-wrap">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-title">
                            <center>
                                <div class="mt-4" style="font-size:large;font-weight:bolder;">ตั้งค่าการปลูก</div>
                                <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label style="font-size: medium;">พืชที่ปลูก</label>
                                    <input name="name" type="text" class="ant-input" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">ชื่อผู้ปลูก</label>
                                    <input name="grower_name" type="text" class="ant-input" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">วันที่เริ่มปลูก</label>
                                    <input class="ant-input font-prompt" type="date" name="date_of_plant" id="datePicker_start_plant" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="font-prompt" style="font-size: medium;">เก็บเกี่ยวผลผลิตในอีก <input name="harvest_day" type="number" class="ant-input" required style="width:20%;"> วัน</div>
                                </div>
                            </div>
                            <input type="hidden" name="plot_id" value="{{$plotID}}">
                            <div class="ant-modal-footer mt-4">
                                <button class="ant-btn ant-btn-secondary" id="cancelFormSettingPlantMobile">
                                    <span>ยกเลิก</span>
                                </button>
                                <button type="submit" class="ant-btn ant-btn-primary">
                                    <span>ยืนยัน</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </form>
</div>
<div id="delete-plot-mobile" class="modal">
    <span onclick="document.getElementById('delete-plot-mobile').style.display='none'" class="close" title="Close Modal">×</span>
    <form class="modal-content" style="width: 80%;" action="{{ route('plots.destroy', $plotID) }}" method="post">
        <div class="container">
            <div class="row">
                <h3 class="font-prompt">แปลง : {{ $value_data_plot->name }}</h3>
            </div>
            <div class="row">
                <p class="font-prompt">ต้องการลบแปลงนี้หรือไม่?</p>
            </div>
            <div class="clearfix">
                <div class="row">
                    <button type="button" onclick="document.getElementById('delete-plot-mobile').style.display='none'" class="cancelbtn font-prompt" style="font-size: medium;font-weight:bolder;">ยกเลิก</button>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="deletebtn font-prompt" style="font-size: medium;font-weight:bolder;">ยืนยัน</button>
                </div>
            </div>
        </div>
    </form>
</div>