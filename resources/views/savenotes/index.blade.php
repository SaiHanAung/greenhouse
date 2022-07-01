@extends('savenotes.layout')

@section('content')

@section('title.savenote.index')จดบันทึก - @endsection
<div class="user-layout-right-content user-layout-right-content-fold font-prompt">
    <div class="main-layout products-container">
        <div class="main-layout--header" style="border-bottom-color:#49cea1;">
            <div class="main-layout--header-name font-prompt">แปลง : {{$value_name_sub}}</div>
            <div class="main-layout--header-options">
                <nav>
                    <div class="nav nav-tabs" style="border-bottom-color: #49cea1;">
                        <button class="nav-link"><a href="{{ route('dashboard.index', $plotID) }}" class="clearfonts">แดชบอร์ด</a></button>
                        <label class="nav-link clearfont active" style="color: #49cea1;border-color: #49cea1;border-bottom-color:transparent;">จดบันทึก</label>
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
            <section style="margin-top: 1.5rem;">
                <div class="ml-3">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="main-layout--header-options">
                                <a href="javascipt:void(0)" id="openModalNote" class="bt-create-farm-record btn-sm font-prompt" style="font-size: medium; padding: .3em 1.5em;">จดบันทึก</a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div id="alert" class="alert alerSuccess">
                        <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
                    </div>
                    @endif
                    @php $i = 0; $j = 0; $k = 0; $s = 0; $l = 0;@endphp
                    <?php
                    $sum_plant_area_price = number_format($plant_area_total_price);
                    $sum_plant_price = number_format($plant_total_price);
                    $sum_maintenance_price = number_format($maintenance_total_price);
                    $sum_harvest_price = number_format($harvest_total_price);
                    ?>
                    <div class="box-border-shadow mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label onclick="myFunction('Demo1')" id="name-savenote" class="ml-2" style="font-size:large;">การเตรียมพื้นที่ปลูก</label>
                                @if($check_tract_total_price == 0)
                                @else
                                <a href="{{ route('TracFactExcel') }}" class="ant-btn ml-3 font-prompt">ดาวน์โหลด Excel</a>
                                @endif
                            </div>
                        </div>
                        <!-- <div id="Demo1" style="overflow-x:auto;"> -->
                        <div id="Demo1">
                            <table id="customers" style="font-family: 'Prompt', sans-serif;">
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">วันที่</th>
                                    <th style="text-align: center;">รายการ</th>
                                    <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                                    <th style="text-align: center;">หมายเหตุ</th>
                                    <th style="text-align: center;">ลบ</th>
                                </tr>
                                @foreach($get_data_note_plant_area as $key_note_plant_area => $value_note_plant_area)
                                <tr>
                                    <?php
                                    $plant_area_date = thaidate('d-m-Y', strtotime($value_note_plant_area->date));
                                    $plant_area_price = number_format($value_note_plant_area->price);
                                    ?>
                                    <td class="font-prompt" style="text-align: center;">{{ ++$i }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{$plant_area_date}}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_note_plant_area->title }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $plant_area_price }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_note_plant_area->notation }}</td>
                                    <td class="center">
                                        <form action="{{ route('destroyNotePlantArea', $value_note_plant_area->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-secondary btn-sm center-sub">X</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    {{ $get_data_trac->links() }}
                                </div>
                                <div class="col-sm-6" style="display: flex; justify-content: flex-end;">
                                    <label style="font-weight:400;">ค่าใช้จ่าย :
                                        <span>
                                        @if($check_plant_area_price == 0)
                                        0
                                        @else
                                        {{$sum_plant_area_price}}
                                        @endif
                                        </span> บาท
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-border-shadow mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label onclick="myFunction('Demo2')" id="name-savenote" class="ml-2" style="font-size:large;">การเพาะปลูก</label>
                                @if($check_data_trac_use_fact == 0)
                                @else
                                <a href="{{ route('TracUseFactExcel') }}" class="ant-btn ml-3 font-prompt">ดาวน์โหลด Excel</a>
                                @endif
                            </div>
                        </div>
                        <div id="Demo2" class="">
                            <table id="customers" style="font-family: 'Prompt', sans-serif;">
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">วันที่</th>
                                    <th style="text-align: center;">รายการ</th>
                                    <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                                    <th style="text-align: center;">หมายเหตุ</th>
                                    <th style="text-align: center;">ลบ</th>
                                </tr>
                                @foreach($get_data_note_plant as $key_note_plant => $value_note_plant)
                                <tr>
                                    <?php
                                    $plant_date = thaidate('d-m-Y', strtotime($value_note_plant->date));
                                    $plant_price = number_format($value_note_plant->price)
                                    ?>
                                    <td class="font-prompt" style="text-align: center;">{{ ++$j }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{$plant_date}}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_note_plant->title }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $plant_price }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_note_plant->notation }}</td>
                                    <td class="center">
                                        <form action="{{ route('destroyNotePlant', $value_note_plant->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-secondary btn-sm center-sub">X</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="row mt-2">
                                <div class="col-sm-12" style="display: flex; justify-content: flex-end;">
                                    <label style="font-weight:400;">ค่าใช้จ่าย :
                                        <span>
                                            @if($check_plant_price == 0)
                                            0
                                            @else
                                            {{$sum_plant_price}}
                                            @endif
                                        </span> บาท
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-border-shadow mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label onclick="myFunction('Demo2')" id="name-savenote" class="ml-2" style="font-size:large;">การบำรุงรักษา</label>
                                
                            </div>
                        </div>
                        <div id="Demo2" class="">
                            <table id="customers" style="font-family: 'Prompt', sans-serif;">
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">วันที่</th>
                                    <th style="text-align: center;">รายการ</th>
                                    <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                                    <th style="text-align: center;">หมายเหตุ</th>
                                    <th style="text-align: center;">ลบ</th>
                                </tr>
                                @foreach($get_data_note_maintenance as $key_maintenance => $value_maintenance)
                                <tr>
                                    <?php
                                    $date_maintenance = thaidate('d-m-Y', strtotime($value_maintenance->date));
                                    $maintenance_price = number_format($value_maintenance->price);
                                    ?>
                                    <td class="font-prompt" style="text-align: center;">{{ ++$l }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{$date_maintenance}}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_maintenance->title }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $maintenance_price }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_maintenance->notation }}</td>
                                    <td class="center">
                                        <form action="{{ route('destroyNoteMaintenance', $value_maintenance->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-secondary btn-sm center-sub">X</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="row mt-2">
                                <div class="col-sm-12" style="display: flex; justify-content: flex-end;">
                                    <label style="font-weight:400;">ค่าใช้จ่าย :
                                        <span>
                                            @if($check_maintenance_price == 0)
                                            0
                                            @else
                                            {{$sum_maintenance_price}}
                                            @endif
                                        </span> บาท
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-border-shadow mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label onclick="myFunction('Demo3')" id="name-savenote" class="ml-2" style="font-size:large;">การเก็บเกี่ยว</label>
                                @if($check_data_trac_harv == 0)
                                @else
                                <a href="{{ route('TracHarvExcel') }}" class="ant-btn ml-3 font-prompt">ดาวน์โหลด Excel</a>
                                @endif
                            </div>
                        </div>
                        <div id="Demo3" class="">
                            <table id="customers" style="font-family: 'Prompt', sans-serif;">
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">วันที่</th>
                                    <th style="text-align: center;">รายการ</th>
                                    <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                                    <th style="text-align: center;">หมายเหตุ</th>
                                    <th style="text-align: center;">ลบ</th>
                                </tr>
                                @foreach($get_data_note_harvest as $key_harvest => $value_harvest)
                                <tr>
                                    <?php
                                    $harvest_date = thaidate('d-m-Y', strtotime($value_harvest->date));
                                    $harvest_price = number_format($value_harvest->price);
                                    ?>
                                    <td class="font-prompt" style="text-align: center;">{{ ++$k }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $harvest_date }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_harvest->title }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $harvest_price }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_harvest->notation }}</td>
                                    <td class="center">
                                        <form action="{{ route('destroyNoteHarvest', $value_harvest->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-secondary btn-sm center-sub">X</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="row mt-2">
                                <div class="col-sm-12" style="display: flex; justify-content: flex-end;">
                                    <label style="font-weight:400;">ค่าใช้จ่าย :
                                        <span>
                                            @if($check_harvest_price == 0)
                                            0
                                            @else
                                            {{$sum_harvest_price}}
                                            @endif
                                        </span> บาท
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-border-shadow mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label onclick="myFunction('Demo3')" id="name-savenote" class="ml-2" style="font-size:large;">การจำหน่ายผลผลิต</label>
                            </div>
                        </div>
                        <div id="Demo3" class="">
                            <table id="customers" style="font-family: 'Prompt', sans-serif;">
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">วันที่</th>
                                    <th style="text-align: center;">จำนวน</th>
                                    <th style="text-align: center;">หน่วย</th>
                                    <th style="text-align: center;">ราคาต่อหน่วย</th>
                                    <th style="text-align: center;">รวมเป็นเงิน(บาท)</th>
                                    <th style="text-align: center;">ลบ</th>
                                </tr>
                                @foreach($get_data_note_sell as $key_sell => $value_sell)
                                <tr>
                                    <?php
                                    $sale_date = thaidate('d-m-Y', strtotime($value_sell->date));
                                    $sell_price = number_format($value_sell->price);
                                    $sell_total_price = number_format($value_sell->total_price);
                                    ?>
                                    <td class="font-prompt" style="text-align: center;">{{ ++$s }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $sale_date }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_sell->amount }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_sell->unit }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $sell_price }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $sell_total_price }}</td>
                                    <td class="center">
                                        <form action="{{ route('destroyNoteSell', $value_sell->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-secondary btn-sm center-sub">X</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <script>
                    function myFunction(id) {
                        var x = document.getElementById(id);
                        if (x.className.indexOf("w3-show") == -1) {
                            x.className += " w3-show";
                        } else {
                            x.className = x.className.replace(" w3-show", "");
                        }
                    }
                </script>
                <!-- <div class="row"> -->
                <!-- <div class="bt-g-br">
                        <div class="col-sm-6">
                            &nbsp;
                        </div>
                        <div class="col-sm-6">
                            <div class="bt-last">
                                <button type="submit" class="bt-create-farm-record ml-2 btn-sm">สร้าง</button>
                                <button type="submit" class="bt-edit-farm-record ml-2 btn-sm">แก้ไข</button>
                                <button type="submit" class="bt-delete-farm-record ml-2 btn-sm">ลบ</button>
                            </div>
                        </div>
                    </div> -->
            </section>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#openModalNote').click(function() {
            $('.ant-modal-root-3').show();
        });

        $('#cancelFormPlantArea').click(function() {
            $('.ant-modal-root-3').hide();
            $('.formPlantArea').hide();
        });
        $('#openFormPlantingArea').click(function() {
            $('.ant-modal-root-3').hide();
            $('.formPlantArea').show();
        });
        $('#cancelListRecord').click(function() {
            $('.ant-modal-root-3').hide();
        });
        $('#openFormPlant').click(function() {
            $('.ant-modal-root-3').hide();
            $('.formPlant').show();
            $('#cancelFormPlant').click(function() {
                $('.formPlant').hide();
            });
        });
        $('#openFormMaintenance').click(function() {
            $('.ant-modal-root-3').hide();
            $('.formMaintenance').show();
            $('#cancelFormMaintenance').click(function() {
                $('.formMaintenance').hide();
            });
        });
        $('#openFormHarvest').click(function() {
            $('.ant-modal-root-3').hide();
            $('.formHarvest').show();
            $('#cancelFormHarvest').click(function() {
                $('.formHarvest').hide();
            });
        });
        $('#openFormSell').click(function() {
            $('.ant-modal-root-3').hide();
            $('.formSell').show();
            $('#cancelFormSell').click(function() {
                $('.formSell').hide();
            });
        });
    });
</script>


@endsection