@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: large;">{{ __('สร้างบัญชีใหม่') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ-นามสกุล') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="เช่น สมชาย นามบุรุษ" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">ที่อยู่</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="เช่น 11 ม.1 ต.ในเวียง อ.เมือง จ.น่าน 55000" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">มาตรฐานการปลูก/การผลิต <br> ( มาตรฐานที่ได้รับการรับรอง )</label>

                            <div class="col-md-6">
                                <div class="vertical-center" style="width: 92%">
                                    <input type="text" class="form-control" value="{{ old('standard') }}" name="standard" placeholder="ถ้าไม่มีให้ใส่ -" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('อีเมล') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="กรอกอีเมลของผู้สมัคร" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>อีเมลนี้ถูกใช้แล้ว</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="กำหนดรหัสผ่าน 8 ตัวขึ้นไป" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="กรอกรหัสผ่านซ้ำอีกครั้ง" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-top:-1em; margin-bottom:2em;">
                            <div class="slidercaptcha card">
                                <div class="card-header">
                                    <span>ยืนยันว่าไม่ใช่บอท</span>
                                </div>
                                <div class="card-body">
                                    <div id="captcha"></div>
                                </div>
                            </div>
                                <input type="hidden" id="verify_identity" name="verify_identity" class="@error('verify_identity') is-invalid @enderror" required>
                                @error('verify_identity')
                                    <span class="invalid-feedback" role="alert">
                                        <center>
                                            <strong style="font-size:medium;">กรุณายืนยันตัวตนด้วย</strong>
                                        </center>
                                    </span>
                                @enderror
                        </div>

                        
                        <div class="form-group row mb-3">
                            <div class="col-sm-12">
                                <center>
                                    <button type="submit" class="btn btn-success">
                                        {{ __('สร้างบัญชี') }}
                                    </button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
