@extends('switches.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold font-prompt">
    <div class="main-layout products-container">
        <div class="main-layout--header" style="border-bottom-color:#49cea1;">
            <div class="main-layout--header-name font-prompt">แปลง : {{$value_name_sub}}</div>
            <div class="main-layout--header-options">
                <nav>
                    <div class="nav nav-tabs" style="border-bottom-color: #49cea1;">
                        <label class="nav-link clearfont active" style="color: #49cea1;border-color: #49cea1;border-bottom-color:transparent;">แผงควบคุม</label>
                        <button class="nav-link"><a href="{{ route('savenote.index', $datas) }}" class="clearfonts">จดบันทึก</a></button>
                        <!-- <button class="nav-link"><a href="{{ route('report.index', $datas) }}" class="clearfonts">รายงาน</a></button> -->
                        <button class="nav-link"><a href="{{ route('plots.show', $datas) }}" class="clearfonts">ตั้งค่า</a></button>
                        <button class="nav-link"><a href="{{ route('qrcode.index', $datas) }}" class="clearfonts">QR Code</a></button>
                    </div>
                </nav>
                <a href="{{ route('logout.perform') }}" class="ant-btn ml-3">
                    <span class="linearicon linearicon-exit"></span>
                    <span class="font-prompt">ออกจากระบบ</span>
                </a>
            </div>
        </div>
        <div class="main-layout--content">
            <section style="margin-top: 1rem;">
                <div class="worko-tabs">

                    <input class="state" type="radio" id="tab-one" />
                    <input class="state" type="radio" id="tab-two" />
                    <input class="state" type="radio" id="tab-three" checked />
                    <input class="state" type="radio" id="tab-four" />

                    <div class="tabs flex-tabs">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div style="position: relative;">
                                        <a href="{{ route('dashboard.index', $datas) }}">
                                            <label class="tab font-black font-prompt">โดยรวม</label>
                                        </a>
                                        <!-- <a href="{{ route('autorun.index', $datas) }}">
                                            <label class="tab font-black font-prompt">อัตโนมัติ</label>
                                        </a> -->
                                        <label for="tab-three" id="tab-three-label" class="tab font-black font-prompt">สวิตซ์</label>
                                        <!-- <a href="{{ route('dashboard.settime', $datas) }}">
                                            <label class="tab font-black font-prompt">ตั้งเวลา</label>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="main-layout--header-options">
                                    <button type="button" id="openFormCreateSwitch" class="ant-btn ant-btn-primary">
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <span style="font-size: xx-large;">+</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span style="font-size: medium;">สร้างสวิตซ์</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                        <div id="alert" class="alert alert-success">
                            <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
                        </div>
                        @endif

                        @foreach ($get_host_topic as $keyht => $valueht)
                        <input id="input_host" type="hidden" value="{{$valueht->host}}">
                        <input id="input_topic" type="hidden" value="{{$valueht->topic_sub}}">
                        @endforeach
                        <div id="tab-three-panel" class="panel active">
                            <div class="row">
                                @foreach ($get_data_switches as $key => $value)
                                <input type="hidden" id="s_{{$value->id}}" value="{{$value->port}}">
                                <div class="col-sm-3">
                                    <div class="width-border">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="m-3 font-prompt" style="vertical-align: middle;"><img src="/imgs/power-off.png" class="mr-1" width="25%" alt="icon">{{ $value->name }}</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="bt-last" style="margin: .5em .5em 0 0;">
                                                    <form action="{{ route('switch.destroy', $value->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-secondary btn-sm">X</button>
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
                                                <p class="mt-3 font-prompt">พอร์ต : {{ $value->port }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="ant-modal-root-3-1" style="display: none;">
    <form action="{{ route('switch.store') }}" method="POST">
        @csrf
        <div class="ant-modal-mask"></div>
        <div class="ant-modal-wrap ant-modal-centered">
            <div class="ant-modal">
                <div class="ant-modal-content">
                    <div class="ant-modal-header">
                        <div class="ant-modal-title" style="font-size:large;font-weight:bolder;">สร้างสวิตซ์ เปิด-ปิด</div>
                    </div>
                    <div class="ant-modal-body" id="FarmInputRecordTypeAndSourceShow">
                        <div class="ant-row ant-form-item ant-form-item-with-help own-custom-form-field normal-offset normal-offset ant-form-item-has-success">
                            <div class="font-prompt">ชื่อสวิตซ์</div>
                            <div class="ant-col ant-form-item-control">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input name="name" type="text" class="ant-input font-prompt" placeholder="ชื่อสวิตซ์" required></div> 
                                </div>
                                <div class="ant-form-item-explain ant-form-item-explain-success">
                                    <!-- <div role="alert">Use only letters, digits, and spaces</div> -->
                                    <div role="alert" class="font-prompt">ใช้เฉพาะตัวอักษร, ยัติภังค์, จุด, และช่องว่าง</div>
                                </div>
                            </div>
                        </div>
                        <div class="ant-row ant-form-item ant-form-item-with-help own-custom-form-field normal-offset normal-offset ant-form-item-has-success" style="row-gap: 0px;">
                            <div class="font-prompt">พอร์ต</div>
                            <div class="ant-col ant-form-item-control">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-select ant-select-single">
                                        <select class="ant-select-selector font-prompt" name="port" required>
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
                                            <option class="special" value="soc_8">
                                                <span class="">soc 8</span>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('port')
                        <div class="alert alert-danger font-prompt">พอร์ตที่เลือกถูกใช้อยู่ ใช้พอร์ตซ้ำไม่ได้</div>
                        @enderror
                        <input name="status" type="hidden" class="ant-input" value="0">
                        <input type="hidden" name="plot_id" value="{{$datas}}">
                    </div>
                    <div class="ant-modal-footer"><button type="button" class="ant-btn ant-btn-secondary" id="cancelFormCreateSwitch" ant-click-animating-without-extra-node="false"><span>ยกเลิก</span></button><button type="submit" class="ant-btn ant-btn-primary"><span>ยืนยัน</span></button></div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#openFormCreateSwitch').click(function() {
            $('.ant-modal-root-3-1').show();
        });
        $('#cancelFormCreateSwitch').click(function() {
            $('.ant-modal-root-3-1').hide();
        });
    });
</script>

<!-- CDN MQTT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>

@endsection