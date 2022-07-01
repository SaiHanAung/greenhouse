@extends('admin.layout')

@section('content')

@guest
@if (Route::has('register'))

@endif
@else
<div class="user-layout-right-content user-layout-right-content-fold">
    <div></div>
    <div class="main-layout products-container">
        <div class="mt-5 mb-3" style="padding-bottom: 1rem; border-bottom:#49cea1 1px solid;">
            <!-- <div class="main-layout--header" style="border-bottom-color:#49cea1;"> -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="main-layout--header-name font-prompt">ข้อมูลแปลงของผู้ใช้</div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6" style="display: flex; justify-content:flex-end;">
                    <a href="{{ route('logout.perform') }}" class="ant-btn ml-3">
                        <span class="linearicon linearicon-exit"></span>
                        <span class="font-prompt">ออกจากระบบ</span>
                    </a>
                </div>
            </div>
            <div class="main-layout--header-options">
            </div>
        </div>
        <div class="main-layout--content" style="margin-left: .1em;">
            @if ($message = Session::get('success'))
            <div id="alert" class="alert alert-success">
                <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
            </div>
            @endif
            @php $i = 0; $j = 0; $k = 0; $s = 0; $l = 0;@endphp
            <style>
                .font-m {
                    font-size: medium;
                }
                .font-l {
                    font-size: large;
                }
            </style>
            @foreach($get_host_topic as $keyht => $valueht)
            <input id="input_host" type="hidden" value="{{$valueht->host}}">
            <input id="input_topic" type="hidden" value="{{$valueht->topic_send}}">
            @endforeach
            <div class="box-border-shadow p-4 mt-4">
                @foreach($viewPlot as $key_viewPlot => $value_viewPlot)
                <div class="row">
                    <div class="col-sm-6">
                        <div class="width-border p-4" style="margin-bottom: -.1em; margin-left: .5em;">
                            <h4 class="font-prompt">รายละเอียดแปลง</h4>
                            <hr>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    ชื่อแปลง : {{ $value_viewPlot->name }}
                                </span>
                            </div>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    ขนาดแปลง : 
                                    {{ $value_viewPlot->rai_size }} ไร่ {{ $value_viewPlot->ngan_size }} งาน {{ $value_viewPlot->square_wah_size }} ตารางวา
                                </span>
                            </div>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    ละติจูด : {{ $value_viewPlot->latitude }}
                                </span>
                            </div>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    ลองจิจูด : {{ $value_viewPlot->longitude }}
                                </span>
                            </div>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    คำอธิบาย : {{ $value_viewPlot->description }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="width-border p-4" style="margin-bottom: -.1em; margin-left:-.5em;">
                            <h4 class="font-prompt">รายละเอียดระบบไอโอที</h4>
                            <hr>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    โฮสต์ : {{ $value_viewPlot->host }}
                                </span>
                            </div>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    ท็อปปิครับข้อมูล : {{ $value_viewPlot->topic_send }}
                                </span>
                            </div>
                            <div class="row pl-2">
                                <span class="font-prompt font-m">
                                    ท็อปปิคส่งข้อมูล : {{ $value_viewPlot->topic_sub }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row mt-4">
                    <div class="col-sm-4">
                        <div class="width-border" style="margin-bottom: -.1em; margin-left: .5em;">
                            <h4 class="font-prompt p-3">ค่าใช้จ่าย</h4>
                            <div class="chart-container">
                                <center>
                                    <div class="chart has-fixed-height" id="pie_basic" style="margin-top: -5rem; margin-bottom:-5em;"></div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="width-border" style="margin-bottom: -.1em; margin-right: -.5em;">
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
                                    <center>
                                        <span id="date-time-temp">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                                    </center>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="width-border" style="margin-bottom: -.1em; margin-left: -.5em; margin-right: -.5em;">
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
                                    <center>
                                        <span id="date-time-humid">อัพเดทล่าสุด : 00/00/0000 00:00:00</span>
                                    </center>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="width-border" style="margin-bottom: -.1em; margin-left: -.5em; margin-right: -.5em;">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-4">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="font-prompt">การเตรียมพื้นที่ปลูก</h4>
                    <table id="customers" style="font-family: 'Prompt', sans-serif;">
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">วันที่</th>
                            <th style="text-align: center;">รายการ</th>
                            <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                            <th style="text-align: center;">หมายเหตุ</th>
                        </tr>
                        @foreach($get_note_plant_areas as $key_note_plant_areas => $value_note_plant_areas)
                        <tr>
                            <?php
                            $plant_area_date = thaidate('d-m-Y', strtotime($value_note_plant_areas->date));
                            $plant_area_price = number_format($value_note_plant_areas->price);
                            ?>
                            <td class="font-prompt" style="text-align: center;">{{ ++$i }}</td>
                            <td class="font-prompt" style="text-align: center;">{{$plant_area_date}}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $value_note_plant_areas->title }}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $plant_area_price }}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $value_note_plant_areas->notation }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <h4 class="font-prompt">การเพาะปลูก</h4>
                    <table id="customers" style="font-family: 'Prompt', sans-serif;">
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">วันที่</th>
                            <th style="text-align: center;">รายการ</th>
                            <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                            <th style="text-align: center;">หมายเหตุ</th>
                        </tr>
                        @foreach($get_note_plants as $key_note_plants => $value_note_plants)
                        <tr>
                            <?php
                            $plant_date = thaidate('d-m-Y', strtotime($value_note_plants->date));
                            $plant_price = number_format($value_note_plants->price);
                            ?>
                            <td class="font-prompt" style="text-align: center;">{{ ++$i }}</td>
                            <td class="font-prompt" style="text-align: center;">{{$plant_date}}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $value_note_plants->title }}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $plant_price }}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $value_note_plants->notation }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <h4 class="font-prompt">การบำรุงรักษา</h4>
                    <table id="customers" style="font-family: 'Prompt', sans-serif;">
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">วันที่</th>
                            <th style="text-align: center;">รายการ</th>
                            <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                            <th style="text-align: center;">หมายเหตุ</th>
                        </tr>
                        @foreach($note_maintenances as $key_note_maintenances => $value_note_maintenances)
                        <tr>
                            <?php
                            $maintenance_date = thaidate('d-m-Y', strtotime($value_note_maintenances->date));
                            $maintenance_price = number_format($value_note_maintenances->price);
                            ?>
                            <td class="font-prompt" style="text-align: center;">{{ ++$i }}</td>
                            <td class="font-prompt" style="text-align: center;">{{$maintenance_date}}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $value_note_maintenances->title }}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $maintenance_price }}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $value_note_maintenances->notation }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <h4 class="font-prompt">การเก็บเกี่ยว</h4>
                    <table id="customers" style="font-family: 'Prompt', sans-serif;">
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">วันที่</th>
                            <th style="text-align: center;">รายการ</th>
                            <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                            <th style="text-align: center;">หมายเหตุ</th>
                        </tr>
                        @foreach($note_harvests as $key_note_harvests => $value_note_harvests)
                        <tr>
                            <?php
                            $harvest_date = thaidate('d-m-Y', strtotime($value_note_harvests->date));
                            $harvest_price = number_format($value_note_harvests->price);
                            ?>
                            <td class="font-prompt" style="text-align: center;">{{ ++$i }}</td>
                            <td class="font-prompt" style="text-align: center;">{{$harvest_date}}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $value_note_harvests->title }}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $harvest_price }}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $value_note_harvests->notation }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <h4 class="font-prompt">การจำหน่ายผลผลิต</h4>
                    <table id="customers" style="font-family: 'Prompt', sans-serif;">
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">วันที่</th>
                            <th style="text-align: center;">จำนวน</th>
                            <th style="text-align: center;">หน่วย</th>
                            <th style="text-align: center;">ราคาต่อหน่วย</th>
                            <th style="text-align: center;">รวมเป็นเงิน(บาท)</th>
                        </tr>
                        @foreach($note_sells as $key_note_sells => $value_note_sells)
                        <tr>
                            <?php
                            $sell_date = thaidate('d-m-Y', strtotime($value_note_sells->date));
                            $sell_price = number_format($value_note_sells->price);
                            $sell_total_price = number_format($value_note_sells->total_price);
                            ?>
                            <td class="font-prompt" style="text-align: center;">{{ ++$i }}</td>
                            <td class="font-prompt" style="text-align: center;">{{$sell_date}}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $value_note_sells->amount }}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $value_note_sells->price }}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $sell_price }}</td>
                            <td class="font-prompt" style="text-align: center;">{{ $sell_total_price }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <!-- <div class="settings-user-content main-list">
                <div class="row">
                    {{--
                        {{$data->links()}}
                    --}}
                </div>
            </div> -->
            <p class="m-5">&nbsp;</p>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
<script>
    var cl = console.log.bind(document);
    var host = document.getElementById("input_host").value
    var port = 8000;
    var x = Math.floor(Math.random() * 10000);
    var cname = "controlform-" + x;
    client = mqtt = new Paho.MQTT.Client(host, port, cname);
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    client.connect({
        onSuccess: onConnect
    });

    function onConnect() {
        message = new Paho.MQTT.Message("0");
        message.destinationName = document.getElementById("input_topic").value
        client.subscribe(message.destinationName);
        client.send(message) // publish message
    }

    function onConnectionLost(responseObject) {
        if (responseObject.errorCode !== 0) {
            console.log("onConnectionLost:" + responseObject.errorMessage);
        }
    }

    function onMessageArrived(message) {
        sessionStorage.setItem("msg", message.payloadString);
        msg = sessionStorage.getItem("msg");
        obj = eval("(function(){return " + msg + ";})()");

        document.getElementById("temp").innerHTML = obj.temp + " 'C";
        // document.getElementById("temp_mobile").innerHTML = obj.temp + " 'C";
        document.getElementById("humid").innerHTML = obj.humid + " %";
        // document.getElementById("humid_mobile").innerHTML = obj.humid + " %";
        
        if(obj.temp == undefined || obj.humid == undefined){
            document.getElementById("temp").innerHTML = 'รอโหลด';
            // document.getElementById("temp_mobile").innerHTML = 'รอโหลด';
            document.getElementById("humid").innerHTML = 'รอโหลด';
            // document.getElementById("humid_mobile").innerHTML = 'รอโหลด';
        }
        // document.getElementById("mqtt-value").innerHTML = msg;
        // console.log(msg);
        const zeroFill = n => {
            return ('0' + n).slice(-2);
        }

        const interval = setInterval(() => {
            const now = new Date();
            const dateTime = now.toLocaleDateString() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

            document.getElementById("date-time-humid").innerHTML = "อัพเดทล่าสุด : " + dateTime;
            // document.getElementById("date-time-humid-mobile").innerHTML = "อัพเดทล่าสุด : " + dateTime;
            document.getElementById('date-time-temp').innerHTML = "อัพเดทล่าสุด : " + dateTime;
            // document.getElementById('date-time-temp-mobile').innerHTML = "อัพเดทล่าสุด : " + dateTime;
        }, 1000);   

        setTimeout(function(){
            var plot_id = document.getElementById('plot_id').value;
            var humid_val = obj.humid;
            var temp_val = obj.temp;
            const storeNow = new Date();
            const countSeconds = zeroFill(storeNow.getSeconds());
            const countMinutes = zeroFill(storeNow.getMinutes());
            if(true){
                $.ajax({
                    type: 'GET',
                    url: "{{ route('storeTemp') }}", 
                    data: {
                        // 'switch_id': switchID,
                        'value': temp_val, plot_id,
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "{{ route('storeHumid') }}", 
                    data: {
                        // 'switch_id': switchID,
                        'value': humid_val, plot_id,
                    }
                });
            }
        }, 5000)
        
    }
    

    /////////////////// JS ECHART Pie chart ////////////////////////////////
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
                formatter: "{a} <br/>{b}: {c} บาท ({d}%)",
            },

            legend: {
                orient: 'horizontal',
                bottom: '80%',
                left: 'center',                   
                data: ['เตรียมพื้นที่ปลูก', 'เพาะปลูก', 'เก็บเกี่ยว', 'บำรุงรักษา'
            ],
                itemHeight: 8,
                itemWidth: 8
            },

            series: [{
                name: 'ค่าใช้จ่าย',
                type: 'pie',
                radius: '40%',
                // center: ['45%', '50%'],
                itemStyle: {
                    normal: {
                        borderWidth: 1,
                        borderColor: '#fff',
                    }
                },
                data: [
                    {value: {{$plant_area_total_price}}, name: 'เตรียมพื้นที่ปลูก'},
                    {value: {{$plant_total_price}}, name: 'เพาะปลูก'},
                    {value: {{$harvest_total_price}}, name: 'เก็บเกี่ยว'},
                    {value: {{$maintenance_total_price}}, name: 'บำรุงรักษา'}
                ]
            }]
        });
    }
    //////////////////////////////////////////////////////////////////////////
</script>

@endguest
@endsection