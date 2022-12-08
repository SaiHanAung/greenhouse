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
                <label class="font-prompt pt-5"><strong id="plotName" style="font-size: large;font-weight:bolder;"> แปลง : {{$value_name_sub}}</strong></label>
            </div>
        </div>
    </div>
    <hr style="margin: -1em 0 .5em 0">
    <div class="row" style="margin-left:2em">
        <a href="javascript:void(0)" class="bt-green font-prompt btn-sm" style="font-size: medium; width:fit-content;">
            โดยรวม
        </a>
        <a href="{{ route('dashboard.switch', $plotID) }}" class="bt-w-bg btn-sm font-prompt ml-2" style="color: #000; font-size: medium;width:fit-content;">ระบบไอโอที</a>
    </div>
    <hr style="margin: .5em 0 .1em 0;">
    <div class="row" style="margin-right: 1em;">
        @foreach($get_plot_id as $key_plot_id => $value_plot_id)
        <form id="dashboard-storeTraceability" action="{{ route('dashboard.storeTraceability', $plotID) }}" method="POST" style="display: none;">
            @csrf
        </form>
        <form id="dashboard-newPlant" action="{{ route('dashboard.newPlant', ['plotID' => $value_plot_id->id]) }}" method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <input type="hidden" id="plot_id" value="{{$value_plot_id->id}}">
        <div class="main-layout--header-options mt-3 mb-3">
            @if($check_harv_date == 0)
            @else
            <a href="javascript:void(0)" class="ant-btn btn-sm font-prompt mr-2" style="font-size: medium;" onclick="event.preventDefault(); document.getElementById('dashboard-storeTraceability').submit();">
                <span>สร้าง Qr Code</span>
            </a>
            @endif
            @if($check_setting_plant == 0)
            <a href="javascipt:void(0)" id="openSettingPlantMobile" class="ant-btn btn-sm font-prompt mr-2" style="font-size: medium;">ตั้งค่าการปลูก</a>
            @else
            @endif
            @if($check_sale_product == 0)
            @else
            <a href="javascript:void(0)" class="ant-btn btn-sm font-prompt mr-2" onclick="event.preventDefault(); document.getElementById('dashboard-newPlant').submit();">
                <span style="font-size: medium;">เริ่มปลูกใหม่</span>
            </a>
            @endif
            @if($check_del_date == 0)
            @else
            <a href="javascipt:void(0)" id="openHistoryPlantMobile" class="ant-btn font-prompt " style="font-size: medium;">ประวัติการปลูก</a>

            @endif

        </div>
        @endforeach
    </div>
    @if ($message = Session::get('success'))
    <div id="alert" class="alert alert-success">
        <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
    </div>
    @endif
    @foreach($get_host_topic as $keyht => $valueht)
    <input id="input_host" type="hidden" value="{{$valueht->host}}">
    <input id="input_topic" type="hidden" value="{{$valueht->topic_send}}">
    @endforeach
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="width-border">
                <h4 class="m-4 font-prompt">ค่าใช้จ่าย</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="chart-container">
                            <div class="chart has-fixed-height" id="pie_basic_mobile" style="margin-top: -3rem;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <?php
        $total_pay = number_format($sum_total_price);
        $total_sell = number_format($sale_product);
        ?>
        <div class="col-1"></div>
        <div class="col-10">
            <div class="width-border" style="font-size: medium;">
                <div class="row">
                    <div class="ml-4 mt-4">
                        <span>
                            <li>ค่าใช้จ่าย
                                {{$total_pay}}
                                บาท
                            </li>
                        </span>
                    </div>
                </div>@foreach($get_data_setting_plant as $key_data_setting_plant => $value_data_setting_plant)
                <div class="row">
                    <div class="ml-4">
                        <span>
                            <?php
                            $date_of_plant = thaidate('d/m/Y', strtotime($value_data_setting_plant->date_of_plant));
                            ?>
                            <li>ปลูกวันที่ : {{ $date_of_plant }}</li>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="ml-4">
                        <span>
                            <li>คาดการณ์การเก็บเกี่ยววันที่ : <span id="harvDayMobile"></span></li>
                        </span>
                    </div>
                </div>
                <script>
                    var today = new Date();
                    var tomorrow = new Date();
                    tomorrow.setDate(today.getDate() + {{$value_data_setting_plant->harvest_day}});
                    result_harvday_mobile = tomorrow.toLocaleDateString()
                    document.getElementById('harvDayMobile').innerHTML = result_harvday_mobile;
                </script>
                @endforeach
                <div class="row">
                    <div class="ml-4 mb-4">
                        <span>
                            <li>รายได้
                                @if($check_sale_product == 0)
                                0
                                @else
                                {{$total_sell}}
                                @endif
                                บาท
                            </li>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="width-border">
                <h4 class="m-4 font-prompt">อุณหภูมิ</h4>
                <div class="row">
                    <div class="center">
                        <img src="/imgs/temperature.png" width="20%" alt="icon">
                    </div>
                </div>
                <div class="row">
                    <div class="center">
                        <h3 class="mt-2 font-prompt" id="temp_mobile">0.0 ํC</h3>
                    </div>
                </div>
                <span class="m-4 font-prompt" id="date-time-temp-mobile">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                <p></p>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="width-border">
                <h4 class="m-4 font-prompt">ความชื้นในอากาศ</h4>
                <div class="row">
                    <div class="center">
                        <img src="/imgs/wind.png" width="20%" alt="icon">
                    </div>
                </div>
                <div class="row">
                    <div class="center">
                        <h3 class="mt-2 font-prompt" id="humid_mobile">0.0 %</h3>
                    </div>
                </div>
                <span class="m-4 font-prompt" id="date-time-humid-mobile">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                <p></p>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="width-border">
                <div class="row">
                    <div class="col-12" style="padding-top:1.25em; margin-bottom: 1em;">
                        <div class="row pl-5">
                            <div class="col-2">
                                <h4 class="" style="transform: translateY(35%);">ประวัติ</h4>
                            </div>
                            <div class="col-10">
                                <div class="ml-2">
                                    <button id="openDateShowTemps_mobile" class="btn ant-btn">กำหนดวัน</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <canvas id="tempChart_mobile"></canvas>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <canvas id="dateTempChart_mobile" style="display: none;"></canvas>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <center>
                            <span>เวลา</span>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="width-border">
                <div class="row">
                    <div class="col-12" style="padding-top:1.25em; margin-bottom: 1em;">
                        <div class="row pl-5">
                            <div class="col-2">
                                <h4 class="" style="transform: translateY(35%);">ประวัติ</h4>
                            </div>
                            <div class="col-10">
                                <div class="ml-2">
                                    <button id="openDateShowHumids_mobile" class="btn ant-btn">กำหนดวัน</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <canvas id="humidChart_mobile"></canvas>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <canvas id="dateHumidChart_mobile" style="display: none;"></canvas>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <center>
                            <span>เวลา</span>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<div class="historyPlantMobile" style="display: none;">
    <div class="ant-modal-mask"></div>
    <div class="ant-modal-wrap">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="card">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="row mt-4">
                                    <div class="col-11">
                                        <div style="font-size:large;font-weight:bolder;">ประวัติการปลูกของคุณ
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <a href="javascrip:void(0)" id="cancelHistoryPlantMobilesm">
                                            <img src="/imgs/cancel-green.png" alt="icon" style="width: 1em;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                @php $i = 0; @endphp
                                @foreach($get_new_plant_dates as $key_new_plant_dates => $value_new_plant_dates)
                                <?php
                                $new_plant_dates = thaidate('d-m-Y H:i:s', strtotime($value_new_plant_dates->delete_date));
                                $total_pay = number_format($value_new_plant_dates->total_price);
                                $total_sell = number_format($value_new_plant_dates->total_sale);
                                ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="font-prompt">รอบที่ {{++$i}}
                                            <a href="{{ route('dashboard.historyPlant',  ['plotID'=>$plotID, 'historyPlantID' => $value_new_plant_dates->id]) }}" target="_blank" class="ant-btn ml-2">{{ $new_plant_dates }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <span>รายจ่าย {{ $total_pay }} บาท</span>
                                        <span>รายรับ {{ $total_sell }} บาท</span>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <input type="hidden" name="plot_id" value="{{$plotID}}">
                        <div class="ant-modal-footer mt-4">
                            <button type="button" class="ant-btn ant-btn-secondary" id="cancelHistoryPlantMobile">
                                <span>ปิด</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
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