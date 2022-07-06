@extends('dashboards.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold font-prompt">
    <div class="main-layout products-container">
        <div class="main-layout--header" style="border-bottom-color:#49cea1;">
            <div class="main-layout--header-name font-prompt">แปลง : {{$value_name_sub}}</div> 
            <div class="main-layout--header-options">
                <nav>
                    <div class="nav nav-tabs" style="border-bottom-color: #49cea1;">
                        <label class="nav-link clearfont active" style="color: #49cea1;border-color: #49cea1;border-bottom-color:transparent;">แดชบอร์ด</label>
                        <button class="nav-link"><a href="{{ route('savenote.index', $plotID) }}" class="clearfonts">จดบันทึก</a></button>
                        <!-- <button class="nav-link"><a href="{{ route('report.index', $plotID) }}" class="clearfonts">รายงาน</a></button> -->
                        <button class="nav-link"><a href="{{ route('setting.index', $plotID) }}" class="clearfonts">ตั้งค่า</a></button>
                        @if($check_traceability == 0) 
                        <button class="nav-link" data-toggle="tooltip" data-placement="left" title="หลังบันทึกการเก็บเกี่ยวแล้วกดปุ่มสร้าง Qr code จึงจะสามารถใช้งานได้">
                            <a href="javascript:void(0)" class="clearfonts">QR Code</a>
                        </button>
                        <script>
                            $(document).ready(function() {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        </script>
                        @else
                        <button class="nav-link">
                            <a href="{{ route('qrcode.index', $plotID) }}" class="clearfonts">QR Code</a>
                        </button>
                        @endif
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
                                        <label for="tab-one" id="tab-one-label" class="tab font-black font-prompt" style="font-size: medium;">โดยรวม</label>
                                        <!-- <a href="{{ route('autorun.index', $plotID) }}">
                                            <label class="tab font-black font-prompt">อัตโนมัติ</label>
                                        </a> -->
                                        <a href="{{ route('dashboard.switch', $plotID) }}">
                                            <label class="tab font-black font-prompt" style="font-size: medium;">ระบบไอโอที</label>
                                        </a>
                                        <!-- <a href="{{ route('dashboard.settime', $plotID) }}">
                                            <label class="tab font-black font-prompt">ตั้งเวลา</label>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            @foreach($get_plot_id as $key_plot_id => $value_plot_id)
                                <form id="dashboard-storeTraceability" action="{{ route('dashboard.storeTraceability', $plotID) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <form id="dashboard-newPlant" action="{{ route('dashboard.newPlant', ['plotID' => $value_plot_id->id]) }}" method="post" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <input type="hidden" id="plot_id" value="{{$value_plot_id->id}}">
                                <div class="main-layout--header-options">
                                    @if($check_harv_date == 0)
                                    @else
                                    <a href="javascript:void(0)" class="bt-create-farm-record btn-sm font-prompt mr-3" style="font-size: medium;"
                                        onclick="event.preventDefault(); document.getElementById('dashboard-storeTraceability').submit();">
                                        <span>สร้าง Qr Code</span>
                                    </a>
                                    @endif
                                    @if($check_setting_plant == 0)
                                    <a href="javascipt:void(0)" id="openSettingPlant" class="bt-create-farm-record btn-sm font-prompt mr-3" style="font-size: medium;">ตั้งค่าการปลูก</a>
                                    @else
                                    @endif
                                    @if($check_sale_product == 0)
                                    @else
                                    <a href="javascript:void(0)" class="bt-create-farm-record btn-sm font-prompt mr-3"
                                        onclick="event.preventDefault(); document.getElementById('dashboard-newPlant').submit();">
                                        <span style="font-size: medium;">เริ่มปลูกใหม่</span>
                                    </a>
                                    @endif
                                    @if($check_del_date == 0)
                                    @else
                                    <a href="javascipt:void(0)" id="openHistoryPlant" class="ant-btn font-prompt " style="font-size: medium;">ประวัติการปลูก</a>
                                                
                                    @endif

                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div id="tab-one-panel" class="mt-4">
                            @if ($message = Session::get('success'))
                            <div id="alert" class="alert alerSuccess">
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
                                <div class="width-border ">
                                    <h4 class="m-4 font-prompt">ค่าใช้จ่าย</h4>
                                    <div class="chart-container">
                                        <center>
                                            <div class="chart has-fixed-height" id="pie_basic" style="margin-top: -5rem; margin-bottom:-5em;"></div>
                                        </center>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-8">
                                    <?php
                                    $total_pay = number_format($sum_total_price);
                                    $total_sell = number_format($sale_product);
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-12">
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
                                                </div>
                                                @foreach($get_data_setting_plant as $key_data_setting_plant => $value_data_setting_plant)
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
                                                            <li>คาดการณ์การเก็บเกี่ยววันที่ : <span id="harvDay"></span></li>
                                                        </span>
                                                    </div>
                                                </div>
                                                <script>
                                                    var today = new Date();
                                                    var tomorrow = new Date();
                                                    tomorrow.setDate(today.getDate() + {{ $value_data_setting_plant->harvest_day }});
                                                    result = tomorrow.toLocaleDateString()
                                                    document.getElementById('harvDay').innerHTML = result;
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
                                    </div>
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
                                                        <h3 class="mt-2 font-prompt" id="temp">
                                                            {{$get_temps->temp}}
                                                            <!-- 0.0 -->
                                                             ํC</h3>
                                                    </div>
                                                </div>
                                                <center>
                                                    <span id="date-time-temp">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                                                </center>
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
                                                        <h3 class="mt-2 font-prompt" id="humid">
                                                            {{$get_humids->humid}}
                                                            <!-- 0.0  -->
                                                            %</h3>
                                                    </div>
                                                </div>
                                                <center>
                                                    <span id="date-time-humid">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                                                </center>
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="width-border">
                                                <h4 class="m-4 font-prompt">ความเข้มข้นแสง</h4>
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
                                                <center>
                                                    <span id="">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                                                </center>
                                                <p></p>
                                                <!-- <p class="ml-4">อัพเดทล่าสุด0000/00/00 00:00:00</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-sm-6">
                                    <div class="width-border p-4" style="overflow-x:auto;">
                                        <h4 class="m-4 font-prompt mb-5">MQTT Protocol</h4>
                                        <p>&nbsp;</p>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="chart-container">
                                                    <div class="chart has-fixed-height" id="line_temp" style="margin-bottom: 1rem; margin-top: -5rem;"></div>
                                                    <center>
                                                        <span>เวลา</span>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="width-border p-4" style="overflow-x:auto;">
                                        <h4 class="m-4 font-prompt mb-5">MQTT Protocol</h4>
                                        <p>&nbsp;</p>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="chart-container">
                                                    <div class="chart has-fixed-height" id="line_humid" style="margin-bottom: 1rem; margin-top: -5rem;"></div>
                                                    <center>
                                                        <span>เวลา</span>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="width-border">
                                        <div class="row">
                                            <div class="col-sm-12" style="padding-left: 2.25em; padding-top:1.25em; margin-bottom: 1em;">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <h4 class="vertical-center">ประวัติ</h4>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <div class="btn-group ml-2" role="group">
                                                            <!-- <button onclick="showTempSixHour()" class="btn ant-btn">6 ชม.</button> -->
                                                            <button id="openDateShowTemps" class="btn ant-btn">กำหนดวัน</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <canvas id="myChart"></canvas>
                                                <canvas id="tempChartSixHour" style="display: none;"></canvas>
                                                <center>
                                                    <span>เวลา</span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="width-border">
                                        <div class="row">
                                            <div class="col-sm-12" style="padding-left: 2.25em; padding-top:1.25em; margin-bottom: 1em;">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <h4 class="vertical-center">ประวัติ</h4>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <div class="btn-group ml-2" role="group">
                                                            <button id="openDateShowHumids" class="btn ant-btn">กำหนดวัน</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <canvas id="humidChart"></canvas>
                                                <canvas id="dateHumidChart" style="display: none;"></canvas>
                                                <center>
                                                    <span>เวลา</span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <script type="text/javascript">
                                    var line_stacked_element = document.getElementById('line_temp');
                                    if (line_stacked_element) {
                                        var line_stacked = echarts.init(line_stacked_element);
                                        line_stacked.setOption({
                                            animationDuration: 750,
                                            grid: {
                                                left: 0,
                                                right: 20,
                                                top: 35,
                                                bottom: 0,
                                                containLabel: true,
                                            },
                                            legend: {
                                                data: ['อุณหภูมิ'],
                                                itemHeight: 10,
                                                itemGap: 20,
                                                textStyle: {
                                                    fontSize: 14,
                                                    fontFamily: 'Prompt, sans-serif'
                                                }
                                            },

                                            // Add tooltip
                                            tooltip: {
                                                trigger: 'axis',
                                                backgroundColor: 'rgba(0,0,0,0.75)',
                                                padding: [10, 15],
                                                textStyle: {
                                                    fontSize: 14,
                                                    fontFamily: 'Prompt, sans-serif'
                                                }
                                            },
                                            
                                            xAxis: [{
                                                type: 'category',
                                                boundaryGap: false,
                                                data: [
                                                    '08.00', '08.05', '08.10', '08.15', '08.20', '08.25', '08.30', '08.35', '08.40', 
                                                    '08.45', '08.50', '08.55', '09.00', '09.05', '09.10', '09.15', '09.20', '09.25',
                                                    '09.30', '09.35', '09.40', '09.45', '09.50', '09.55', '10.00' 
                                                ],
                                                axisLabel: {
                                                    color: '#333'
                                                },
                                                axisLine: {
                                                    lineStyle: {
                                                        color: '#999'
                                                    }
                                                },
                                                splitLine: {
                                                    lineStyle: {
                                                        color: ['#eee']
                                                    }
                                                }
                                            }],

                                            // Vertical axis
                                            yAxis: [{
                                                type: 'value',
                                                axisLabel: {
                                                    color: '#333'
                                                },
                                                axisLine: {
                                                    lineStyle: {
                                                        color: '#999'
                                                    }
                                                },
                                                splitLine: {
                                                    lineStyle: {
                                                        color: ['#eee']
                                                    }
                                                },
                                                splitArea: {
                                                    show: true,
                                                    areaStyle: {
                                                        color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                                                    }
                                                }
                                            }],

                                            // Add series
                                            series: [
                                                {
                                                    name: 'อุณหภูมิ',
                                                    type: 'line',
                                                    stack: 'Total',
                                                    smooth: true,
                                                    symbolSize: 7,
                                                    data: [
                                                        37.5, 37, 36.5, 35, 37, 37.5, 36, 35, 34, 33
                                                    ],
                                                    itemStyle: {
                                                        normal: {
                                                            borderWidth: 2,
                                                        }
                                                    }
                                                }
                                            ]
                                        });
                                    }
                            </script>
                            <script type="text/javascript">
                                var line_stacked_element = document.getElementById('line_humid');
                                if (line_stacked_element) {
                                    var line_stacked = echarts.init(line_stacked_element);
                                    line_stacked.setOption({
                                        animationDuration: 750,
                                        grid: {
                                            left: 0,
                                            right: 20,
                                            top: 35,
                                            bottom: 0,
                                            containLabel: true,
                                        },
                                        legend: {
                                            data: ['ความชื้น'],
                                            itemHeight: 10,
                                            itemGap: 20,
                                            textStyle: {
                                                fontSize: 14,
                                                fontFamily: 'Prompt, sans-serif'
                                            }
                                        },

                                        // Add tooltip
                                        tooltip: {
                                            trigger: 'axis',
                                            backgroundColor: 'rgba(0,0,0,0.75)',
                                            padding: [10, 15],
                                            textStyle: {
                                                fontSize: 14,
                                                fontFamily: 'Prompt, sans-serif'
                                            }
                                        },
                                        
                                        xAxis: [{
                                            type: 'category',
                                            boundaryGap: false,
                                            data: [
                                                '08.00', '08.05', '08.10', '08.15', '08.20', '08.25', '08.30', '08.35', '08.40', 
                                                '08.45', '08.50', '08.55', '09.00', '09.05', '09.10', '09.15', '09.20', '09.25',
                                                '09.30', '09.35', '09.40', '09.45', '09.50', '09.55', '10.00' 
                                            ],
                                            axisLabel: {
                                                color: '#333'
                                            },
                                            axisLine: {
                                                lineStyle: {
                                                    color: '#999'
                                                }
                                            },
                                            splitLine: {
                                                lineStyle: {
                                                    color: ['#eee']
                                                }
                                            }
                                        }],

                                        // Vertical axis
                                        yAxis: [{
                                            type: 'value',
                                            axisLabel: {
                                                color: '#333'
                                            },
                                            axisLine: {
                                                lineStyle: {
                                                    color: '#999'
                                                }
                                            },
                                            splitLine: {
                                                lineStyle: {
                                                    color: ['#eee']
                                                }
                                            },
                                            splitArea: {
                                                show: true,
                                                areaStyle: {
                                                    color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                                                }
                                            }
                                        }],

                                        // Add series
                                        series: [
                                            {
                                                name: 'ความชื้น',
                                                type: 'line',
                                                stack: 'Total',
                                                smooth: true,
                                                symbolSize: 7,
                                                data: [40, 40.2, 40.5, 41, 42, 45, 50, 45, 43.5, 44.5, 42],
                                                itemStyle: {
                                                    normal: {
                                                        borderWidth: 2,
                                                        color: '#3B44F6'
                                                    }
                                                },
                                                lineStyle: {
                                                    color: '#3B44F6'
                                                }
                                            }
                                        ]
                                    });
                                }
                            </script> -->
                            @section('scripts')
                            @parent
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                            <script>
                                var ctx = document.getElementById("humidChart");
                                var humidChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: [],
                                        datasets: [{
                                            label: 'ความชื้น',
                                            data: [],
                                            borderWidth: 1,
                                            backgroundColor: 'rgba(0, 0, 255, 0.1)',
                                            borderColor: 'rgb(0, 0, 255)',
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            xAxes: [],
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:false
                                                }
                                            }],
                                        },
                                        tooltips: {
                                            callbacks: {
                                                title: function(tooltipItem, data) {
                                                    return "เวลา"+" "+ data['labels'][tooltipItem[0]['index']];
                                                },
                                                label: function(tooltipItem, data) {
                                                    return "ความชื้น"+": "+ data['datasets'][0]['data'][tooltipItem['index']];
                                                }
                                            },
                                            backgroundColor: 'rgba(0,0,0,0.75)',
                                            titleFontSize: 14,
                                            titleFontFamily: 'Prompt, sans-serif',
                                            titleFontColor: '#fff',
                                            bodyFontColor: '#fff',
                                            bodyFontSize: 14,
                                            bodyFontFamily: 'Prompt, sans-serif',
                                            displayColors: false
                                        },
                                        legend: {
                                            labels: {
                                                fontFamily: 'Prompt, sans-serif',
                                                fontSize: 14
                                            }
                                        }
                                    }
                                });
                                
                                // console.log(parsed.b); // // Fri Jul 14 2017, etc...
                                var plot_id = document.getElementById('plot_id').value;
                                var updateChartHumid = function() { 
                                    $.ajax({
                                    url: "{{ route('api.chart') }}",
                                    type: 'GET',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        'value': plot_id
                                    },
                                    success: function(data) {
                                        const isoDatePattern = new RegExp(/\d{4}-[01]\d-[0-3]\dT[0-2]\d:[0-5]\d:[0-5]\d\.\d+([+-][0-2]\d:[0-5]\d|Z)/);

                                        const obj = {
                                        a: 'foo',
                                        b: new Date(1500000000000), // Fri Jul 14 2017, etc...
                                        cc: data.timeHumid
                                        }
                                        const json = JSON.stringify(obj);

                                        const zeroFill = n => {
                                            return ('0' + n).slice(-2);
                                        }
                                        const now = new Date();
                                        const dateTime = now.toLocaleDateString() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

                                        // Convert back, use reviver function:
                                        const parsed = JSON.parse(json, (key, value) => {
                                            if (typeof value === 'string' &&  value.match(isoDatePattern)){
                                                 dateHumid = new Date(value);

                                                 resultHumid = zeroFill(dateHumid.getHours()) + ":" + zeroFill(dateHumid.getMinutes()) + ":" + zeroFill(dateHumid.getSeconds());
                                                return resultHumid; // isostring, so cast to js date
                                            }
                                            return value; // leave any other value as-is
                                        });
                                        humidChart.data.labels = parsed.cc;
                                        humidChart.data.datasets[0].data = data.humidVals;
                                        humidChart.update();
                                    },
                                    error: function(data){
                                        console.log(data);
                                    }
                                    });
                                }
                                
                                updateChartHumid();
                                setInterval(() => {
                                    updateChartHumid();
                                }, 1000);
                            </script>
                            <script>
                                var ctx = document.getElementById("myChart");
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: [],
                                        datasets: [{
                                            label: 'อุณหภูมิ',
                                            data: [],
                                            borderWidth: 1,
                                            backgroundColor: 'rgba(255, 0, 0, 0.1)',
                                            borderColor: 'rgb(255, 0, 0)',
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            xAxes: [],
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:false
                                                }
                                            }],
                                        },
                                        tooltips: {
                                            callbacks: {
                                                title: function(tooltipItem, data) {
                                                    return "เวลา"+" "+ data['labels'][tooltipItem[0]['index']];
                                                },
                                                label: function(tooltipItem, data) {
                                                    return "อุณหภูมิ"+": "+ data['datasets'][0]['data'][tooltipItem['index']];
                                                }
                                            },
                                            backgroundColor: 'rgba(0,0,0,0.75)',
                                            titleFontSize: 14,
                                            titleFontFamily: 'Prompt, sans-serif',
                                            titleFontColor: '#fff',
                                            bodyFontColor: '#fff',
                                            bodyFontSize: 14,
                                            bodyFontFamily: 'Prompt, sans-serif',
                                            displayColors: false
                                        },
                                        legend: {
                                            labels: {
                                                fontFamily: 'Prompt, sans-serif',
                                                fontSize: 14
                                            }
                                        }
                                    }
                                });
                                
                                // console.log(parsed.b); // // Fri Jul 14 2017, etc...
                                var plot_id = document.getElementById('plot_id').value;
                                var updateChart = function() { 
                                    $.ajax({
                                    url: "{{ route('api.chart') }}",
                                    type: 'GET',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        'value': plot_id
                                    },
                                    success: function(data) {
                                        const isoDatePattern = new RegExp(/\d{4}-[01]\d-[0-3]\dT[0-2]\d:[0-5]\d:[0-5]\d\.\d+([+-][0-2]\d:[0-5]\d|Z)/);

                                        const obj = {
                                        a: 'foo',
                                        b: new Date(1500000000000), // Fri Jul 14 2017, etc...
                                        cc: data.timeTemp
                                        }
                                        const json = JSON.stringify(obj);

                                        const zeroFill = n => {
                                            return ('0' + n).slice(-2);
                                        }
                                        const now = new Date();
                                        const dateTime = now.toLocaleDateString() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

                                        // Convert back, use reviver function:
                                        const parsed = JSON.parse(json, (key, value) => {
                                            if (typeof value === 'string' &&  value.match(isoDatePattern)){
                                                 dateTemp = new Date(value);

                                                 resultTemp = zeroFill(dateTemp.getHours()) + ":" + zeroFill(dateTemp.getMinutes()) + ":" + zeroFill(dateTemp.getSeconds());
                                                return resultTemp; // isostring, so cast to js date
                                            }
                                            return value; // leave any other value as-is
                                        });
                                        myChart.data.labels = parsed.cc;
                                        myChart.data.datasets[0].data = data.tempVals;
                                        myChart.update();
                                    },
                                    error: function(data){
                                        console.log(data);
                                    }
                                    });
                                }
                                
                                updateChart();
                                setInterval(() => {
                                    updateChart();
                                }, 1000);
                            </script>
                            <script>
                                function dateShowTemp(){
                                    var ctx = document.getElementById("tempChartSixHour");
                                    var tempChartSixHour = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: [],
                                            datasets: [{
                                                label: 'อุณหภูมิ',
                                                data: [],
                                                borderWidth: 1,
                                                backgroundColor: 'rgba(255, 0, 0, 0.1)',
                                                borderColor: 'rgb(255, 0, 0)',
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                xAxes: [],
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero:false
                                                    }
                                                }],
                                            },
                                            tooltips: {
                                                callbacks: {
                                                    title: function(tooltipItem, data) {
                                                        return "เวลา"+" "+ data['labels'][tooltipItem[0]['index']];
                                                    },
                                                    label: function(tooltipItem, data) {
                                                        return "อุณหภูมิ"+": "+ data['datasets'][0]['data'][tooltipItem['index']];
                                                    }
                                                },
                                                backgroundColor: 'rgba(0,0,0,0.75)',
                                                titleFontSize: 14,
                                                titleFontFamily: 'Prompt, sans-serif',
                                                titleFontColor: '#fff',
                                                bodyFontColor: '#fff',
                                                bodyFontSize: 14,
                                                bodyFontFamily: 'Prompt, sans-serif',
                                                displayColors: false
                                            },
                                            legend: {
                                                labels: {
                                                    fontFamily: 'Prompt, sans-serif',
                                                    fontSize: 14
                                                }
                                            }
                                        }
                                    });
                                    var plotIdTemp = document.getElementById('plot_id').value;
                                    var dateTemp = document.getElementById('datePicker_show_temp').value;
                                    $.ajax({
                                        url: "{{ route('dateShowTemp') }}",
                                        type: 'GET',
                                        dataType: 'json',
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data: {
                                            'value': plotIdTemp, dateTemp
                                        },
                                        success: function(data) {
                                            $('#myChart').hide();
                                            $('.dateShowTemps').hide();
                                            $('#tempChartSixHour').show();
                                            const isoDatePattern = new RegExp(/\d{4}-[01]\d-[0-3]\dT[0-2]\d:[0-5]\d:[0-5]\d\.\d+([+-][0-2]\d:[0-5]\d|Z)/);

                                            const obj = {
                                            a: 'foo',
                                            b: new Date(1500000000000), // Fri Jul 14 2017, etc...
                                            cc: data.timeTemp
                                            }
                                            const json = JSON.stringify(obj);

                                            const zeroFill = n => {
                                                return ('0' + n).slice(-2);
                                            }
                                            const now = new Date();
                                            const dateTime = now.toLocaleDateString() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

                                            // Convert back, use reviver function:
                                            const parsed = JSON.parse(json, (key, value) => {
                                                if (typeof value === 'string' &&  value.match(isoDatePattern)){
                                                    dateTemp = new Date(value);

                                                    resultTemp = zeroFill(dateTemp.getHours()) + ":" + zeroFill(dateTemp.getMinutes()) + ":" + zeroFill(dateTemp.getSeconds());
                                                    return resultTemp; // isostring, so cast to js date
                                                }
                                                return value; // leave any other value as-is
                                            });
                                            tempChartSixHour.data.labels = parsed.cc;
                                            tempChartSixHour.data.datasets[0].data = data.tempVals;
                                            tempChartSixHour.update();
                                        },
                                        error: function(data){
                                            console.log(data);
                                        }
                                    })
                                }
                            </script>
                            <script>
                                function dateShowHumid(){
                                    var ctx = document.getElementById("dateHumidChart");
                                    var dateHumidChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: [],
                                            datasets: [{
                                                label: 'ความชื้น',
                                                data: [],
                                                borderWidth: 1,
                                                backgroundColor: 'rgba(0, 0, 255, 0.1)',
                                                borderColor: 'rgb(0, 0, 255)',
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                xAxes: [],
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero:false
                                                    }
                                                }],
                                            },
                                            tooltips: {
                                                callbacks: {
                                                    title: function(tooltipItem, data) {
                                                        return "เวลา"+" "+ data['labels'][tooltipItem[0]['index']];
                                                    },
                                                    label: function(tooltipItem, data) {
                                                        return "ความชื้น"+": "+ data['datasets'][0]['data'][tooltipItem['index']];
                                                    }
                                                },
                                                backgroundColor: 'rgba(0,0,0,0.75)',
                                                titleFontSize: 14,
                                                titleFontFamily: 'Prompt, sans-serif',
                                                titleFontColor: '#fff',
                                                bodyFontColor: '#fff',
                                                bodyFontSize: 14,
                                                bodyFontFamily: 'Prompt, sans-serif',
                                                displayColors: false
                                            },
                                            legend: {
                                                labels: {
                                                    fontFamily: 'Prompt, sans-serif',
                                                    fontSize: 14
                                                }
                                            }
                                        }
                                    });
                                    var plotIdHumid = document.getElementById('plot_id').value;
                                    var dateHumid = document.getElementById('datePicker_show_humid').value;
                                    $.ajax({
                                        url: "{{ route('dateShowHumid') }}",
                                        type: 'GET',
                                        dataType: 'json',
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data: {
                                            'value': plotIdHumid, dateHumid
                                        },
                                        success: function(data) {
                                            $('#humidChart').hide();
                                            $('.dateShowHumids').hide();
                                            $('#dateHumidChart').show();
                                            const isoDatePattern = new RegExp(/\d{4}-[01]\d-[0-3]\dT[0-2]\d:[0-5]\d:[0-5]\d\.\d+([+-][0-2]\d:[0-5]\d|Z)/);
                                            
                                            const obj = {
                                            a: 'foo',
                                            b: new Date(1500000000000), // Fri Jul 14 2017, etc...
                                            cc: data.timeHumid
                                            }
                                            const json = JSON.stringify(obj);

                                            const zeroFill = n => {
                                                return ('0' + n).slice(-2);
                                            }
                                            const now = new Date();
                                            const dateTime = now.toLocaleDateString() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

                                            // Convert back, use reviver function:
                                            const parsed = JSON.parse(json, (key, value) => {
                                                if (typeof value === 'string' &&  value.match(isoDatePattern)){
                                                    dateTemp = new Date(value);

                                                    resultTemp = zeroFill(dateTemp.getHours()) + ":" + zeroFill(dateTemp.getMinutes()) + ":" + zeroFill(dateTemp.getSeconds());
                                                    return resultTemp; // isostring, so cast to js date
                                                }
                                                return value; // leave any other value as-is
                                            });
                                            dateHumidChart.data.labels = parsed.cc;
                                            dateHumidChart.data.datasets[0].data = data.humidVals;
                                            dateHumidChart.update();
                                        },
                                        error: function(data){
                                            console.log(data);
                                        }
                                    })
                                }
                            </script>
                            @endsection
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


@endsection