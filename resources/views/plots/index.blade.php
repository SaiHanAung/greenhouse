@extends('plots.layout')

@section('content')

@guest
@if (Route::has('register'))

@endif
@else
<?php
$userID = Auth::user()->id;

$get_data_plot = DB::table('plots')
    ->select('id', 'name', 'host', 'topic_send', 'topic_sub', 'description','img_name', 'rai_size', 'ngan_size', 'square_wah_size')
    ->where('user_id', '=', $userID)->get();
?>
<div class="user-layout-right-content user-layout-right-content-fold">
    <div></div>
    <div class="main-layout products-container">
        <div class="mt-5 mb-3" style="padding-bottom: 1rem; border-bottom:#49cea1 1px solid;">
            <!-- <div class="main-layout--header" style="border-bottom-color:#49cea1;"> -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="main-layout--header-name font-prompt">จัดการฟาร์ม</div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6" style="display: flex; justify-content:flex-end;">
                    <button type="button" id="openFormNewFarm" class="ant-btn ant-btn-primary">
                        <div class="row">
                            <div class="col-1">
                                <span style="font-size: large;">+</span>
                            </div>
                            <div class="col-10">
                                <span class="font-prompt" style="font-size: medium;">สร้างแปลงใหม่</span>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
            <div class="main-layout--header-options">
                <script>
                    $(document).ready(function() {
                        $('#openFormNewFarm').click(function() {
                            $('.ant-modal-root-1').show();
                        });
                        $('#cancelNewfarmForm').click(function() {
                            $('.ant-modal-root-1').hide();
                        });
                        
                        $('#openFormEditPlot').click(function() {
                            $('.edit-plot').show();
                        });
                        $('#cancelEditPlotForm').click(function() {
                            $('.edit-plot').hide();
                        });
                    });
                </script>
            </div>
        </div>
        <div class="main-layout--content">
            <!-- <form action="{{url('/search-record')}}"method="post" style="margin-bottom: -1em;">
                <span class="ant-input-affix-wrapper products-filter-input">
                    <span class="ant-input-prefix">
                    <span class="linearicon linearicon-search"></span>
                </span>
                    @csrf
                    <input class="ant-input font-prompt" placeholder="ค้นหา" type="text" name="name"/>
                    <input class="ant-btn" type="submit" value="ค้นหา"/>
                    <span class="ant-input-suffix">
                        <span></span>
                    </span>
                </span>
            </form> -->
            @if ($message = Session::get('success'))
            <div id="alert" class="alert alerSuccess">
                <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
            </div>
            @endif
            <div class="settings-user-content main-list">
                @foreach($get_data_plot as $key => $value)
                <div class="row mt-3">
                    <div class="col-4">
                        <a href="{{ route('dashboard.index', ['plotID'=>$value->id]) }}">
                            <div class="main-list--item">
                                <?php
                                // dd($value);
                                // echo asset('storage/');
                                ?>
                                <div class="main-list--item-preview main-list--item-preview--is-active"><img src="{{ asset('plot_images/'.$value->img_name) }}" alt="Image"></div>
                                <div class="main-list--item-details">
                                    <div class="main-list--item-details-name font-prompt"><label class="font-prompt" style="font-size:large;">แปลง :</label> {{ $value->name }}</div>
                                    <div class="main-list--item-details-name font-prompt">
                                        <label class="font-prompt" style="font-size:large;">ขนาด :</label> 
                                        @if($value->rai_size == 0)
                                        @else
                                        {{$value->rai_size}} ไร่
                                        @endif
                                        @if($value->ngan_size == 0)
                                        @else
                                        {{$value->ngan_size}} งาน
                                        @endif
                                        @if($value->square_wah_size == 0)
                                        @else
                                        {{$value->square_wah_size}} ตารางวา
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    {{--
                        {{$data->links()}}
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endguest
@endsection