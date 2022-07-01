@extends('traceabilitys.layout')

@section('content')

<div class="wrapper">
    <div class="container-traceability">
        <div class="blur-box">
            <?php
            $harvest_date = thaidate('d-m-Y', strtotime($value_traceability->harvest_date));
            $plant_date = thaidate('d-m-Y', strtotime($value_traceability->plant_date));
            ?>
            @foreach($get_data_plot as $key_plot => $value_plot)
            <center>
                <img src="{{ asset('plot_images/'.$value_plot->img_name) }}" alt="Image" width="180px" style="border-radius:5%;">
            </center>
            <hr>
            <div class="row">
                <label>แปลง : <span>{{ $value_plot->name }}</span></label>
            </div>
            @endforeach
            <div class="row">
                <label>ผู้ปลูก : <span>{{$value_traceability->grower_name}}</span>
                </label>
            </div>
            @foreach($get_standard_user as $key_standard_user => $value_standard_user)
            <div class="row">
                <label>มาตรฐานการรับรอง : <span>{{$value_standard_user->standard}}</span>
                </label>
            </div>
            @endforeach
            <div class="row">
                <label>ผลผลิต : <span>{{$value_traceability->product}}</span></label>
            </div>
            <div class="row">
                <label>เริ่มปลูกตั้งแต่วันที่ : <span>{{ $plant_date }}</span>
                </label>
            </div>
            <div class="row">
                <label>เก็บเกี่ยวเมื่อวันที่ :
                    <span>{{$harvest_date}}
                    </span>
                </label>
            </div>
            <?php $i = 0; ?>
            <div class="row mt-3">
                <label class="mb-1">รายละเอียดการบำรุงรักษา</label>
                <table id="customers" style="font-family: 'Prompt', sans-serif;">
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">วันที่</th>
                        <th style="text-align: center;">รายการ</th>
                        <th style="text-align: center;">หมายเหตุ</th>
                    </tr>
                    @foreach($get_data_maintenance as $key_maintenance => $value_maintenance)
                    <tr style=" color:black;">
                        <?php
                        $maintenance_date = thaidate('d-m-Y', strtotime($value_maintenance->date));
                        ?>
                        <td class="font-prompt" style="text-align: center;">{{ ++$i }}</td>
                        <td class="font-prompt" style="text-align: center;">{{ $maintenance_date }}</td>
                        <td class="font-prompt" style="text-align: center;">{{ $value_maintenance->title }}</td>
                        <td class="font-prompt" style="text-align: center;">{{ $value_maintenance->notation }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

@endsection