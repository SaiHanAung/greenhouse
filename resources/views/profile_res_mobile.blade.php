{{--
<div class="side-mobile">
    <div id="mySidenav" class="sidenav">
        <a href="{{ route('plots.index') }}" class="font-prompt">จัดการฟาร์ม</a>
        <ul>
            <li style="list-style-type: none;"><a href="{{ route('dashboard.index', $value_plot_id->id) }}" class="font-prompt">แผงควบคุม</a></li>
            <li style="list-style-type: none;"><a href="{{ route('savenote.index', $value_plot_id->id) }}" class="font-prompt">จดบันทึก</a></li>
            <li style="list-style-type: none;"><a href="{{ route('setting.index', $value_plot_id->id) }}" class="font-prompt">ตั้งค่า</a></li>
            <li style="list-style-type: none;"><a href="{{ route('qrcode.index', $value_plot_id->id) }}" class="font-prompt">QR Code</a></li>
        </ul>
        <a href="javascript:void(0)" style="color: #49cea1;" class="font-prompt">โปรไฟล์</a>
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
            <div class="col-6" style="display:flex;justify-content:flex-end;">
                <label class="font-prompt vertical-center"><strong id="plotName" style="font-size: x-large;font-weight:bolder;">โปรไฟล์</strong></label>
            </div>
        </div>
    </div>
    <hr>
    <div class="row" style="margin: 2em 0 2em 0;">
        <div class="col-12">
            <div class="container">
                <div class="width-border p-4" style="font-size: 18px;">
                    <div class="row mb-4">
                        <div class="dropdown">
                            <div class="d-flex justify-content-between">
                                <span class="mt-2"><strong>โปรไฟล์ผู้ใช้</strong></span>
                                <button type="button" class="ant-btn"><span class="linearicon linearicon-dots undefined"></span></button>
                            </div>
                            <div class="dropdown-content">
                                <a href="javascript:void(0)" id="openUpdateProfile"><img src="{{ asset('/imgs/writing.png') }}" alt="icon" width="8%"><span style="margin-left: 1rem;">แก้ไข</span></a>
                                <script>
                                    $(document).ready(function() {
                                        $('#openUpdateProfile').click(function() {
                                            $('.updateProfile').show();
                                        });
                                        $('#cancelUpdateProfile').click(function() {
                                            $('.updateProfile').hide();
                                        });
                                        $('#openUpdatePassword').click(function() {
                                            $('.updatePassword').show();
                                        });
                                        $('#cancelUpdatePassword').click(function() {
                                            $('.updatePassword').hide();
                                        });
                                    });
                                </script>
                                <a href="javascript:void(0)" id="openUpdatePassword"><img src="{{ asset('/imgs/lock.png') }}" alt="icon" width="8%"><span style="margin-left: 1rem;">ตั้งรหัสผ่านใหม่</span></a>
                                <a href="javascript:void(0)" style="color: red;"><img src="{{ asset('/imgs/trash.png') }}" alt="icon" width="8%"><span style="margin-left: 1rem;">ลบบัญชี</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span style="font-size: 16px;">ชื่อผู้ใช้ : {{ Auth::user()->name }}</span>
                    </div>
                    <div class="row mt-3">
                        <span style="font-size: 16px;">อีเมล : {{ Auth::user()->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="updateProfile" style="display: none;">
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="ant-modal-mask"></div>
        <div class="ant-modal-wrap">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-title">
                            <center>
                                <div class="mt-4" style="font-size:large;font-weight:bolder;">โปรไฟล์ผู้ใช้</div>
                                <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label style="font-size: medium;">ชื่อ</label>
                                    <input name="name" type="text" class="ant-input font-prompt" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">อีเมล</label>
                                    <input name="email" type="text" class="ant-input font-prompt" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="ant-modal-footer mt-4">
                                <button type="button" class="ant-btn ant-btn-secondary" id="cancelUpdateProfile">
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
<div class="updatePassword" style="display: none;">
    <form action="" method="POST">
        @csrf
        <div class="ant-modal-mask"></div>
        <div class="ant-modal-wrap">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-title">
                            <center>
                                <div class="mt-4" style="font-size:large;font-weight:bolder;">ตั้งรหัสผ่านใหม่</div>
                                <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label style="font-size: medium;">รหัสผ่านปัจจุบัน</label>
                                    <input name="curren_pasword" type="text" class="ant-input font-prompt" value="">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">รหัสผ่านใหม่</label>
                                    <input name="new_pasword" type="text" class="ant-input font-prompt" value="">
                                </div>
                            </div>
                            <div class="ant-modal-footer mt-4">
                                <button type="button" class="ant-btn ant-btn-secondary" id="cancelUpdatePassword">
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
</div>--}}