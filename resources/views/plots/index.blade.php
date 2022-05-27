@extends('plots.layout')

@section('content')

<style>
    /* @media only screen and (max-width: 576px) {
        .button {
            width: 100%;
        }
    } */
</style>

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
                    });
                    $(document).ready(function() {
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
        <div class="main-layout--content"><span class="ant-input-affix-wrapper products-filter-input"><span class="ant-input-prefix"><span class="linearicon linearicon-search undefined"></span></span><input maxlength="200" class="ant-input" placeholder="Search Templates" type="text" value=""><span class="ant-input-suffix"><span></span></span></span>
            @if ($message = Session::get('success'))
            <div id="alert" class="alert alert-success">
                <span class="font-prompt" style="font-size: medium;">{{ $message }}</span>
            </div>
            @endif
            <div class="settings-user-content main-list">
                @foreach($get_data_plot as $key => $value)
                <div class="row">
                    <div class="col-4">
                        <a href="{{ route('dashboard.index', ['datas'=>$value->id]) }}">
                            <div class="main-list--item">
                                <?php
                                // dd($value);
                                // echo asset('storage/');
                                ?>
                                <div class="main-list--item-preview main-list--item-preview--is-active"><img src="{{ asset('plot_images/'.$value->file_path) }}" alt="Image"></div>
                                <div class="main-list--item-details">
                                    <div class="main-list--item-details-name font-prompt"><label class="font-prompt" style="font-size:large;">แปลง :</label> {{ $value->name }}</div>
                                    <div class="main-list--item-details-name font-prompt"><label class="font-prompt" style="font-size:large;">ไอดี :</label> {{ $value->id }}</div>
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




@endsection