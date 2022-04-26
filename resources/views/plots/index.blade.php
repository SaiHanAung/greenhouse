@extends('plots.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold">
    <div></div>
    <div class="main-layout products-container">
        <div class="main-layout--header">
            <div class="main-layout--header-name">จัดการฟาร์ม</div>
            <div class="main-layout--header-options">
                <div>
                    <button type="button" id="openFormNewFarm" class="ant-btn ant-btn-primary">
                        <!-- <a href="{{ route('plots.create') }}"> -->
                        <span role="img" aria-label="plus" class="anticon anticon-plus">
                            <svg viewBox="64 64 896 896" focusable="false" data-icon="plus" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                <path d="M482 152h60q8 0 8 8v704q0 8-8 8h-60q-8 0-8-8V160q0-8 8-8z"></path>
                                <path d="M176 474h672q8 0 8 8v60q0 8-8 8H176q-8 0-8-8v-60q0-8 8-8z"></path>
                            </svg>
                        </span>
                        <span>แปลงใหม่</span>
                        <!-- </a> -->
                    </button>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#openFormNewFarm').click(function() {
                            $('.ant-modal-root-1').show();
                        });
                        $('#cancelNewfarmForm').click(function() {
                            $('.ant-modal-root-1').hide();
                        });
                    });
                </script>
            </div>
        </div>
        <div class="main-layout--content"><span class="ant-input-affix-wrapper products-filter-input"><span class="ant-input-prefix"><span class="linearicon linearicon-search undefined"></span></span><input maxlength="200" class="ant-input" placeholder="Search Templates" type="text" value=""><span class="ant-input-suffix"><span></span></span></span>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif
            
            {{--@if ($plot == $user_plot)--}}
            <div class="settings-user-content main-list">
                @foreach($data as $key => $value)
                <form action="{{ route('plots.destroy', $value->id) }}" method="post">
                    <div class="main-list--item">
                        <a href="{{ route('plots.show', $value->id) }}">
                            <div class="main-list--item-preview main-list--item-preview--is-active"><img src="https://static-image.nyc3.cdn.digitaloceanspaces.com/general/default_template.png" alt="Logo"></div>
                            <div class="main-list--item-details">
                                <div class="main-list--item-details-name">{{ $value->name }}</div>
                                <div class="main-list--item-details-amount">Device : {{ $value->hardware }}</div>
                                {{$value->user_id}}
                            </div>
                        </a>
                    </div>
                    @csrf
                    @method('DELETE')
                    <!-- <button type="submit" class="btn btn-danger">ลบ</button> -->
                </form>
                @endforeach
                <div class="row">
                    {{-- 
                        {{$data->links()}}
                        --}}
                    </div>
                </div>
            </div>
            {{--@endif--}}
    </div>
</div>



@endsection