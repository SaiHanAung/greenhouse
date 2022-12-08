            <div class="side-mobile">
                <div id="mySidenav" class="sidenav">
                    <a href="{{ route('plots.index') }}" class="font-prompt">จัดการฟาร์ม</a>
                    <ul>
                        <li style="list-style-type: none;"><a href="{{ route('dashboard.index', $plotID) }}" class="font-prompt">แผงควบคุม</a></li>
                        <li style="list-style-type: none;"><a href="javascript:void(0)" style="color: #49cea1;" class="font-prompt">จดบันทึก</a></li>
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
                                <div class="container hideHead" onclick="slider(this)" style="width:fit-content;">
                                    <div class="bar1-x"></div>
                                    <div class="bar2-x"></div>
                                    <div class="bar3-x"></div>
                                </div>
                            </span>
                        </div>
                        <div class="col-6">
                            <label class="font-prompt vertical-center"><strong id="plotName" style="font-size: large;font-weight:bolder;"> แปลง : {{$value_name_sub}}</strong></label>
                        </div>
                    </div>
                </div>
                <hr style="margin: -1em 0 -.5em 0">
                <div class="container">
                    @if ($message = Session::get('success'))
                    <div id="alert" class="alert alert-success">
                        <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
                    </div>
                    @endif
                    @php $i = 0; $j = 0; $k = 0; $s = 0;@endphp
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <a href="javascipt:void(0)" id="openModalSaveNoteMobile" class="bt-create-farm-record btn-sm font-prompt" style="font-size: medium; padding: .3em 1.5em;">จดบันทึก</a>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-12">
                                <label onclick="myFunction('Demo1')" id="name-savenote" class="ml-2" style="font-size:large;">การเตรียมพื้นที่ปลูก</label>
                                @if($check_tract_total_price == 0)
                                @else
                                <a href="{{ route('TracFactExcel') }}" class="ant-btn ml-3 font-prompt">ดาวน์โหลด Excel</a>
                                @endif
                            </div>
                        </div>
                        <!-- <div id="Demo1" style="overflow-x:auto;"> -->
                        <div id="Demo1" style="overflow-x:auto;">
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
                    <hr>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-12">
                                <label onclick="myFunction('Demo2')" id="name-savenote" class="ml-2" style="font-size:large;">การเพาะปลูก</label>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                @if($check_data_trac_use_fact == 0)
                                @else
                                <a href="{{ route('TracUseFactExcel') }}" class="ant-btn ml-3 font-prompt">ดาวน์โหลด Excel</a>
                                @endif
                            </div>
                        </div>
                        <div id="Demo2" style="overflow-x:auto;">
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
                    <hr>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-12">
                                <label onclick="myFunction('Demo3')" id="name-savenote" class="ml-2" style="font-size:large;">การบำรุงรักษา</label>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                @if($check_data_trac_harv == 0)
                                @else
                                <a href="{{ route('TracHarvExcel') }}" class="ant-btn ml-3 font-prompt">ดาวน์โหลด Excel</a>
                                @endif
                            </div>
                        </div>
                        <div id="Demo3" style="overflow-x:auto;">
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
                    <hr>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label onclick="myFunction('Demo3')" id="name-savenote" class="ml-2" style="font-size:large;">การเก็บเกี่ยว</label>
                            </div>
                        </div>
                        <div id="Demo4" style="overflow-x:auto;">
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
                    <hr>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label onclick="myFunction('Demo3')" id="name-savenote" class="ml-2" style="font-size:large;">การจำหน่ายผลผลิต</label>
                            </div>
                        </div>
                        <div id="Demo4" style="overflow-x:auto;">
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
            </div>
            <div class="modal-savenote-mobile" style="display: none;">
                <div class="ant-modal-mask"></div>
                <div class="ant-modal-wrap">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="card">
                                <div class="card-title">
                                    <center>
                                        <div class="mt-4" style="font-size:large;font-weight:bolder;">จดบันทึกการเพาะปลูก</div>
                                        <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                                    </center>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <button id="openFormPlantingAreaMobile" class="ant-btn" style="width: 100%;">
                                                เตรียมพื้นที่ปลูก
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <button id="openFormPlantMobile" class="ant-btn" style="width: 100%;">
                                                เพาะปลูก
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <button id="openFormMaintenanceMobile" class="ant-btn" style="width: 100%;">
                                                บำรุงรักษา
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <button id="openFormHarvestMobile" class="ant-btn" style="width: 100%;">
                                                เก็บเกี่ยว
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <button id="openFormSellMobile" class="ant-btn" style="width: 100%;">
                                                การจำหน่าย
                                            </button>
                                        </div>
                                    </div>
                                    <div class="ant-modal-footer mt-4">
                                        <button type="button" class="ant-btn ant-btn-secondary" id="cancelModalSaveNoteMobile">
                                            <span>ยกเลิก</span>
                                        </button>
                                        <button class="ant-btn ant-btn-primary">
                                            <span>ยืนยัน</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
            <div class="form-plant-area-mobile" style="display: none;">
                <form action="{{ route('savenote.storeNotePlantArea') }}" method="POST">
                    @csrf
                    <div class="ant-modal-mask"></div>
                    <div class="ant-modal-wrap">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-title">
                                        <center>
                                            <div class="mt-4" style="font-size:large;font-weight:bolder;">จดบันทึก - การเตรียมพื้นที่ปลูก</div>
                                            <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                                        </center>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <label style="font-size: medium;">วันที่</label>
                                                <input class="ant-input font-prompt" type="date" name="date" id="datePicker_plant_area" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">รายการ</label>
                                                <select class="ant-input font-prompt" name="title">
                                                    <option class="special" value="เตรียมดิน">
                                                        <span class="">เตรียมดิน</span>
                                                    </option>
                                                    <option class="special" value="แรงงาน">
                                                        <span class="">แรงงาน</span>
                                                    </option>
                                                    <option class="special" value="โรงเรือน">
                                                        <span class="">โรงเรือน</span>
                                                    </option>
                                                    <option class="special" value="ค่าอื่นๆ">
                                                        <span class="">อื่น ๆ </span>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">ค่าใช้จ่าย</label>
                                                <input name="price" type="number" class="ant-input" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">หมายเหตุ</label>
                                                <input name="notation" type="text" class="ant-input">
                                            </div>
                                        </div>
                                        <input type="hidden" name="plot_id" value="{{$plotID}}">
                                        <div class="ant-modal-footer mt-4">
                                            <button class="ant-btn ant-btn-secondary" id="cancelFormPlantingAreaMobile">
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
            <div class="form-plant-mobile" style="display: none;">
                <form action="{{ route('savenote.storeNotePlant') }}" method="POST">
                    @csrf
                    <div class="ant-modal-mask"></div>
                    <div class="ant-modal-wrap">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-title">
                                        <center>
                                            <div class="mt-4" style="font-size:large;font-weight:bolder;">จดบันทึก - การเพาะปลูก</div>
                                            <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                                        </center>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <label style="font-size: medium;">วันที่</label>
                                                <input class="ant-input font-prompt" type="date" name="date" id="datePicker_plant" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">รายการ</label>
                                                <select class="ant-input font-prompt" name="title">
                                                    <option class="special" value="ต้นกล้า">
                                                        <span class="">ต้นกล้า</span>
                                                    </option>
                                                    <option class="special" value="แรงงาน">
                                                        <span class="">แรงงาน</span>
                                                    </option>
                                                    <option class="special" value="ค่าอื่นๆ">
                                                        <span class="">อื่น ๆ </span>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">ค่าใช้จ่าย</label>
                                                <input name="price" type="number" class="ant-input" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">หมายเหตุ</label>
                                                <input name="notation" type="text" class="ant-input">
                                            </div>
                                        </div>
                                        <input type="hidden" name="plot_id" value="{{$plotID}}">
                                        <div class="ant-modal-footer mt-4">
                                            <button class="ant-btn ant-btn-secondary" id="cancelFormPlantMobile">
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
            <div class="form-maintenance-mobile" style="display: none;">
                <form action="{{ route('savenote.storeNoteMaintenance') }}" method="POST">
                    @csrf
                    <div class="ant-modal-mask"></div>
                    <div class="ant-modal-wrap">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-title">
                                        <center>
                                            <div class="mt-4" style="font-size:large;font-weight:bolder;">จดบันทึก - การบำรุงรักษา</div>
                                            <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                                        </center>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <label style="font-size: medium;">วันที่</label>
                                                <input class="ant-input font-prompt" type="date" name="date" id="datePicker_maintenance" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">รายการ</label>
                                                <select class="ant-input font-prompt" name="title">
                                                    <option class="special" value="ปุ๋ย">
                                                        <span class="">ปุ๋ย</span>
                                                    </option>
                                                    <option class="special" value="แรงงาน">
                                                        <span class="">แรงงาน</span>
                                                    </option>
                                                    <option class="special" value="ค่าอื่นๆ">
                                                        <span class="">อื่น ๆ </span>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">ค่าใช้จ่าย</label>
                                                <input name="price" type="number" class="ant-input" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">หมายเหตุ</label>
                                                <input name="notation" type="text" class="ant-input">
                                            </div>
                                        </div>
                                        <input type="hidden" name="plot_id" value="{{$plotID}}">
                                        <div class="ant-modal-footer mt-4">
                                            <button class="ant-btn ant-btn-secondary" id="cancelFormMaintenanceMobile">
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
            <div class="form-harvest-mobile" style="display: none;">
                <form action="{{ route('savenote.storeNoteHarvest') }}" method="POST">
                    @csrf
                    <div class="ant-modal-mask"></div>
                    <div class="ant-modal-wrap">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-title">
                                        <center>
                                            <div class="mt-4" style="font-size:large;font-weight:bolder;">จดบันทึก - การเก็บเกี่ยว</div>
                                            <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                                        </center>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <label style="font-size: medium;">วันที่</label>
                                                <input class="ant-input font-prompt" type="date" name="date" id="datePicker_harvest" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">รายการ</label>
                                                <select class="ant-input font-prompt" name="title">
                                                    <option class="special" value="แรงงาน">
                                                        <span class="">แรงงาน</span>
                                                    </option>
                                                    <option class="special" value="ค่าอื่นๆ">
                                                        <span class="">อื่น ๆ </span>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">ค่าใช้จ่าย</label>
                                                <input name="price" type="number" class="ant-input" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">หมายเหตุ</label>
                                                <input name="notation" type="text" class="ant-input">
                                            </div>
                                        </div>
                                        <input type="hidden" name="plot_id" value="{{$plotID}}">
                                        <div class="ant-modal-footer mt-4">
                                            <button class="ant-btn ant-btn-secondary" id="cancelFormHarvestMobile">
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
            <div class="form-sell-mobile" style="display: none;">
                <form action="{{ route('savenote.storeNoteSell') }}" method="POST">
                    @csrf
                    <div class="ant-modal-mask"></div>
                    <div class="ant-modal-wrap">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-title">
                                        <center>
                                            <div class="mt-4" style="font-size:large;font-weight:bolder;">จดบันทึก - การจำหน่ายผลผลิต</div>
                                            <hr style="width: 90%; margin-top: 1em; margin-bottom:-.1em">
                                        </center>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <label style="font-size: medium;">วันที่</label>
                                                <input class="ant-input font-prompt" type="date" name="date" id="datePicker_sell" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label style="font-size: medium;">จำนวน</label>
                                                <input name="amount" type="number" class="ant-input">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">หน่วย</label>
                                                <select class="ant-input font-prompt" name="unit">
                                                    <option class="special" value="กิโลกรัม">
                                                        <span class="">กิโลกรัม</span>
                                                    </option>
                                                    <option class="special" value="กรัม">
                                                        <span class="">กรัม</span>
                                                    </option>
                                                    <option class="special" value="ขีด">
                                                        <span class="">ขีด</span>
                                                    </option>
                                                    <option class="special" value="ลิตร">
                                                        <span class="">ลิตร</span>
                                                    </option>
                                                    <option class="special" value="ตัน">
                                                        <span class="">ตัน</span>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">ราคาต่อหน่วย</label>
                                                <input name="price" type="number" class="ant-input" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label style="font-size: medium;">รวมเป็นเงิน(บาท)</label>
                                                <input name="total_price" type="number" class="ant-input" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="plot_id" value="{{$plotID}}">
                                        <div class="ant-modal-footer mt-4">
                                            <button type="button" class="ant-btn ant-btn-secondary" id="cancelFormSellMobile">
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