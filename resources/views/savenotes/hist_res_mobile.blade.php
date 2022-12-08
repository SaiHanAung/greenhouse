<div class="side-mobile">
    <div id="mySidenav" class="sidenav">
        <a href="{{ route('plots.index') }}" class="font-prompt">จัดการฟาร์ม</a>
        <ul>
            <li style="list-style-type: none;"><a href="{{ route('dashboard.index', $plotID) }}" class="font-prompt">แผงควบคุม</a></li>
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
    <hr style="margin: -1em 0 1em 0">
    <div class="container">
        @if ($message = Session::get('success'))
        <div id="alert" class="alert alert-success">
            <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
        </div>
        @endif
        @php $i = 0; $j = 0; $k = 0; $s = 0;@endphp
        <div class="row">
            <div class="col-12">
                <div class="width-border" style="margin-bottom: 1.5em;">
                    <p class="font-prompt text-center pt-3"><strong>ค่าใช้จ่าย</strong></p>
                    <div class="row">
                        <div class="col-12">
                            <div class="chart-container" style="height: 17em;">
                                <div class="chart has-fixed-height pt-5" id="pie_basic_history_plant_mobile" style="margin-top: -6rem;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php
                $recorder = $value_data_setting_plant->grower_name;
                $produce = $value_data_setting_plant->name;
                $total_pay = number_format($sum_total_price);
                $total_sell = number_format($sell_total_price);
                $sum_plant_area_price = number_format($plant_area_total_price);
                $sum_plant_price = number_format($plant_total_price);
                $sum_maintenance_price = number_format($maintenance_total_price);
                $sum_harvest_price = number_format($harvest_total_price);
                $sell_total_price = number_format($value_sell->total_price);
                ?>
                <div class="width-border" style="margin-bottom: 1.5em;">
                    <p class="font-prompt text-center pt-3"><strong>รายละเอียด</strong></p>
                    <div class="row">
                        <div class="ml-4">
                            <span>
                                <li>ผลผลิต : {{ $produce }}</li>
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
                    @endforeach
                    @foreach($get_data_note_harvest as $key_harvest => $value_harvest)
                    <?php
                    $harvest_date = thaidate('d/m/Y', strtotime($value_harvest->date));
                    ?>
                    <div class="row">
                        <div class="ml-4">
                            <span>
                                <li>เก็บเกี่ยววันที่ : {{ $harvest_date }}</li>
                            </span>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="ml-4">
                            <span>
                                <li>ค่าใช้จ่าย :
                                    {{$total_pay}}
                                    บาท
                                </li>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ml-4 mb-4">
                            <span>
                                <li>รายได้ :
                                    {{$total_sell}}
                                    บาท
                                </li>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-border-shadow mb-4">
            <div class="row">
                <div class="col-12">
                    <label onclick="myFunction('Demo1')" id="name-savenote" class="ml-2">การเตรียมพื้นที่ปลูก</label>

                </div>
            </div>
            <!-- <div id="Demo1" style="overflow-x:auto;"> -->
            <div id="Demo1" style="overflow-x:auto;">
                <table id="customers-history" style="font-family: 'Prompt', sans-serif;">
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">วันที่</th>
                        <th style="text-align: center;">รายการ</th>
                        <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                        <th style="text-align: center;">หมายเหตุ</th>
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
                    </tr>
                    @endforeach
                </table>
                <div class="row mt-2">
                    <div class="col-12" style="display: flex; justify-content: flex-end;">
                        <label style="font-weight:400;">ค่าใช้จ่าย :
                            <span>
                                {{$sum_plant_area_price}}
                            </span> บาท
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-border-shadow mb-4">
            <div class="row">
                <div class="col-6">
                    <label onclick="myFunction('Demo2')" id="name-savenote" class="ml-2">การเพาะปลูก</label>

                </div>
            </div>
            <div id="Demo2" style="overflow-x:auto;">
                <table id="customers-history" style="font-family: 'Prompt', sans-serif;">
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">วันที่</th>
                        <th style="text-align: center;">รายการ</th>
                        <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                        <th style="text-align: center;">หมายเหตุ</th>
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
                    </tr>
                    @endforeach
                </table>
                <div class="row mt-2">
                    <div class="col-12" style="display: flex; justify-content: flex-end;">
                        <label style="font-weight:400;">ค่าใช้จ่าย :
                            <span>
                                {{$sum_plant_price}}
                            </span> บาท
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-border-shadow mb-4">
            <div class="row">
                <div class="col-6">
                    <label onclick="myFunction('Demo2')" id="name-savenote" class="ml-2">การบำรุงรักษา</label>

                </div>
            </div>
            <div id="Demo2" style="overflow-x:auto;">
                <table id="customers-history" style="font-family: 'Prompt', sans-serif;">
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">วันที่</th>
                        <th style="text-align: center;">รายการ</th>
                        <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                        <th style="text-align: center;">หมายเหตุ</th>
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
                    </tr>
                    @endforeach
                </table>
                <div class="row mt-2">
                    <div class="col-12" style="display: flex; justify-content: flex-end;">
                        <label style="font-weight:400;">ค่าใช้จ่าย :
                            <span>
                                {{$sum_maintenance_price}}
                            </span> บาท
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-border-shadow mb-4">
            <div class="row">
                <div class="col-6">
                    <label onclick="myFunction('Demo3')" id="name-savenote" class="ml-2">การเก็บเกี่ยว</label>

                </div>
            </div>
            <div id="Demo3" style="overflow-x:auto;">
                <table id="customers-history" style="font-family: 'Prompt', sans-serif;">
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">วันที่</th>
                        <th style="text-align: center;">รายการ</th>
                        <th style="text-align: center;">ค่าใช้จ่าย(บาท)</th>
                        <th style="text-align: center;">หมายเหตุ</th>
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
                    </tr>
                    @endforeach
                </table>
                <div class="row mt-2">
                    <div class="col-12" style="display: flex; justify-content: flex-end;">
                        <label style="font-weight:400;">ค่าใช้จ่าย :
                            <span>
                                {{$sum_harvest_price}}
                            </span> บาท
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-border-shadow mb-4">
            <div class="row">
                <div class="col-6">
                    <label onclick="myFunction('Demo3')" id="name-savenote" class="ml-2">การจำหน่ายผลผลิต</label>
                </div>
            </div>
            <div id="Demo4" style="overflow-x:auto;">
                <table id="customers-history" style="font-family: 'Prompt', sans-serif;">
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">วันที่</th>
                        <th style="text-align: center;">จำนวน</th>
                        <th style="text-align: center;">หน่วย</th>
                        <th style="text-align: center;">ราคาต่อหน่วย</th>
                        <th style="text-align: center;">รวมเป็นเงิน(บาท)</th>
                    </tr>
                    @foreach($get_data_note_sell as $key_sell => $value_sell)
                    <tr>
                        <?php
                        $sale_date = thaidate('d-m-Y', strtotime($value_sell->date));
                        ?>
                        <td class="font-prompt" style="text-align: center;">{{ ++$s }}</td>
                        <td class="font-prompt" style="text-align: center;">{{ $sale_date }}</td>
                        <td class="font-prompt" style="text-align: center;">{{ $value_sell->amount }}</td>
                        <td class="font-prompt" style="text-align: center;">{{ $value_sell->unit }}</td>
                        <td class="font-prompt" style="text-align: center;">{{ $value_sell->price }}</td>
                        <td class="font-prompt" style="text-align: center;">{{ $sell_total_price }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<p style="margin-top:2em;">&nbsp;</p>

<script>
    var pie_basic_element_history_plant_mobile = document.getElementById('pie_basic_history_plant_mobile');
    if (pie_basic_element_history_plant_mobile) {
        var pie_basic_history_plant = echarts.init(pie_basic_element_history_plant_mobile);
        // pie_basic_history_plant.resize({
        //     width: 400,
        //     height: 300
        // });
        pie_basic_history_plant.setOption({
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
                bottom: '75%',
                left: 'center',                   
                data: ['เตรียมพื้นที่ปลูก', 
                'เพาะปลูก',
                'เก็บเกี่ยว',
                'บำรุงรักษา'
            ],
                itemHeight: 8,
                itemWidth: 8
            },

            series: [{
                name: 'ค่าใช้จ่าย',
                type: 'pie',
                radius: '20%',
                center: ['50%', '50%'],
                itemStyle: {
                    normal: {
                        borderWidth: 1,
                        borderColor: '#fff'
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
</script>