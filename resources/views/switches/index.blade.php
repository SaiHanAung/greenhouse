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
                        <button class="nav-link"><a href="{{ route('savenote.index', $plotID) }}" class="clearfonts">จดบันทึก</a></button>
                        <!-- <button class="nav-link"><a href="{{ route('report.index', $plotID) }}" class="clearfonts">รายงาน</a></button> -->
                        <button class="nav-link"><a href="{{ route('setting.index', $plotID) }}" class="clearfonts">ตั้งค่า</a></button>
                        <button class="nav-link"><a href="{{ route('qrcode.index', $plotID) }}" class="clearfonts">QR Code</a></button>
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
                                        <a href="{{ route('dashboard.index', $plotID) }}">
                                            <label class="tab font-black font-prompt">โดยรวม</label>
                                        </a>
                                        <!-- <a href="{{ route('autorun.index', $plotID) }}">
                                            <label class="tab font-black font-prompt">อัตโนมัติ</label>
                                        </a> -->
                                        <label for="tab-three" id="tab-three-label" class="tab font-black font-prompt">ระบบไอโอที</label>
                                        <!-- <a href="{{ route('dashboard.settime', $plotID) }}">
                                            <label class="tab font-black font-prompt">ตั้งเวลา</label>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="main-layout--header-options">
                                    <button type="button" id="openModalCreateSwitch" class="ant-btn ant-btn-primary">
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
                        <div id="alert" class="alert alerSuccess">
                            <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
                        </div>
                        @endif

                        @foreach ($get_host_topic as $keyht => $valueht)
                        <input id="input_host" type="hidden" value="{{$valueht->host}}">
                        <input id="input_topic" type="hidden" value="{{$valueht->topic_sub}}">
                        @endforeach
                        <div id="tab-three-panel" class="">
                            <div class="row mt-4 mb-2">
                                <label class="font-prompt" style="font-size:x-large;">สวิตช์แบบแมนนวล</label>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        @foreach ($get_data_switches as $key => $value)
                                        <input type="hidden" id="s_{{$value->id}}" value="{{$value->port}}">
                                        <div class="col-sm-3" style="margin-bottom: -1.7em;">
                                            <div class="width-border">
                                                <div class="row">
                                                    <div class="col-sm-10">
                                                        <h4 class="m-3 font-prompt" style="vertical-align: middle;"><img src="/imgs/power-off.png" class="mr-1" width="15%" alt="icon">{{ $value->name }}</h4>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="bt-last" style="margin: .8em .8em 0 0;">
                                                            <form id="destroySwich" action="{{ route('switch.destroy', $value->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="javascrip:void(0)" onclick="event.preventDefault(); document.getElementById('destroySwich').submit();">
                                                                    <img class="bt-edit-switch" src="/imgs/cancel-green.png" alt="icon" style="width: 1.5em;">
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
                                                        <p id="port-normal" class="mt-3 font-prompt">พอร์ต : {{ $value->port }}</p>
                                                        <input type="hidden" id="plot_id" value="{{ $value->plot_id }}">
                                                        @foreach($get_port as $key_port => $value_port)
                                                            @foreach($get_data_switch_time_set as $key_status => $value_status)
                                                                @if($value_port->port == $value->port && $value_status->status == 1)
                                                                <script>
                                                                    $('#port-normal').hide();
                                                                    $('.switch').hide();
                                                                </script>
                                                                <p class="mt-3 font-prompt" style="color:#24C48E;">พอร์ต : {{ $value->port }}</p>
                                                                <p class="font-prompt" style="color:#24C48E; margin-top:-.3em; margin-bottom:2em;">พอร์ตนี้กำลังเปิดแบบตั้งเวลา</p>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr >
                            <div class="row mt-4 mb-2">
                                <label class="font-prompt" style="font-size:x-large;">สวิตช์แบบตั้งเวลา</label>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        @foreach($get_data_switch_time_set as $key_switch_time_set => $value_switch_time_set)
                                        <div class="col-sm-3">
                                            <div class="width-border">
                                                <div class="row">
                                                    <input type="hidden" id="port_sts_{{$value_switch_time_set->id}}" value="{{$value_switch_time_set->port}}">
                                                    <input type="hidden" id="status_sts_{{$value_switch_time_set->id}}" value="">
                                                    <div class="col-sm-10">
                                                        <h4 class="m-3 font-prompt" style="vertical-align: middle;"><img src="/imgs/clock.png" class="mr-1" width="15%" alt="icon">{{ $value_switch_time_set->name }}</h4>
                                                    </div>
                                                    <!-- <div class="col-sm-2">
                                                        <div class="bt-last" style="margin: .5em -.5em 0 0;">
                                                            <a href="javascrip:void(0)" id="openFormEditSwitchTimeSet">
                                                                <img class="bt-edit-switch" src="/imgs/edit-green.png" alt="icon" style="width: 2em;">
                                                            </a>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-sm-2">
                                                        <div class="bt-last" style="margin: .8em .8em 0 0;">
                                                            <form id="destroySwichTimeSet" action="{{ route('destroySwichTimeSet', $value_switch_time_set->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="javascrip:void(0)" onclick="event.preventDefault(); document.getElementById('destroySwichTimeSet').submit();">
                                                                    <img class="bt-edit-switch" src="/imgs/cancel-green.png" alt="icon" style="width: 1.5em;">
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <p class="font-prompt ml-4">พอร์ด : {{ $value_switch_time_set->port }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <p class="font-prompt ml-4" style="margin-top: -.5em;">เวลาเริ่ม : {{ $value_switch_time_set->start_time }}</p>
                                                                <input type="hidden" id="start_time_{{$value_switch_time_set->id}}" value="{{$value_switch_time_set->start_time}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <p class="font-prompt ml-4" style="margin-top: -.5em;">เวลาหยุด : {{ $value_switch_time_set->stop_time }}</p>
                                                                <input type="hidden" id="stop_time_{{$value_switch_time_set->id}}" value="{{$value_switch_time_set->stop_time}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <center>
                                                                    <input type="hidden" id="port_stop_id_{{$value_switch_time_set->id}}" value="{{$value_switch_time_set->port}}">
                                                                    <p class="font-prompt" style="font-size: large;">สถานะ : 
                                                                        @if($value_switch_time_set->status == 0)
                                                                        <span class="font-prompt switch-not-work">ไม่ทำงาน</span>
                                                                        @else
                                                                        <span class="font-prompt switch-working">กำลังทำงาน</span><br>
                                                                        <button class="ant-btn mt-3" onclick="stopTimeSet({{$value_switch_time_set->id}})" data-toggle="tooltip" title="กดเพื่อหยุดการทำงาน">
                                                                            <input type="hidden" id="stop_id_{{$value_switch_time_set->id}}" value="">หยุดทำงาน
                                                                        </button>
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
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="width-border p-4">
                                        <div class="row ">
                                            <p class="font-prompt"><strong style="font-size: large;">ประวัติการ เปิด - ปิด สวิตช์แบบแมนนวล</strong></p>
                                        </div>
                                        <hr style="margin-top: -.7em;">
                                        @foreach($get_switch_log as $key_switch_log => $value_switch_log)
                                        <?php
                                        $switch_log_date = thaidate('d-m-Y  H:i:s', strtotime($value_switch_log->created_at));
                                        ?>
                                        <div class="row ">
                                            <p class="font-prompt">วันที่ : {{ $switch_log_date }} &nbsp;||&nbsp; 
                                                @if($value_switch_log->status == 1) 
                                                <span class="dot-open"></span><span style="color: #24C48E;"> เปิด</span> 
                                                @else 
                                                ปิด 
                                                @endif
                                                สวิตช์ {{ $value_switch_log->name }} พอร์ต {{ $value_switch_log->port }}
                                            </p>
                                        </div>
                                        <hr style="margin-top: -.7em; margin-bottom: 1em;">
                                        @endforeach
                                        <div class="row">
                                            <center>
                                                {{ $get_switch_log->links() }}
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="width-border p-4">
                                        <div class="row ">
                                            <p class="font-prompt"><strong style="font-size: large;">ประวัติการ เปิด - ปิด สวิตช์แบบตั้งเวลา</strong></p>
                                        </div>
                                        <hr style="margin-top: -.7em;">
                                        @foreach($get_switch_time_set_log as $key_switch_time_set_log => $value_switch_time_set_log)
                                        <?php
                                        $switch_log_date = thaidate('d-m-Y  H:i:s', strtotime($value_switch_time_set_log->created_at));
                                        ?>
                                        <div class="row ">
                                            <style>
                                                .dot-open {

                                                    background-color: #24C48E;
                                                    display: inline-block;
                                                    width: 12px;
                                                    height: 12px;
                                                    border-radius: 50px;
                                                }
                                            </style>
                                            <p class="font-prompt">วันที่ : {{ $switch_log_date }} &nbsp;||&nbsp; 
                                                @if($value_switch_time_set_log->status == 1) 
                                                <span class="dot-open"></span><span style="color: #24C48E;"> เปิด</span> 
                                                @else 
                                                ปิด 
                                                @endif
                                                สวิตช์ {{ $value_switch_time_set_log->name }} พอร์ต {{ $value_switch_time_set_log->port }}
                                            </p>
                                        </div>
                                        <hr style="margin-top: -.7em; margin-bottom: 1em;">
                                        @endforeach
                                        <div class="row">
                                            <center>
                                                {{ $get_switch_time_set_log->links() }}
                                            </center>
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
<!-- CDN MQTT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
{{--
@foreach($get_data_switch_time_set as $key_switch_time_set => $value_switch_time_set)
<script>
    var port_switch_time_set = document.getElementById("port_sts_" + {{$value_switch_time_set->id}}).value;
    var status_switch_time_set = document.getElementById("status_sts_" + {{$value_switch_time_set->id}}).value;
    var start_time = document.getElementById("start_time_" + {{$value_switch_time_set->id}}).value;
    var stop_time = document.getElementById("stop_time_" + {{$value_switch_time_set->id}}).value;

    const zeroFill = n => {
        return ('0' + n).slice(-2);
    }

    var host = document.getElementById("input_host").value
    var port = 8000;
    var x = Math.floor(Math.random() * 10000);
    var cname = "controlform-" + x;
    client = mqtt = new Paho.MQTT.Client(host, port, cname);

    
    var switchID = {{$value_switch_time_set->id}};
    var statusSTS = document.getElementById("status_sts_" + {{$value_switch_time_set->id}}).value;
    var plot_id = document.getElementById('plot_id').value;

    client.connect({
        onSuccess: onConnect
    });
    function onConnect() {
        const timeNow = setTimeout(function() {
        const nowDate = new Date();
        const nowTime = zeroFill(nowDate.getHours()) + ':' + zeroFill(nowDate.getMinutes()) + ':' + zeroFill(nowDate.getSeconds());
        

        if (nowTime == start_time) {
            document.getElementById("status_sts_" + {{$value_switch_time_set->id}}).value = 1;
            if (port_switch_time_set == 'soc_0') {
                message = new Paho.MQTT.Message('{"soc":0,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_1') {
                message = new Paho.MQTT.Message('{"soc":1,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_2') {
                message = new Paho.MQTT.Message('{"soc":2,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_3') {
                message = new Paho.MQTT.Message('{"soc":3,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_4') {
                message = new Paho.MQTT.Message('{"soc":4,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_5') {
                message = new Paho.MQTT.Message('{"soc":5,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_6') {
                message = new Paho.MQTT.Message('{"soc":6,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_7') {
                message = new Paho.MQTT.Message('{"soc":7,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            var status_start = document.getElementById("status_sts_" + {{$value_switch_time_set->id}}).value;

            $.ajax({
                type: 'GET',
                url: '/switch-time-set-update/' + switchID, 
                data: {
                    'switch_id': switchID,
                    'value': status_start,
                    plot_id,
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                },
                error: function(data) {
                    console.log(data);
                },
            });
        }
        if (nowTime == stop_time) {
            document.getElementById("status_sts_" + {{$value_switch_time_set->id}}).value = 0;
            if (port_switch_time_set == 'soc_0') {
                message = new Paho.MQTT.Message('{"soc":0,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_1') {
                message = new Paho.MQTT.Message('{"soc":1,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_2') {
                message = new Paho.MQTT.Message('{"soc":2,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_3') {
                message = new Paho.MQTT.Message('{"soc":3,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_4') {
                message = new Paho.MQTT.Message('{"soc":4,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_5') {
                message = new Paho.MQTT.Message('{"soc":5,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_6') {
                message = new Paho.MQTT.Message('{"soc":6,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }
            if (port_switch_time_set == 'soc_7') {
                message = new Paho.MQTT.Message('{"soc":7,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message}
            }

            var status_stop = document.getElementById("status_sts_" + {{$value_switch_time_set->id}}).value;
            $.ajax({
                type: 'GET',
                url: '/switch-time-set-update/' + switchID, 
                data: {
                    'switch_id': switchID,
                    'value': status_stop,
                    plot_id,
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                },
                error: function(data) {
                    console.log(data);
                },
            });
        }
        
        onConnect();
        
        }, 1000);   
    
    }

</script>
@endforeach
--}}
<script>
    $(document).ready(function() {
        $('#openModalCreateSwitch').click(function() {
            $('.createSwitch').show();
        });
        $('#cancelModalCreateSwitch').click(function() {
            $('.createSwitch').hide();
        });
        
        $('#openFormSwitchManual').click(function() {
            $('.switchManual').show();
            $('.createSwitch').hide();
        });
        $('#cancelSwitchManual').click(function() {
            $('.switchManual').hide();
        });
        
        $('#openFormSwitchTimeSet').click(function() {
            $('.switchTimeSet').show();
            $('.createSwitch').hide();
        });
        $('#cancelSwitchTimeSet').click(function() {
            $('.switchTimeSet').hide();
        });
    });
</script>


@endsection