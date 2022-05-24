@extends('autoruns.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold font-prompt">
    <div class="main-layout products-container">
        <div class="main-layout--header" style="border-bottom-color:#49cea1;">
            <div class="main-layout--header-name font-prompt">แปลง : {{$value_name_sub}}</div>
            <div class="main-layout--header-options">
                <nav>
                    <div class="nav nav-tabs" style="border-bottom-color: #49cea1;">
                        <button class="nav-link"><a href="{{ route('savenote.index', $datas) }}" class="clearfonts">จดบันทึก</a></button>
                        <button class="nav-link"><a href="{{ route('report.index', $datas) }}" class="clearfonts">รายงาน</a></button>
                        <label class="nav-link clearfont active" style="color: #49cea1;border-color: #49cea1;border-bottom-color:transparent;">แผงควบคุม</label>
                        <button class="nav-link"><a href="{{ route('plots.show', $datas) }}" class="clearfonts">ข้อมูล</a></button>
                    </div>
                </nav>
            </div>
        </div>
        <div class="main-layout--content">
            <section style="margin-top: 1rem;">
                <div class="worko-tabs">

                    <input class="state" type="radio" id="tab-one" />
                    <input class="state" type="radio" id="tab-two" checked />
                    <input class="state" type="radio" id="tab-three" />
                    <input class="state" type="radio" id="tab-four" />
                    <input class="state" type="radio" id="tab-five" />

                    <div class="tabs flex-tabs">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div style="position: relative;">
                                        <a href="{{ route('dashboard.index', $datas) }}">
                                            <label class="tab font-black font-prompt">โดยรวม</label>
                                        </a>
                                        <label for="tab-two" id="tab-two-label" class="tab font-black font-prompt">อัตโนมัติ</label>
                                        <a href="{{ route('dashboard.switch', $datas) }}">
                                            <label class="tab font-black font-prompt">I/O</label>
                                        </a>
                                        <a href="{{ route('dashboard.settime', $datas) }}">
                                            <label class="tab font-black font-prompt">ตั้งเวลา</label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="main-layout--header-options">
                                    <button type="button" id="openFormCreateAuto" class="ant-btn ant-btn-primary">
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <span style="font-size: xx-large;">+</span>
                                            </div>
                                            <div class="col-sm-10">
                                                <span style="font-size: medium;">สร้างการทำงานอัตโนมัติ</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="tab-two-panel" class="panel">

                            @if ($message = Session::get('success'))
                            <div id="alert" class="alert alert-success">
                                <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
                            </div>
                            @endif

                            @foreach($get_data_autorun as $keys => $values)

                            <div class="row">
                                <div class="col-sm-1">&nbsp;</div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="width-border pt-4 pb-2">
                                            <div class="col-sm-12">
                                                <form action="{{ route('autoruns.destroy', $values->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h4 class="font-prompt">ชื่อการทำงาน : {{ $values->name }}</h4>
                                                        </div>
                                                        <div class="col-sm-6" style="display: flex; justify-content: flex-end;">
                                                            <button type="submit" class="bt-delete-farm-record btn-sm">X</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <h5 class="font-prompt">โซนทำงาน : {{ $values->work_zone }}</h5>
                                                <h5 class="font-prompt">เวลา : ({{ $values->start_time }} - {{ $values->stop_time }})</h5>
                                                <!-- <h5 class="">ทำซ้ำ : {{ $values->repeat }}</h5> -->
                                                @if($values->repeat == 1)
                                                <h5 class="font-prompt">ทำซ้ำ : ทุกวัน</h5>
                                                @endif
                                                @if($values->repeat == 0)
                                                @if($values->sunday == 1 || $values->monday == 1 || $values->tuesday == 1 || $values->wednesday == 1 || $values->thursday == 1 ||$values->friday == 1 || $values->saturday == 1 && $values->repeat == 0)
                                                <h5 class="font-prompt" style="display: inline">ทำซ้ำ : </h5>
                                                @endif
                                                @if($values->sunday == 1)
                                                <h5 class="font-prompt" style="display: inline"> อาทิตย์ </h5>
                                                @endif
                                                @if($values->monday == 1)
                                                <h5 class="font-prompt" style="display: inline"> จันทร์ </h5>
                                                @endif
                                                @if($values->tuesday == 1)
                                                <h5 class="font-prompt" style="display: inline"> อังคาร </h5>
                                                @endif
                                                @if($values->wednesday == 1)
                                                <h5 class="font-prompt" style="display: inline"> พุธ </h5>
                                                @endif
                                                @if($values->thursday == 1)
                                                <h5 class="font-prompt" style="display: inline"> พฤหัสบดี </h5>
                                                @endif
                                                @if($values->friday == 1)
                                                <h5 class="font-prompt" style="display: inline"> ศุกร์ </h5>
                                                @endif
                                                @if($values->saturday == 1)
                                                <h5 class="font-prompt" style="display: inline"> เสาร์ </h5>
                                                @endif
                                                @endif
                                                <div class="drop-start" style="display: none;">
                                                    <div class="row">
                                                        <div class="center">
                                                            <span class="move-drop">
                                                                <img src="/imgs/drop.png" width="10%" alt="icon">
                                                            </span>
                                                            <h3 class="mt-2 font-prompt">สถานะ : กำลังรดน้ำ<span class="loading__ellipsis"></span></h3>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="center">
                                                            <button class="bt-stop mb-5 font-prompt">หยุดการทำงาน</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="drop-stop">
                                                    <div class="row">
                                                        <div class="center">
                                                            <h3 class="mt-2 font-prompt">สถานะ : ไม่ทำงาน</h3>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="center">
                                                            <button class="bt-start mb-5 font-prompt">เริ่มการทำงาน</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <span class="mr-3 font-prompt">ID : {{ $values->id }}</span>
                                                    <span class="font-prompt">อัพเดทล่าสุด : {{$values->updated_at}}</span>

                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                    $('.bt-start').click(function() {
                                                        $('#drop-stop').fadeOut(function() {
                                                            $('.drop-start').fadeIn();
                                                        });
                                                    });
                                                    $('.bt-stop').click(function() {
                                                        $('.drop-start').fadeOut(function() {
                                                            $('#drop-stop').fadeIn();
                                                        });
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">&nbsp;</div>
                            </div>
                            @endforeach
                        </div>

                        <script>
                            // Get the modal
                            var modal = document.getElementById('id01');

                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                        </script>
                        <!-- <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <div class="width-border">
                                        <h4 class="m-3">Profile 1 : พ่นน้ำโซน 1</h4>
                                        <h5 class="ml-4">เวลา : (08 : 00 : 00 - 08 : 30 : 00) AM</h5>
                                        <h5 class="ml-4 tg">ทำซ้ำ : ทุกวัน</h5>
                                        <h5 class="ml-4 tg">ทำงานไม่เกิน : 10 นาที</h5>
                                        <h5 class="ml-4 tg">รอเวลาก่อนรอบถัดไป : 10 นาที</h5>
                                        <h5 class="m-4">ตรวจสอบ อุณหภูมิ มากกว่า 30 ํC</h5>
                                        <div class="drop-start" style="display: none;">
                                            <div class="row">
                                                <div class="center">
                                                    <span class="move-drop">
                                                        <img src="/imgs/drop.png" width="10%" alt="icon">
                                                    </span>
                                                    <h3 class="mt-2">สถานะ : กำลังรดน้ำ<span class="loading__ellipsis"></span></h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="center">
                                                    <button class="bt-stop mb-5">หยุดการทำงาน</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="drop-stop">
                                            <div class="row">
                                                <div class="center">
                                                    <h3 class="mt-2">สถานะ : ไม่ทำงาน</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="center">
                                                    <button class="bt-start mb-5">เริ่มการทำงาน</button>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="ml-4">อัพเดทล่าสุด : 2021-11-06 08:00:00</p>
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                            </div> -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection