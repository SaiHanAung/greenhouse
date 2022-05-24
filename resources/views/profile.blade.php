@extends('layouts.profile.index')

@section('content')
@guest
@if (Route::has('register'))

@endif
@else
<div class="user-layout-right-content user-layout-right-content-fold">
    <div class="user-profile">
        <div>
            <div class="main-layout " style="margin: 64px 32px 0px 48px;">
                <div class="settings-user-header">
                    <div class="settings-user-header__image">
                        <!-- <div class="named-picture">{{ Str::limit(Auth::user()->name, 0) }}</div> -->
                        <div class="named-picture"><i class="icon-user"></i></div>
                    </div>
                    <div class="settings-user-header__info">
                        <div class="search--device-info--name">
                            <div class="global-search-user-header-name">{{ Auth::user()->name }}</div>
                        </div>
                    </div>
                    <style>
                        .dropbtn {
                            background-color: #04AA6D;
                            color: white;
                            padding: 16px;
                            font-size: 16px;
                            border: none;
                        }

                        .dropdown {
                            position: relative;
                            display: inline-block;
                        }

                        .dropdown-content {
                            border-radius: 5px;
                            display: none;
                            position: absolute;
                            background-color: #fff;
                            min-width: 160px;
                            box-shadow: 0px 0px 20px 5px #E8E8E8;
                            z-index: 1;
                        }

                        .dropdown-content a {
                            color: black;
                            padding: 5px 16px;
                            text-decoration: none;
                            display: block;
                        }

                        .dropdown-content a:hover {
                            background-color: #f6f6f6;
                        }

                        .dropdown:hover .dropdown-content {
                            display: block;
                        }

                        .dropdown:hover .dropbtn {
                            background-color: #3e8e41;
                        }
                    </style>
                    <div class="dropdown">
                        <button type="button" class="ant-btn actions-button ant-dropdown-trigger settings-user-header__menu-trigger"><span class="linearicon linearicon-dots undefined"></span></button>
                        <div class="dropdown-content" style="margin-left: 2vh; padding: 1vh 0 1vh 0;">
                            <a href="javascript:void(0)" id="openFormEditUserProfile"><img src="{{ asset('/imgs/writing.png') }}" alt="icon" width="12%"><span style="margin-left: 1rem;">แก้ไข</span></a>
                            <script>
                                $(document).ready(function() {
                                    $('#openFormEditUserProfile').click(function() {
                                        $('.ant-modal-root-1').show();
                                    });
                                    $('#cancelEditUserProfile').click(function() {
                                        $('.ant-modal-root-1').hide();
                                    });
                                    $('#openFormResetPassword').click(function() {
                                        $('.ant-modal-root-2').show();
                                    });
                                    $('#cancelResetPassword').click(function() {
                                        $('.ant-modal-root-2').hide();
                                    });
                                });
                            </script>
                            <a href="javascript:void(0)" id="openFormResetPassword"><img src="{{ asset('/imgs/lock.png') }}" alt="icon" width="12%"><span style="margin-left: 1rem;">ตั้งรหัสผ่านใหม่</span></a>
                            <a href="javascript:void(0)" style="color: red;"><img src="{{ asset('/imgs/trash.png') }}" alt="icon" width="12%"><span style="margin-left: 1rem;">ลบบัญชี</span></a>
                        </div>
                    </div>

                    <div class="ant-row user-profile--languages" style="row-gap: 0px;">
                        <!-- <div class="ant-col"><a class="user-profile--languages-item user-profile--languages-item--active">TH</a></div>
                        <div class="ant-col"><a class="user-profile--languages-item">EN</a></div> -->
                    </div>
                    <div class="settings-user-header__dark-mode">
                        <!-- <button type="button" role="switch" aria-checked="false" class="ant-switch ant-switch-small">
                            <div class="ant-switch-handle"></div><span class="ant-switch-inner"></span>
                        </button>
                        <span class="switch-label">โหมดมืด</span> -->
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        <a class="ant-btn settings-user-header__logout-button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="linearicon linearicon-exit undefined"></span>
                            <span> ออกจากระบบ</span>
                        </a>
                    </form>
                </div>
                <div></div>
                <div></div>
                <div></div>
                <div class="settings-user-content main-layout--content" style="height: calc(100vh - 200px);">
                    <div class="ant-row ant-row-no-wrap" style="overflow: auto; margin: 0px; row-gap: 0px;">
                        <div class="ant-col">
                            <div class="user-details-row">
                                <div class="form-item">
                                    <div class="form-item-title">อีเมล</div>
                                    <div class="form-item-content"><span>{{ Auth::user()->email }}</span></div>
                                </div>
                            </div>
                            <div class="user-details-row">
                                <div class="form-item">
                                    <div class="form-item-title">เข้าสู่ระบบครั้งล่าสุด</div>
                                    <div class="form-item-content">{{ date("d/m/Y H:i:s") }} วันนี้</div>
                                </div>
                            </div>
                            <div class="user-details-row">
                                <div class="form-item">
                                    <div class="form-item-title">เขตเวลา</div>
                                    <div class="form-item-content">เอเชีย/กรุงเทพ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection