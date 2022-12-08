<div class="side-mobile">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" style="color: #49cea1;" class="font-prompt">จัดการฟาร์ม</a>
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
                <label class="font-prompt vertical-center"><strong id="plotName" style="font-size: x-large;font-weight:bolder;">จัดการฟาร์ม</strong></label>
            </div>
        </div>
    </div>
    <hr style="margin: -1em 0 0 0;">
    <div class="row">
        <div class="container">
            <div class="d-flex justify-content-end">
                <button type="button" id="openFormNewFarmOnMobile" class="ant-btn ant-btn-primary">
                    <span style="font-size: large;">+</span>
                    <span class="font-prompt" style="font-size: medium;">แปลงใหม่</span>
                </button>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div id="alert-mobile" class="alert alert-success">
        <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
    </div>
    @endif
    <div class="row mt-2">
        @foreach($get_data_plot as $key => $value)
        <div class="col-6">
            <a href="{{ route('dashboard.index', ['plotID'=>$value->id]) }}">
                <div class="main-list--item">
                    <div class="main-list--item-preview main-list--item-preview--is-active"><img src="{{ asset('plot_images/'.$value->img_name) }}" alt="Image"></div>
                    <div class="main-list--item-details">
                        <div class="main-list--item-details-name font-prompt"><label class="font-prompt" style="font-size:large;">แปลง :</label> {{ $value->name }}</div>
                        <div class="main-list--item-details-name font-prompt"><label class="font-prompt" style="font-size:large;">ไอดี :</label> {{ $value->id }}</div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

<div class="modal-mobile" style="display: none;">
    <form action="{{ route('plots.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="ant-modal-mask"></div>
        <div class="ant-modal-wrap">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mt-4 ml-3" style="font-weight: bolder; font-size: x-large;">สร้างแปลงใหม่</div>
                                </div>
                            </div>
                            <center>
                                <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <center>
                                    <label class="font-prompt" style="font-weight: bolder; font-size: large;">รายละเอียดแปลง</label>
                                </center>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label style="font-size: medium;">ชื่อแปลง</label>
                                    <input type="text" name="name" class="ant-input font-prompt" value="" placeholder="กรอกชื่อแปลงที่ท่านต้องการสร้าง" required autofocus>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <label style="font-size: medium;">ขนาดแปลง</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="rai_size" type="number" class="ant-input" required style="width:50%;" value="0"> ไร่
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-4"></div>
                                        <div class="col-8">
                                            <input name="ngan_size" type="number" class="ant-input" required style="width:50%;" value="0"> งาน
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-4"></div>
                                        <div class="col-8">
                                            <input name="square_wah_size" type="number" class="ant-input" required style="width:50%;" value="0"> ตารางวา
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">ละติจูด</label>
                                    <input type="text" name="latitude" class="ant-input font-prompt" value="" placeholder="กรอกตำแหน่ง ละติจูด ของที่ตั้งแปลง" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">ลองจิจูด</label>
                                    <input type="text" name="longitude" class="ant-input font-prompt" value="" placeholder="กรอกตำแหน่ง ลองจิจูด ของที่ตั้งแปลง" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">รูปภาพ</label>
                                    <input class="font-prompt" type="file" name="img_name" required style="cursor:pointer;">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">รายละเอียด</label>
                                    <input type="text" rows="5" name="description" class="font-prompt ant-input @error('description') is-invalid @enderror" placeholder="บอกรายละเอียดของแปลงเพิ่มเติมสักหน่อยสิ..." required>
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
                                    <input type="text" name="host" class="ant-input font-prompt" value="" placeholder="กรอกโฮสต์ของผู้ให้บริการ" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">ท็อปปิก รับข้อมูล</label>
                                    <input type="text" name="topic_send" class="ant-input font-prompt" value="" placeholder="กรอกท็อปปิกสำหรับ ( รับข้อมูล ) ของผู้ให้บริการ" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">ท็อปปิก ส่งข้อมูล</label>
                                    <input type="text" name="topic_sub" class="ant-input font-prompt" value="" placeholder="กรอกท็อปปิกสำหรับ ( ส่งข้อมูล ) ของผู้ให้บริการ" required>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="ant-modal-footer mt-4">
                                <button class="ant-btn ant-btn-secondary" id="cancelFormCreatePlotMobile">
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