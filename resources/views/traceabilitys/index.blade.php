@extends('traceabilitys.layout')

@section('content')

<div class="wrapper">
    <div class="container">
        <div class="blur-box">
            @foreach($get_data_plot as $key_plot => $value_plot)
            <center>
                <img src="{{ asset('storage/plot_images/'.$value_plot->file_path) }}" alt="Image" width="20%">
            </center>
            <div class="row">
                <label>แปลง : <span>{{ $value_plot->name }}</span></label>
            </div>
            @endforeach

            <?php
            $date_of_use = thaidate('d - m - Y', strtotime($get_data_trac_use_fact));
            $harvest_date = thaidate('d - m - Y', strtotime($get_data_trac_harv));
            ?>
            <div class="row">
                <label>เริ่มปลูกตั้งแต่วันที่ : <span>{{ $date_of_use }}</span></label>
            </div>


            <div class="row">
                <label>เก็บเกี่ยวเมื่อวันที่ : <span>{{ $harvest_date }}</span></label>
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