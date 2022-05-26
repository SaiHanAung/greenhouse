@extends('traceabilitys.layout')

@section('content')

<div class="wrapper">
    <div class="container-traceability">
        <div class="blur-box">
            @foreach($get_data_plot as $key_plot => $value_plot)
            <center>
                <img src="{{ asset('plot_images/'.$value_plot->file_path) }}" alt="Image" width="100%">
            </center>
            <div class="row">
                <label>แปลง : <span>{{ $value_plot->name }}</span></label>
            </div>
            @endforeach
            @if($check_date_trac_use_fact == 0 && $check_date_trac_harv == 0)
            ยังไม่มีบันทึก
            @else
            <div class="row">
                <label>เริ่มปลูกตั้งแต่วันที่ :
                    <span>
                        @if($check_date_trac_use_fact == 0)
                        ยังไม่มีบันทึก
                        @else
                        <?php
                        $date_of_use = thaidate('d - m - Y', strtotime($get_data_trac_use_fact->date_of_use));
                        ?>
                        {{$date_of_use}}
                        @endif
                    </span>
                </label>
            </div>
            <div class="row">
                <label>เก็บเกี่ยวเมื่อวันที่ :
                    <span>
                        @if($check_date_trac_harv == 0)
                        ยังไม่มีบันทึก
                        @else
                        <?php
                        $harvest_date = thaidate('d - m - Y', strtotime($get_data_trac_harv->harvest_date));
                        ?>
                        {{$harvest_date}}
                        @endif
                    </span>
                </label>
            </div>
            @endif
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