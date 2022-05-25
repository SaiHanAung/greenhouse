@extends('dashboards.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold font-prompt">
    <div class="main-layout products-container">
        <style>
            .fix-strcoll{
                position: fixed;
            }
        </style>
        <div class="main-layout--header" style="border-bottom-color:#49cea1;">
            <div class="main-layout--header-name font-prompt">แปลง : {{$value_name_sub}}</div>
            <div class="main-layout--header-options">
                <nav>
                    <div class="nav nav-tabs" style="border-bottom-color: #49cea1;">
                        <label class="nav-link clearfont active" style="color: #49cea1;border-color: #49cea1;border-bottom-color:transparent;">แผงควบคุม</label>
                        <button class="nav-link"><a href="{{ route('savenotes.index', $datas) }}" class="clearfonts">จดบันทึก</a></button>
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
                                <div class="col-sm-4">
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
                                <div class="col-sm-4">
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
                                <!-- <div class="col-sm-4">
                                    <div class="width-border">
                                        <h4 class="m-3 font-prompt">ความชื้นในดิน</h4>
                                        <div class="row">
                                            <div class="center">
                                                <img src="/imgs/water-drop.png" width="20%" alt="icon">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="center">
                                                <h3 class="mt-2 font-prompt">0.0 ํC</h3>
                                            </div>
                                        </div>
                                        <span class="ml-4 font-prompt" style="position: relative;">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="width-border">
                                        <h4 class="m-3 font-prompt">ความเข้มข้นแสง</h4>
                                        <div class="row">
                                            <div class="center">
                                                <img src="/imgs/sun.png" width="20%" alt="icon">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="center">
                                                <h3 class="mt-2 font-prompt">0.0 μmol</h3>
                                            </div>
                                        </div>
                                        <span class="ml-4 font-prompt" style="position: relative;">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="width-border">
                                        <h4 class="m-3 font-prompt">EC</h4>
                                        <div class="row">
                                            <div class="center">
                                                <img src="/imgs/thunder.png" width="20%" alt="icon">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="center">
                                                <h3 class="mt-2 font-prompt">0.0 μS/cm</h3>
                                            </div>
                                        </div>
                                        <span class="ml-4 font-prompt" style="position: relative;">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="width-border">
                                        <h4 class="m-3 font-prompt">TDS</h4>
                                        <div class="row">
                                            <div class="center">
                                                <img src="/imgs/glass-of-water.png" width="20%" alt="icon">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="center">
                                                <h3 class="mt-2 font-prompt">0.0 μS/cm</h3>
                                            </div>
                                        </div>
                                        <span class="ml-4 font-prompt" style="position: relative;">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                                        <p></p>
                                    </div>
                                </div> -->
                                <div class="col-sm-4">
                                    <div class="width-border ">
                                        <h4 class="m-4 font-prompt">ค่าใช้จ่าย</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="chart-container">
                                                    <div class="chart has-fixed-height" id="pie_basic" style="margin-bottom: 1rem; margin-top: -5rem;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                var pie_basic_element = document.getElementById('pie_basic');
                if (pie_basic_element) {
                    var pie_basic = echarts.init(pie_basic_element);
                    pie_basic.setOption({
                        color: [
                            '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
                            '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
                            '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
                            '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
                        ],          
                        
                        textStyle: {
                            fontFamily: 'Prompt, sans-serif',
                            fontSize: 15
                        },

                        title: {
                            text: '',
                            left: 'center',
                            textStyle: {
                                fontSize: 17,
                                fontWeight: 500,
                            },
                            subtextStyle: {
                                fontSize: 12
                            }
                        },

                        tooltip: {
                            trigger: 'item',
                            backgroundColor: 'rgba(0,0,0,0.75)',
                            padding: [10, 15],
                            textStyle: {
                                fontSize: 13,
                                fontFamily: 'Roboto, sans-serif'
                            },
                            formatter: "{a} <br/>{b}: {c} บาท ({d}%)"
                        },

                        legend: {
                            orient: 'horizontal',
                            bottom: '0%',
                            left: 'center',                   
                            data: ['เมล็ด', 
                            'ปุ๋ย',
                            'ค่าแรง',
                            'ค่าอื่นๆ'
                        ],
                            itemHeight: 8,
                            itemWidth: 8
                        },

                        series: [{
                            name: 'ค่าใช้จ่าย',
                            type: 'pie',
                            radius: '70%',
                            center: ['50%', '50%'],
                            itemStyle: {
                                normal: {
                                    borderWidth: 1,
                                    borderColor: '#fff'
                                }
                            },
                            data: [
                                {value: {{$seed}}, name: 'เมล็ด'},
                                {value: {{$fertilizer}}, name: 'ปุ๋ย'},
                                {value: {{$wage}}, name: 'ค่าแรง'},
                                {value: {{$etc}}, name: 'ค่าอื่นๆ'}
                            ]
                        }]
                    });
                }
                </script>
            </section>
        </div>
    </div>
</div>
@endsection