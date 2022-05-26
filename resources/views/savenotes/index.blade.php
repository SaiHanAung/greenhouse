@extends('savenotes.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold font-prompt">
    <div class="main-layout products-container">
        <div class="main-layout--header" style="border-bottom-color:#49cea1;">
            <div class="main-layout--header-name font-prompt">แปลง : {{$value_name_sub}}</div>
            <div class="main-layout--header-options">
                <nav>
                    <div class="nav nav-tabs" style="border-bottom-color: #49cea1;">
                        <button class="nav-link"><a href="{{ route('dashboard.index', $datas) }}" class="clearfonts">แผงควบคุม</a></button>
                        <label class="nav-link clearfont active" style="color: #49cea1;border-color: #49cea1;border-bottom-color:transparent;">จดบันทึก</label>
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
            <section style="margin-top: 1.5rem;">
                <div class="w3-container">
                    @if ($message = Session::get('success'))
                    <div id="alert" class="alert alert-success">
                        <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
                    </div>
                    @endif
                    @php $i = 0; $j = 0; $k = 0; $s = 0;@endphp
                    <div class="box-border-shadow mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label onclick="myFunction('Demo1')" id="name-savenote" class="ml-2" style="font-size:large;">ปัจจัยการผลิต</label>
                                @if($check_tract_total_price == 0)
                                @else
                                <a href="{{ route('TracFactExcel') }}" class="ant-btn ml-3 font-prompt">ดาวน์โหลด Excel</a>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <div class="bt-last">
                                    <button type="submit" id="FarmInputRecordTypeAndSource" class="bt-create-farm-record btn-sm">จด</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div id="Demo1" style="overflow-x:auto;"> -->
                        <div id="Demo1">
                            <table id="customers" style="font-family: 'Prompt', sans-serif;">
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">วันที่ซื้อ / ได้มา</th>
                                    <th style="text-align: center;">รายการปัจจัยการผลิต</th>
                                    <th style="text-align: center;">ประเภท</th>
                                    <th style="text-align: center;">ปริมาณ</th>
                                    <th style="text-align: center;">ราคา</th>
                                    <th style="text-align: center;">หน่วย</th>
                                    <th style="text-align: center;">แหล่งที่มา</th>
                                    <th style="text-align: center;">รวมเป็นเงิน(บาท)</th>
                                    <th style="text-align: center;">ผู้บันทึก</th>
                                    <th style="text-align: center;">ลบ</th>
                                </tr>
                                @foreach($get_data_trac as $key_data_trac_fact => $value_data_trac_fact)
                                <tr>
                                    <?php
                                    $received_date = thaidate('d-m-Y', strtotime($value_data_trac_fact->received_date));
                                    // dd($value_data_trac_fact);
                                    ?>
                                    <td class="font-prompt" style="text-align: center;">{{ ++$i }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{$received_date}}</td>
                                    <td class="font-prompt">{{ $value_data_trac_fact->name }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_data_trac_fact->type }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_data_trac_fact->amount }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_data_trac_fact->price }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_data_trac_fact->unit }}</td>
                                    <td class="font-prompt">{{ $value_data_trac_fact->source }}</td>
                                    <td class="font-prompt total_price" style="text-align: center;">{{ $value_data_trac_fact->total_price }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_data_trac_fact->recorder }}</td>
                                    <td class="center">
                                        <form action="{{ route('destroyTracFact', $value_data_trac_fact->id) }}" method="post">
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
                                    <label>ค่าใช้จ่ายทั้งหมดตอนนี้ :
                                        <span>
                                            @if($check_tract_total_price == 0)
                                            0
                                            @else
                                            {{$tract_total_price}}
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
                                <label onclick="myFunction('Demo2')" id="name-savenote" class="ml-2" style="font-size:large;">การใช้ปัจจัยการผลิต</label>
                                @if($check_data_trac_use_fact == 0)
                                @else
                                <a href="{{ route('TracUseFactExcel') }}" class="ant-btn ml-3 font-prompt">ดาวน์โหลด Excel</a>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <div class="bt-last">
                                    <button type="submit" id="RecordOfFarmInputTheUtilization" class="bt-create-farm-record btn-sm">จด</button>
                                </div>
                            </div>
                        </div>
                        <div id="Demo2" class="">
                            <table id="customers" style="font-family: 'Prompt', sans-serif;">
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">วันที่ใช้</th>
                                    <th style="text-align: center;">รายการการใช้ปัจจัยการผลิต</th>
                                    <th style="text-align: center;">ปริมาณ</th>
                                    <th style="text-align: center;">หน่วย</th>
                                    <th style="text-align: center;">ผู้บันทึก</th>
                                    <th style="text-align: center;">ลบ</th>
                                </tr>
                                @foreach($get_data_trac_use_fact as $key_data_trac_use_fact => $value_data_trac_use_fact)
                                <tr>
                                    <?php
                                    $date_of_use = thaidate('d-m-Y', strtotime($value_data_trac_use_fact->date_of_use));
                                    ?>
                                    <td class="font-prompt" style="text-align: center;">{{ ++$j }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{$date_of_use}}</td>
                                    <td class="font-prompt">{{ $value_data_trac_use_fact->name_of_use }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_data_trac_use_fact->amount }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_data_trac_use_fact->unit }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_data_trac_use_fact->recorder }}</td>
                                    <td class="center">
                                        <form action="{{ route('destroyTracUseFact', $value_data_trac_use_fact->id) }}" method="post">
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
                    <div class="box-border-shadow mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label onclick="myFunction('Demo3')" id="name-savenote" class="ml-2" style="font-size:large;">การเก็บเกี่ยวผลผลิต</label>
                                @if($check_data_trac_harv == 0)
                                @else
                                <a href="{{ route('TracHarvExcel') }}" class="ant-btn ml-3 font-prompt">ดาวน์โหลด Excel</a>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <div class="bt-last">
                                    <button type="submit" id="OrganicProduceHarvestRecord" class="bt-create-farm-record btn-sm">จด</button>
                                </div>
                            </div>
                        </div>
                        <div id="Demo3" class="">
                            <table id="customers" style="font-family: 'Prompt', sans-serif;">
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">วันที่เก็บเกี่ยว</th>
                                    <th style="text-align: center;">ผลผลิต</th>
                                    <th style="text-align: center;">ปริมาณผลผลิตรวม</th>
                                    <th style="text-align: center;">หน่วย</th>
                                    <th style="text-align: center;">ผู้บันทึก</th>
                                    <th style="text-align: center;">ลบ</th>
                                </tr>
                                @foreach($get_data_trac_harv as $key_data_trac_harv => $value_data_trac_harv)
                                <tr>
                                    <?php
                                    $harvest_date = thaidate('d-m-Y', strtotime($value_data_trac_harv->harvest_date));
                                    ?>
                                    <td class="font-prompt" style="text-align: center;">{{ ++$k }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $harvest_date }}</td>
                                    <td class="font-prompt">{{ $value_data_trac_harv->product }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_data_trac_harv->total_product }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_data_trac_harv->unit }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_data_trac_harv->recorder }}</td>
                                    <td class="center">
                                        <form action="{{ route('destroyTracHarv', $value_data_trac_harv->id) }}" method="post">
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
                    <div class="box-border-shadow mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label onclick="myFunction('Demo3')" id="name-savenote" class="ml-2" style="font-size:large;">การจำหน่ายผลผลิต</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="bt-last">
                                    <button type="submit" id="sellProduceRecord" class="bt-create-farm-record btn-sm">จด</button>
                                </div>
                            </div>
                        </div>
                        <div id="Demo3" class="">
                            <table id="customers" style="font-family: 'Prompt', sans-serif;">
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">วันที่จำหน่าย</th>
                                    <th style="text-align: center;">ผลผลิต</th>
                                    <th style="text-align: center;">จำนวน</th>
                                    <th style="text-align: center;">หน่วย</th>
                                    <th style="text-align: center;">ราคา</th>
                                    <th style="text-align: center;">ผู้บันทึก</th>
                                    <th style="text-align: center;">ลบ</th>
                                </tr>
                                @foreach($get_data_sell_produce as $key_sell_produce => $value_sell_produce)
                                <tr>
                                    <?php
                                    $sale_date = thaidate('d-m-Y', strtotime($value_sell_produce->sale_date));
                                    ?>
                                    <td class="font-prompt" style="text-align: center;">{{ ++$s }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $sale_date }}</td>
                                    <td class="font-prompt">{{ $value_sell_produce->produce }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_sell_produce->amount }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_sell_produce->unit }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_sell_produce->price }}</td>
                                    <td class="font-prompt" style="text-align: center;">{{ $value_sell_produce->recorder }}</td>
                                    <td class="center">
                                        <form action="{{ route('destroySellProduce', $value_sell_produce->id) }}" method="post">
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
        $('#cancelFormCreateFarmRecord').click(function() {
            $('.ant-modal-root-3').hide();
            $('.ant-modal-root-3-1').hide();
        });
        $('#FarmInputRecordTypeAndSource').click(function() {
            $('.ant-modal-root-3-1').show();
        });
        $('#cancelListRecord').click(function() {
            $('.ant-modal-root-3').hide();
        });
        $('#RecordOfFarmInputTheUtilization').click(function() {
            $('.ant-modal-root-3-2').show();
            $('#cancelRecordOfFarmInputTheUtilization').click(function() {
                $('.ant-modal-root-3-2').hide();
                $('.ant-modal-root-3').hide();
            });
        });
        $('#OrganicProduceHarvestRecord').click(function() {
            $('.ant-modal-root-3-3').show();
            $('#cancelOrganicProduceHarvestRecord').click(function() {
                $('.ant-modal-root-3-3').hide();
                $('.ant-modal-root-3').hide();
            });
        });
        $('#sellProduceRecord').click(function() {
            $('.ant-modal-root-3-4').show();
            $('#cancelSellProduceRecord').click(function() {
                $('.ant-modal-root-3-4').hide();
            });
        });
    });
</script>


@endsection