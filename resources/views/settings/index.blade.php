@extends('settings.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold font-prompt">
    <div class="main-layout products-container">
        <div class="main-layout--header" style="border-bottom-color:#49cea1;">
            <div class="main-layout--header-name font-prompt">แปลง : {{ $value_data_plot->name }}</div>
            <div class="main-layout--header-options">
                <nav>
                    <div class="nav nav-tabs" style="border-bottom-color: #49cea1;">
                        <button class="nav-link"><a href="{{ route('dashboard.index', $plotID) }}" class="clearfonts">แดชบอร์ด</a></button>
                        <button class="nav-link"><a href="{{ route('savenote.index', $plotID) }}" class="clearfonts">จดบันทึก</a></button>
                        <!-- <button class="nav-link"><a href="{{ route('report.index', $plotID) }}" class="clearfonts">รายงาน</a></button> -->
                        <label class="nav-link clearfont active" style="color: #49cea1;border-color: #49cea1;border-bottom-color:transparent;">ตั้งค่า</label>
                        @if($check_traceability == 0) 
                        <button class="nav-link" data-toggle="tooltip" data-placement="left" title="หลังบันทึกการเก็บเกี่ยวแล้วกดปุ่มสร้าง Qr code จึงจะสามารถใช้งานได้">
                            <a href="javascript:void(0)" class="clearfonts">QR Code</a>
                        </button>
                        <script>
                            $(document).ready(function() {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        </script>
                        @else
                        <button class="nav-link">
                            <a href="{{ route('qrcode.index', $plotID) }}" class="clearfonts">QR Code</a>
                        </button>
                        @endif
                    </div>
                </nav>
                <a href="{{ route('logout.perform') }}" class="ant-btn ml-3">
                    <span class="linearicon linearicon-exit"></span>
                    <span class="font-prompt">ออกจากระบบ</span>
                </a>
            </div>
        </div>
        <div class="main-layout--content">
            <section style="margin-top: 1.5rem;margin-left: 1rem;">
                <div class="ant-col ant-col-24 product-details-info-col">
                    <div class="bt-last">
                        <button class="bt-edit-farm-record btn-sm mr-2" id="openFormEditPlot">แก้ไข</button>
                        <button type="button" onclick="document.getElementById('id01').style.display='block'" class="bt-delete-farm-record btn-sm">ลบแปลง</button>
                    </div>
                    <div class="row" style="margin-top: 1em;">
                        <div class="col-sm-6">
                            <div class="width-border">
                                <div class="p-4">
                                    <h3 class="font-prompt">รายละเอียดแปลง</h3>
                                    <div class="row">
                                        <label class="mb-2" style="font-size:large;"><strong>ขนาดแปลง : </strong><span style="font-size: medium;">{{ $value_data_plot->rai_size }} ไร่ {{ $value_data_plot->ngan_size }} งาน {{ $value_data_plot->square_wah_size }} ตารางวา</span></label>
                                    </div>
                                    <div class="row">
                                        <label class="mb-2" style="font-size:large;"><strong>ละติจูด : </strong><span style="font-size: medium;">{{ $value_data_plot->latitude }}</span></label>
                                    </div>
                                    <div class="row">
                                        <label class="mb-2" style="font-size:large;"><strong>ลองจิจูด : </strong><span style="font-size: medium;">{{ $value_data_plot->longitude }}</span></label>
                                    </div>
                                    <div class="row">
                                        <label style="font-size:large;"><strong>คำอธิบาย : </strong><span style="font-size: medium;">{{ $value_data_plot->description }}</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="width-border">
                                <div class="p-4">
                                    <h3 class="font-prompt">รายละเอียดระบบไอโอที</h3>
                                    <div class="row">
                                        <label class="mb-2" style="font-size:large;"><strong>โฮสต์ : </strong><span>{{ $value_data_plot->host }}</span></label>
                                    </div>
                                    <div class="row">
                                        <label class="mb-2" style="font-size:large;"><strong>ท็อปปิครับข้อมูล : </strong><span style="font-size: medium;">{{ $value_data_plot->topic_send }}</span></label>
                                    </div>
                                    <div class="row">
                                        <label class="mb-2" style="font-size:large;"><strong>ท็อปปิคส่งข้อมูล : </strong><span style="font-size: medium;">{{ $value_data_plot->topic_sub }}</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details-row">
                        <div class="ant-row row" style="margin-left: -16px; margin-right: -16px; row-gap: 0px;">
                            <div class="ant-col ant-col-24" style="padding-left: 16px; padding-right: 16px;">
                                <div class="form-item">
                                    <!-- <button class="bt-edit-farm-record btn-sm" id="openFormEditPlot">แก้ไข</button>
                                    <button type="button" onclick="document.getElementById('id01').style.display='block'" class="bt-delete-farm-record btn-sm">ลบ</button> -->
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#openFormEditPlot').click(function() {
                                            $(".edit-plot").show();
                                        });
                                        $('#cancelEditPlotForm').click(function() {
                                            $('.edit-plot').hide();
                                        });

                                        $('#openFormEditPlotOnMobile').click(function() {
                                            $('.edit-plot-mobile').show();
                                        });
                                        $('#cancelEditPlotFormOnMobile').click(function() {
                                            $('.edit-plot-mobile').hide();
                                        });

                                    });
                                </script>
                                <div id="id01" class="modal">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                                    <form class="modal-content" action="{{ route('plots.destroy', $plotID) }}" method="post">
                                        <div class="container">
                                            <h3 class="font-prompt">แปลง : {{ $value_data_plot->name }}</h3>
                                            <p class="font-prompt">ต้องการลบแปลงนี้หรือไม่?</p>

                                            <div class="clearfix">
                                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn font-prompt" style="font-size: medium;font-weight:bolder;">ยกเลิก</button>

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="deletebtn font-prompt" style="font-size: medium;font-weight:bolder;">ยืนยัน</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="edit-plot" style="display: none;">
                                    <form action="{{ route('plot-update', $plotID) }}" method="POST" enctype="multipart/form-data">
                                        <div class="ant-modal-mask"></div>
                                        <div class="ant-modal-wrap ant-modal-centered">
                                            <div class="ant-modal">
                                                <div class="ant-modal-content">
                                                    <div class="ant-modal-header">
                                                        <div class="font-prompt" style="font-size: x-large;">แก้ไขแปลง</div>
                                                    </div>
                                                    <div class="ant-modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="ant-row" style="margin-left: -4px; margin-right: -4px; row-gap: 0px;">
                                                            <div class="ant-col ant-col-12" style="padding-left: 4px; padding-right: 4px;">
                                                                <div class="ant-row ant-form-item normal-offset undefined" style="row-gap: 0px;">
                                                                    <label class="font-prompt">ชื่อ</label>
                                                                    <div class="ant-col ant-form-item-control">
                                                                        <div class="ant-form-item-control-input">
                                                                            <div class="ant-form-item-control-input-content">
                                                                                <input value="{{ $value_data_plot->name }}" name="name" type="text" class="ant-input @error('name') is-invalid @enderror">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ant-col ant-col-12" style="padding-left: 4px; padding-right: 4px;">
                                                                <div class="ant-row ant-form-item normal-offset undefined">
                                                                    <label class="font-prompt">Host</label>
                                                                    <div class="ant-col ant-form-item-control">
                                                                        <div class="ant-form-item-control-input">
                                                                            <div class="ant-form-item-control-input-content">
                                                                                <input type="text" name="host" class="ant-input font-prompt" value="{{ $value_data_plot->host }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ant-row" style="margin-left: -4px; margin-right: -4px; row-gap: 0px;">
                                                            <div class="ant-col ant-col-12" style="padding-left: 4px; padding-right: 4px;">
                                                                <div class="ant-row ant-form-item normal-offset undefined" style="row-gap: 0px;">
                                                                    <label class="font-prompt">Topic send</label>
                                                                    <div class="ant-col ant-form-item-control">
                                                                        <div class="ant-form-item-control-input">
                                                                            <div class="ant-form-item-control-input-content">
                                                                                <input type="text" name="topic_send" class="ant-input font-prompt" value="{{ $value_data_plot->topic_send }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ant-col ant-col-12" style="padding-left: 4px; padding-right: 4px;">
                                                                <div class="ant-row ant-form-item normal-offset undefined">
                                                                    <label class="font-prompt">Topic sub</label>
                                                                    <div class="ant-col ant-form-item-control">
                                                                        <div class="ant-form-item-control-input">
                                                                            <div class="ant-form-item-control-input-content">
                                                                                <input type="text" name="topic_sub" class="ant-input font-prompt" value="{{ $value_data_plot->topic_sub }}" placeholder="Topic ผู้ให้บริการ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ant-row" style="margin-left: -4px; margin-right: -4px; row-gap: 0px;">
                                                            <div class="ant-col ant-col-12" style="padding-left: 4px; padding-right: 4px;">
                                                                <div class="ant-row ant-form-item normal-offset undefined" style="row-gap: 0px;">
                                                                    <label class="font-prompt">รูปภาพ</label>
                                                                    <div class="ant-col ant-form-item-control">
                                                                        <div class="ant-form-item-control-input">
                                                                            <div class="ant-form-item-control-input-content" style="width: 400px;">
                                                                                <div class="row">
                                                                                    <div class="col-sm-6">
                                                                                        <input class="font-prompt" type="file" name="file_path">
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <img src="{{ asset('plot_images/'.$value_data_plot->img_name) }}" alt="Image" width="50%">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ant-row ant-form-item large-offset">
                                                            <label class="font-prompt">รายละเอียด</label>
                                                            <div class="ant-col ant-form-item-control">
                                                                <div class="ant-form-item-control-input">
                                                                    <div class="ant-form-item-control-input-content">
                                                                        <input type="text" rows="5" name="description" class="font-prompt ant-input" value="{{ $value_data_plot->description }}"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        <div class="ant-modal-footer">
                                                            <button type="button" id="cancelEditPlotForm" class="ant-btn ant-btn-secondary">
                                                                <span class="font-prompt">ยกเลิก</span>
                                                            </button>
                                                            <button type="submit" class="ant-btn ant-btn-primary">
                                                                <span class="font-prompt">ยืนยัน</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <script>
                                    // Get the modal
                                    var modal = document.getElementById('id01');
                                    var delete_plot_mobile = document.getElementById('delete-plot-mobile');

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function(event) {
                                        if (event.target == modal || event.target == delete_plot_mobile) {
                                            modal.style.display = "none";
                                            delete_plot_mobile.style.display = "none";
                                        }
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection