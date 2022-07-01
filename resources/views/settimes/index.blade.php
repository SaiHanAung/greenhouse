@extends('settimes.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold font-prompt">
    <div class="main-layout products-container">
        <div class="main-layout--header" style="border-bottom-color:#49cea1;">
            <div class="main-layout--header-name font-prompt">แปลง : {{$value_name_sub}}</div>
            <div class="main-layout--header-options">
                <nav>
                    <div class="nav nav-tabs" style="border-bottom-color: #49cea1;">
                        <button class="nav-link"><a href="{{ route('savenote.index', $plotID) }}" class="clearfonts">จดบันทึก</a></button>
                        <button class="nav-link"><a href="{{ route('report.index', $plotID) }}" class="clearfonts">รายงาน</a></button>
                        <label class="nav-link clearfont active" style="color: #49cea1;border-color: #49cea1;border-bottom-color:transparent;">แผงควบคุม</label>
                        <button class="nav-link"><a href="{{ route('plots.show', $plotID) }}" class="clearfonts">ข้อมูล</a></button>
                    </div>
                </nav>
            </div>
        </div>
        <div class="main-layout--content">
            <section style="margin-top: 1rem;">
                <div class="worko-tabs">

                    <input class="state" type="radio" id="tab-one" />
                    <input class="state" type="radio" id="tab-two" />
                    <input class="state" type="radio" id="tab-three" />
                    <input class="state" type="radio" id="tab-four" checked />

                    <div class="tabs flex-tabs">
                        <a href="{{ route('dashboard.index', $plotID) }}">
                            <label class="tab font-black font-prompt">โดยรวม</label>
                        </a>

                        <a href="{{ route('autorun.index', $plotID) }}">
                            <label class="tab font-black font-prompt">อัตโนมัติ</label>
                        </a>

                        <a href="{{ route('dashboard.switch', $plotID) }}">
                            <label class="tab font-black font-prompt">I/O</label>
                        </a>

                        <label for="tab-four" id="tab-four-label" class="tab font-black font-prompt">ตั้งเวลา</label>
                        <div id="tab-four-panel" class="panel active">
                            @foreach($get_data_settime as $key_settime => $value_settime)
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="width-border">
                                        <audio id="alarm_audio"></audio>
                                        <h4 class="m-3 font-prompt" style="vertical-align: middle;"><img src="/imgs/clock.png" class="mr-1" width="10%" alt="icon">โซน 1</h4>
                                        <div class="row mb-3">
                                            <center>
                                                <div>
                                                    <span class="count-digit">0</span>
                                                    <span class="count-digit">0</span>
                                                    <span class="separator">:</span>
                                                    <span class="count-digit">0</span>
                                                    <span class="count-digit">0</span>
                                                </div>
                                                <style>
                                                    .count-digit {
                                                        color: #ffffff;
                                                        background-color: #333;
                                                        font-size: 18px;
                                                        padding: 5px 10px;
                                                        text-shadow: 0 1px 0 white;
                                                        border-radius: 10%;
                                                    }

                                                    .separator {
                                                        font-size: 35px;
                                                    }
                                                </style>
                                            </center>
                                        </div>
                                        <div class="ant-row">
                                            <div class="col-sm-4">&nbsp;</div>
                                            <div class="col-sm-4" style="text-align: center;">
                                                <?php
                                                // dd($value_settime->id);
                                                ?>
                                                <div class="ant-select ant-select-single">
                                                    <select class="ant-select-selector" name="select_time" id="select_time" onchange=update({{$value_settime->id}})>
                                                        <option class="" data-var0="1">
                                                            <span class="">1 นาที</span>
                                                        </option>
                                                        <option value="" data-var1="1">
                                                            <span class="">5 นาที</span>
                                                        </option>
                                                        <option value="" data-var2="1">
                                                            <span class="">10 นาที</span>
                                                        </option>
                                                        <option value="" data-var3="1">
                                                            <span class="">15 นาที</span>
                                                        </option>
                                                        <option value="" data-var4="1">
                                                            <span class="">20 นาที</span>
                                                        </option>
                                                        <option value="" data-var5="1">
                                                            <span class="">25 นาที</span>
                                                        </option>
                                                        <option value="" data-var6="1">
                                                            <span class="">30 นาที</span>
                                                        </option>
                                                        <option value="" data-var7="1">
                                                            <span class="">35 นาที</span>
                                                        </option>
                                                        <option value="" data-var8="1">
                                                            <span class="">40 นาที</span>
                                                        </option>
                                                        <option value="" data-var9="1">
                                                            <span class="">45 นาที</span>
                                                        </option>
                                                        <option value="" data-var10="1">
                                                            <span class="">50 นาที</span>
                                                        </option>
                                                        <option value="" data-var11="1">
                                                            <span class="">55 นาที</span>
                                                        </option>
                                                    </select>


                                                </div>
                                            </div>
                                            <div class="col-sm-4">&nbsp;</div>
                                        </div>
                                        <div class="ant-row mt-3">
                                            <div class="col-sm-12" style="text-align: center;">
                                                <div class="options">
                                                    <button class="btn-sm" id="stop-timer" style="margin: 0 .5rem 0 .5rem;">
                                                        <img src="https://img.icons8.com/ios-glyphs/30/000000/pause--v1.png" />
                                                    </button>
                                                    <button class="btn-sm" id="start-timer" style="margin: 0 .5rem 0 .5rem;">
                                                        <img src="https://img.icons8.com/ios-glyphs/30/000000/play--v1.png" />
                                                    </button>
                                                    <button class="btn-sm" id="reset-timer" style="margin: 0 .5rem 0 .5rem;">
                                                        <img src="https://img.icons8.com/ios-glyphs/30/000000/stop.png" />
                                                    </button>
                                                </div>
                                                <script>
                                                    $(document).ready(function() {
                                                        // $("#start-timer").click(function() {
                                                        //     $("input[type=checkbox]").prop("checked", true);
                                                        // });
                                                        // $(".check-value").prop("checked", true);
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm-12" style="text-align: center;">
                                                <span>ID : {{ $value_settime->id }} ค่า : {{ $value_settime->settime_value }} plot_id : {{ $plotID }}
                                                    <div id="check"><input class="check-value" type="checkbox" id="port_{{$value_settime->id}}" onchange=myFunction({{$value_settime->id}}) value={{$value_settime->settime_value}}></div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection