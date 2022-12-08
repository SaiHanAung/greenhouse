<div class="side-mobile">
    <div id="mySidenav" class="sidenav">
        <a href="{{ route('plots.index') }}" class="font-prompt">จัดการฟาร์ม</a>
        <ul>
            <li style="list-style-type: none;"><a href="javascript:void(0)" style="color: #49cea1;" class="font-prompt">แผงควบคุม</a></li>
            <li style="list-style-type: none;"><a href="{{ route('savenote.index', $plotID) }}" class="font-prompt">จดบันทึก</a></li>
            <li style="list-style-type: none;"><a href="{{ route('setting.index', $plotID) }}" class="font-prompt">ตั้งค่า</a></li>
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
                <label class="font-prompt vertical-center"><strong id="plotName" style="font-size: large;font-weight:bolder;"> แปลง : {{$value_name_sub}}</strong></label>
            </div>
        </div>
    </div>
    <hr style="margin: -1em 0 .5em 0">
    <div class="row">
        <a href="{{ route('dashboard.index', $plotID) }}" class="bt-w-bg btn-sm font-prompt ml-4" style="width:fit-content;">
            โดยรวม
        </a>
        <a href="javascript:void(0)" class="bt-green font-prompt btn-sm ml-2" style="width:fit-content;">ระบบไอโอที</a>
    </div>
    <hr style="margin: .5em 0 -.5em 0;">
    <div class="row">
        <div class="col-12">
            <div class="container">
                <div class="d-flex justify-content-end">
                    <button id="openFormCreateSwitchMobile" class="bt-create-farm-record btn-sm font-black">
                        + สร้างสวิตซ์
                    </button>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div id="alert-mobile" class="alert alert-success">
        <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
    </div>
    @endif

    @foreach ($get_host_topic as $keyht => $valueht)
    <input id="input_host" type="hidden" value="{{$valueht->host}}">
    <input id="input_topic" type="hidden" value="{{$valueht->topic_sub}}">
    @endforeach
    <div class="row mb-2">
        <div class="col-12">
            <center>
                <label style="font-size: 20px;">สวิตช์แบบแมนนวล</label>
            </center>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($get_data_switches as $key => $value)
            <div class="col-6" style="margin-bottom: -2em;">
                <input type="hidden" id="s_{{$value->id}}" value="{{$value->port}}">
                <div class="width-border">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="m-3 font-prompt" style="font-size:16px">{{ $value->name }}</h4>
                        </div>
                        <div class="col-6">
                            <div class="bt-last" style="margin: .5em .5em 0 0;">
                                <form id="destroySwich" action="{{ route('switch.destroy', $value->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascrip:void(0)" onclick="event.preventDefault(); document.getElementById('destroySwich').submit();">
                                        <img class="bt-edit-switch" src="/imgs/cancel-green.png" alt="icon" style="width: .9em;">
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <center>
                            <label class="switch">
                                <input id="port_{{$value->id}}" data-id="{{$value->id}}" onchange=myFunction({{$value->id}}) onchange=sub({{$value->id}}) value={{$value->status}} class="toggle-class switch_off" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $value->status ? 'checked' : '' }}>

                                <span class="slider round">
                                    <p class="text-off"></p>
                                </span>
                            </label>
                        </center>
                    </div>
                    <div class="row">
                        <div class="center">
                            <p class="mt-3 font-prompt" style="font-size:14px;">พอร์ต : {{ $value->port }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <hr style="margin-top: -1em;">
    <div class="row mb-2">
        <div class="col-12">
            <center>
                <label style="font-size: 20px;">สวิตช์แบบตั้งเวลา</label>
            </center>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($get_data_switch_time_set as $key_switch_time_set => $value_switch_time_set)
            <div class="col-12" style="margin-bottom: -1em;">
                <div class="width-border">
                    <div class="row">
                        <input type="hidden" id="port_sts_{{$value_switch_time_set->id}}" value="{{$value_switch_time_set->port}}">
                        <input type="hidden" id="status_sts_{{$value_switch_time_set->id}}" value="">
                        <div class="col-6">
                            <p class="m-3 font-prompt" style="font-size:16px;"><img src="/imgs/clock.png" class="mr-1" width="20%" alt="icon">{{ $value_switch_time_set->name }}</p>
                        </div>
                        <div class="col-6">
                            <div class="bt-last" style="margin: .8em .8em 0 0;">
                                <form id="destroySwichTimeSet" action="{{ route('destroySwichTimeSet', $value_switch_time_set->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascrip:void(0)" onclick="event.preventDefault(); document.getElementById('destroySwichTimeSet').submit();">
                                        <img class="bt-edit-switch" src="/imgs/cancel-green.png" alt="icon" style="width: .9em;">
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <p class="font-prompt ml-4" style="font-size: 16px;">พอร์ด : {{ $value_switch_time_set->port }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="font-prompt ml-4" style="margin-top: -.5em; font-size: 16px;">เวลาเริ่ม : {{ $value_switch_time_set->start_time }}</p>
                                    <input type="hidden" id="start_time_{{$value_switch_time_set->id}}" value="{{$value_switch_time_set->start_time}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="font-prompt ml-4" style="margin-top: -.5em; font-size: 16px;">เวลาหยุด : {{ $value_switch_time_set->stop_time }}</p>
                                    <input type="hidden" id="stop_time_{{$value_switch_time_set->id}}" value="{{$value_switch_time_set->stop_time}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <center>
                                        <input type="hidden" id="port_stop_id_{{$value_switch_time_set->id}}" value="{{$value_switch_time_set->port}}">
                                        <p class="font-prompt" style="font-size: 16px;">สถานะ :
                                            @if($value_switch_time_set->status == 0)
                                            <span class="font-prompt switch-not-work" style="font-size: 16px;">ไม่ทำงาน</span>
                                            @else
                                            <span class="font-prompt switch-working" style="font-size: 16px;">กำลังทำงาน</span><br>
                                            <!-- <button class="ant-btn mt-3" onclick="stopTimeSet({{$value_switch_time_set->id}})" data-toggle="tooltip" title="กดเพื่อหยุดการทำงาน">
                                                                <input type="hidden" id="stop_id_{{$value_switch_time_set->id}}" value="">หยุดทำงาน
                                                            </button> -->
                                            @endif
                                        </p>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="createSwitchMobile" style="display: none;">
    <div class="ant-modal-mask"></div>
    <div class="ant-modal-wrap">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="card">
                    <div class="card-title">
                        <center>
                            <div class="mt-4" style="font-size:large;font-weight:bolder;">สร้างสวิตช์ไอโอที</div>
                            <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                        </center>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <button id="openFormSwitchManualMobile" class="ant-btn" style="width: 100%;">
                                    แมนนวล
                                </button>
                            </div>
                            <div class="col-6">
                                <button id="openFormSwitchTimeSetMobile" class="ant-btn" style="width: 100%;">
                                    ตั้งเวลา
                                </button>
                            </div>
                        </div>
                        <div class="ant-modal-footer mt-4">
                            <button class="ant-btn ant-btn-secondary" id="cancelCreateSwitchMobile" ant-click-animating-without-extra-node="false">
                                <span>ยกเลิก</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</div>
<p style="margin:50em;">.</p>
<div class="switchManualMobile" style="display: none;">
    <form action="{{ route('switch.store') }}" method="POST">
        @csrf
        <div class="ant-modal-mask"></div>
        <div class="ant-modal-wrap">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-title">
                            <center>
                                <div class="mt-4" style="font-size:large;font-weight:bolder;">สร้างสวิตซ์แบบแมนนวล</div>
                                <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label style="font-size: medium;">ชื่อสวิตซ์</label>
                                    <input name="name" type="text" class="ant-input font-prompt" placeholder="เช่น รดน้ำ" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">พอร์ต</label>
                                    <select class="ant-input font-prompt" name="port" required>
                                        <option class="special" value="soc_0">
                                            <span class="">soc 0</span>
                                        </option>
                                        <option class="special" value="soc_1">
                                            <span class="">soc 1</span>
                                        </option>
                                        <option class="special" value="soc_2">
                                            <span class="">soc 2</span>
                                        </option>
                                        <option class="special" value="soc_3">
                                            <span class="">soc 3</span>
                                        </option>
                                        <option class="special" value="soc_4">
                                            <span class="">soc 4</span>
                                        </option>
                                        <option class="special" value="soc_5">
                                            <span class="">soc 5</span>
                                        </option>
                                        <option class="special" value="soc_6">
                                            <span class="">soc 6</span>
                                        </option>
                                        <option class="special" value="soc_7">
                                            <span class="">soc 7</span>
                                        </option>
                                    </select>
                                </div>
                            </div>
                            @error('port')
                            <div class="alert alert-danger font-prompt">พอร์ตที่เลือกถูกใช้อยู่ ใช้พอร์ตซ้ำไม่ได้</div>
                            @enderror
                            <input name="status" type="hidden" class="ant-input" value="0">
                            <input type="hidden" name="plot_id" value="{{$plotID}}">
                            <div class="ant-modal-footer mt-4">
                                <button class="ant-btn ant-btn-secondary" id="cancelSwitchManualMobile">
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
<div class="switchTimeSetMobile" style="display: none;">
    <form action="{{ route('switchtTimeSet.store') }}" method="POST">
        @csrf
        <div class="ant-modal-mask"></div>
        <div class="ant-modal-wrap">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-title">
                            <center>
                                <div class="mt-4" style="font-size:large;font-weight:bolder;">สร้างสวิตซ์แบบตั้งเวลา</div>
                                <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label style="font-size: medium;">ชื่อสวิตซ์</label>
                                    <input name="name" type="text" class="ant-input font-prompt" placeholder="เช่น รดน้ำ" required>
                                </div>
                            </div>
                            <div class="row+">
                                <div class="col-12">

                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <label style="font-size: medium;">พอร์ต</label>
                                    <select class="ant-input font-prompt" name="port" required>
                                        <option class="special" value="soc_0">
                                            <span class="">soc 0</span>
                                        </option>
                                        <option class="special" value="soc_1">
                                            <span class="">soc 1</span>
                                        </option>
                                        <option class="special" value="soc_2">
                                            <span class="">soc 2</span>
                                        </option>
                                        <option class="special" value="soc_3">
                                            <span class="">soc 3</span>
                                        </option>
                                        <option class="special" value="soc_4">
                                            <span class="">soc 4</span>
                                        </option>
                                        <option class="special" value="soc_5">
                                            <span class="">soc 5</span>
                                        </option>
                                        <option class="special" value="soc_6">
                                            <span class="">soc 6</span>
                                        </option>
                                        <option class="special" value="soc_7">
                                            <span class="">soc 7</span>
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <input name="status" type="hidden" class="ant-input" value="0">
                            <input type="hidden" name="plot_id" value="{{$plotID}}">
                            <div class="ant-modal-footer mt-4">
                                <button class="ant-btn ant-btn-secondary" id="cancelSwitchTimeSetMobile">
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