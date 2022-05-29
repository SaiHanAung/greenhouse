@extends('dashboards.layout')

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
                        <button class="nav-link"><a href="{{ route('setting.index', $datas) }}" class="clearfonts">ตั้งค่า</a></button>
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
            <section>
                <div class="worko-tabs">

                    <input class="state" type="radio" id="tab-one" checked />
                    <input class="state" type="radio" id="tab-two" />
                    <input class="state" type="radio" id="tab-three" />
                    <input class="state" type="radio" id="tab-four" />

                    <div class="tabs flex-tabs">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div style="position: relative;">
                                        <label for="tab-one" id="tab-one-label" class="tab font-black font-prompt">โดยรวม</label>
                                        <!-- <a href="{{ route('autorun.index', $datas) }}">
                                            <label class="tab font-black font-prompt">อัตโนมัติ</label>
                                        </a> -->
                                        <a href="{{ route('dashboard.switch', $datas) }}">
                                            <label class="tab font-black font-prompt">สวิตซ์</label>
                                        </a>
                                        <!-- <a href="{{ route('dashboard.settime', $datas) }}">
                                            <label class="tab font-black font-prompt">ตั้งเวลา</label>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="main-layout--header-options">
                                    <button type="button" id="openFormCreateSwitch" class="bt-create-farm-record btn-sm">
                                        <span style="font-size: medium;">เริ่มปลูกใหม่</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="tab-one-panel" class="panel active">
                            @if ($message = Session::get('success'))
                            <div id="alert" class="alert alert-success">
                                <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
                            </div>
                            @endif
                            <!-- <p id="mqtt-value"></p> -->
                            @foreach($get_host_topic as $keyht => $valueht)
                            <input id="input_host" type="hidden" value="{{$valueht->host}}">
                            <input id="input_topic" type="hidden" value="{{$valueht->topic_send}}">
                            @endforeach
                            <div class="settings-user-content"></div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="width-border ">
                                                <h4 class="m-4 font-prompt">ค่าใช้จ่าย</h4>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="chart-container">
                                                            <div class="chart has-fixed-height" id="pie_basic" style="margin-bottom: 1rem; margin-top: -5rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="width-border" style="font-size: medium;">
                                                <div class="row">
                                                    <div class="ml-4 mt-4">
                                                        <span>
                                                            <li>ลงทุนไปแล้ว
                                                                @if($check_tract_total_price == 0)
                                                                0
                                                                @else
                                                                {{$tract_total_price}}
                                                                @endif
                                                                บาท
                                                            </li>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="ml-4">
                                                        <span>
                                                            <li>คาดการณ์การเก็บเกี่ยววันที่</li>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="ml-4 mb-4">
                                                        <span>
                                                            <li>ขายได้ บาท</li>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="width-border">
                                                <h4 class="m-4 font-prompt">อุณหภูมิ</h4>
                                                <div class="row">
                                                    <div class="center">
                                                        <img src="/imgs/temperature.png" width="20%" alt="icon">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <h3 class="mt-2 font-prompt" id="temp">0.0 ํC</h3>
                                                    </div>
                                                </div>
                                                <span class="m-4 font-prompt" id="date-time-temp">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="width-border">
                                                <h4 class="m-4 font-prompt">ความชื้นในอากาศ</h4>
                                                <div class="row">
                                                    <div class="center">
                                                        <img src="/imgs/wind.png" width="20%" alt="icon">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <h3 class="mt-2 font-prompt" id="humid">0.0 %</h3>
                                                    </div>
                                                </div>
                                                <span class="m-4 font-prompt" id="date-time-humid">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>
@endsection