@extends('plots.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold">
    <div class="main-layout ">
        <div class="main-layout--header">
            <div class="main-layout--header-name">{{ $plot->name }}</div>
            <div class="main-layout--header-options">
                <!-- <div><button type="button" class="ant-btn ant-btn-default"><span>Clone</span></button><button type="button" class="ant-btn ant-btn-primary"><span>Edit</span></button></div> -->
            </div>
        </div>
        <div class="product-details-content main-layout--content">
            <!-- <div class="ant-tabs ant-tabs-top products-tabs"> -->
            <!-- <div role="tablist" class="ant-tabs-nav"> -->
            <!-- <div class="ant-tabs-nav-wrap"> -->
            <!-- <div class="ant-tabs-nav-list" style="transform: translate(0px, 0px);"> -->
            <style>
                /* CSS for the main interaction */
                .tabset>input[type="radio"] {
                    position: absolute;
                    left: -200vw;
                }

                .tabset .tab-panel {
                    display: none;
                }

                .tabset>input:first-child:checked~.tab-panels>.tab-panel:first-child,
                .tabset>input:nth-child(3):checked~.tab-panels>.tab-panel:nth-child(2),
                .tabset>input:nth-child(5):checked~.tab-panels>.tab-panel:nth-child(3),
                .tabset>input:nth-child(7):checked~.tab-panels>.tab-panel:nth-child(4),
                .tabset>input:nth-child(9):checked~.tab-panels>.tab-panel:nth-child(5),
                .tabset>input:nth-child(11):checked~.tab-panels>.tab-panel:nth-child(6) {
                    display: block;
                }

                /* Styling */
                /* body {
                                    font: 16px/1.5em "Overpass", "Open Sans", Helvetica, sans-serif;
                                    color: #333;
                                    font-weight: 300;
                                } */

                .tabset>label {
                    position: relative;
                    display: inline-block;
                    padding: 15px 15px;
                    /* border: 1px solid transparent; */
                    /* border-bottom: 5px; */
                    cursor: pointer;
                    font-weight: 600;
                }

                .tabset>label::after {
                    content: "";
                    position: absolute;
                    left: 15px;
                    bottom: 10px;
                    width: 22px;
                    height: 4px;
                    /* background: #8d8d8d; */
                }

                .tabset>label:hover,
                .tabset>input:focus+label {
                    color: #24C48E;
                }

                .tabset>label:hover::after,
                .tabset>input:focus+label::after,
                .tabset>input:checked+label::after {
                    background: #24C48E;
                }

                /* .tabset>input:checked+label {
                                    border-color: #ccc;
                                    border-bottom: 1px solid #fff;
                                    margin-bottom: -20px;
                                } */

                .tab-panel {
                    padding: 30px 0;
                    /* border-top: 1px solid #ccc; */
                }

                /* Demo purposes only */
                /* *,
                                *:before,
                                *:after {
                                    box-sizing: border-box;
                                } */

                /* body {
                                    padding: 30px;
                                } */

                /* .tabset {
                                    max-width: 65em;
                                } */
            </style>
            <div class="tabset">
                <!-- Tab 1 -->
                <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
                <label for="tab1">ข้อมูล</label>
                <!-- Tab 2 -->
                <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
                <label for="tab2">แผงควบคุม</label>
                <!-- Tab 3 -->
                <input type="radio" name="tabset" id="tab3" aria-controls="dunkles">
                <label for="tab3">รายงาน</label>
                <!-- Tab 4 -->
                <input type="radio" name="tabset" id="tab4" aria-controls="savenote">
                <label for="tab4">จดบันทึก</label>
                <hr style="padding: 0; margin: 0;">
                <div class="tab-panels">
                    <section id="marzen" class="tab-panel">
                        <div role="tabpanel" tabindex="0" aria-hidden="false" class="ant-tabs-tabpane ant-tabs-tabpane-active" id="rc-tabs-0-panel-info" aria-labelledby="rc-tabs-0-tab-info">
                            <div class="products-create-tabs-inner-content max-width-content">
                                <div class="ant-row ant-row-no-wrap" style="margin-left: -16px; margin-right: -16px; row-gap: 0px;">
                                    <div class="ant-col ant-col-12 product-details-info-col" style="padding-left: 16px; padding-right: 16px;">
                                        <div class="product-details-row">
                                            <div class="ant-row" style="margin-left: -4px; margin-right: -4px; row-gap: 0px;">
                                                <div class="ant-col ant-col-12" style="padding-left: 4px; padding-right: 4px;">
                                                    <div class="form-item">
                                                        <div class="form-item-title">ฮาร์ดแวร์</div>
                                                        <div class="form-item-content offset-sm">{{ $plot->hardware }}</div>
                                                    </div>
                                                </div>
                                                <div class="ant-col ant-col-12" style="padding-left: 4px; padding-right: 4px;">
                                                    <div class="form-item">
                                                        <div class="form-item-title">ประเภทการเชื่อมต่อ</div>
                                                        <div class="form-item-content offset-sm">{{ $plot->connection_type }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-details-row">
                                            <div class="ant-row row" style="margin-left: -16px; margin-right: -16px; row-gap: 0px;">
                                                <div class="ant-col ant-col-24" style="padding-left: 16px; padding-right: 16px;">
                                                    <div class="form-item">
                                                        <div class="form-item-title">คำอธิบาย</div>
                                                        <div class="form-item-content offset-sm"><span>{{ $plot->description }}<br></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-details-row">
                                            <div class="ant-row row" style="margin-left: -16px; margin-right: -16px; row-gap: 0px;">
                                                <div class="ant-col ant-col-24" style="padding-left: 16px; padding-right: 16px;">
                                                    <div class="form-item">
                                                        <button class="bt-edit btn-sm">แก้ไข</button>
                                                        <button type="button" onclick="document.getElementById('id01').style.display='block'" class="bt-delete btn-sm">ลบ</button>
                                                    </div>
                                                    

                                                    <div id="id01" class="modal">
                                                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                                                        <form class="modal-content" action="{{ route('plots.destroy', $plot->id) }}" method="post">
                                                            <div class="container">
                                                                <h1>{{ $plot->name }}</h1>
                                                                <p>ต้องการลบแปลงนี้หรือไม่?</p>

                                                                <div class="clearfix">
                                                                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">ยกเลิก</button>

                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="deletebtn">ยืนยัน</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <script>
                                                        // Get the modal
                                                        var modal = document.getElementById('id01');

                                                        // When the user clicks anywhere outside of the modal, close it
                                                        window.onclick = function(event) {
                                                            if (event.target == modal) {
                                                                modal.style.display = "none";
                                                            }
                                                        }
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-col ant-col-12" style="padding-left: 16px; padding-right: 16px;">
                                        <div class="product-details-row product-details-image">
                                            <!-- <img src="https://static-image.nyc3.cdn.digitaloceanspaces.com/general/default_template.png" alt="Logo"> -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="form-group text-center" id="bio">
                                                            <!-- <img src="" id="bio" class="img-fluid" alt=""> -->
                                                        </div>
                                                        <style>
                                                            .text-download {
                                                                background-color: #49cea1;
                                                                border: none;
                                                                color: white;
                                                                padding: 12px 30px;
                                                                cursor: pointer;
                                                                font-size: 20px;
                                                            }

                                                            .text-download:hover {
                                                                background-color: #24C48E;
                                                            }
                                                        </style>
                                                        <div class="form-group text-center">
                                                            <img src="https://chart.googleapis.com/chart?cht=qr&chl=http://www.google.com&chs=180x180&choe=UTF-8" alt="">
                                                            <p class="text-download" onclick="download()">ดาวน์โหลด QR Code</p class="text-download">
                                                            <!-- <p class="text-download" onclick="download()" style="display: none;">ดาวน์โหลด QR Code</p class="text-download"> -->
                                                        </div>
                                                        <div class="form-group">
                                                            <!-- <button class="btn btn-success btn-block" type="submit" id="request" name="submit">สร้าง QR Code สำหรับตรวจสอบย้อนกลับ</button> -->
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <section id="rauchbier" class="tab-panel">
                        <style>
                            .worko-tabs {
                                margin-left: 20px;
                                width: 95%;
                            }

                            .worko-tabs .state {
                                position: absolute;
                                left: -10000px;
                            }

                            .worko-tabs .flex-tabs .tab {
                                flex-grow: 1;
                                max-height: 10vh;
                                border-radius: 5px;
                                margin-right: 1rem;
                                padding: 0.5rem 1rem;
                            }

                            .worko-tabs .flex-tabs .panel {
                                background-color: #fff;
                                padding: 20px;
                                height: auto;
                                display: none;
                                width: 100%;
                                flex-basis: auto;
                            }

                            .worko-tabs .tab {
                                display: inline-block;
                                padding: 10px;
                                vertical-align: top;
                                background-color: #fff;
                                cursor: hand;
                                cursor: pointer;
                                border: 1px solid #24C48E;
                            }

                            .worko-tabs .tab:hover {
                                background-color: #24C48E;
                                box-shadow: 0px 0px 20px 5px #E8E8E8;
                            }

                            #tab-one:checked~.tabs #tab-one-label,
                            #tab-two:checked~.tabs #tab-two-label,
                            #tab-three:checked~.tabs #tab-three-label,
                            #tab-four:checked~.tabs #tab-four-label,
                            #tab-five:checked~.tabs #tab-five-label {
                                background-color: #24C48E;
                                cursor: default;
                                box-shadow: 0px 0px 20px 5px #e1e1e1;
                            }

                            #tab-one:checked~.tabs #tab-one-panel,
                            #tab-two:checked~.tabs #tab-two-panel,
                            #tab-three:checked~.tabs #tab-three-panel,
                            #tab-four:checked~.tabs #tab-four-panel,
                            #tab-five:checked~.tabs #tab-five-panel {
                                display: block;
                                border-bottom: 2px solid white;
                            }
                        </style>
                        <div class="worko-tabs">

                            <input class="state" type="radio" title="tab-one" name="tabs-state" id="tab-one" checked />
                            <input class="state" type="radio" title="tab-two" name="tabs-state" id="tab-two" />
                            <input class="state" type="radio" title="tab-three" name="tabs-state" id="tab-three" />
                            <input class="state" type="radio" title="tab-four" name="tabs-state" id="tab-four" />
                            <input class="state" type="radio" title="tab-five" name="tabs-state" id="tab-five" />

                            <div class="tabs flex-tabs">
                                <label for="tab-one" id="tab-one-label" class="tab">โดยรวม</label>
                                <label for="tab-two" id="tab-two-label" class="tab">อัตโนมัติ</label>
                                <label for="tab-three" id="tab-three-label" class="tab">I/O</label>
                                <label for="tab-four" id="tab-four-label" class="tab">ตั้งเวลา</label>
                                <style>
                                    .width-border {
                                        max-width: 100%;
                                        width: 100%;
                                        border: 1px solid #24C48E;
                                        border-radius: 5px;
                                        margin-bottom: 3rem;
                                    }

                                    .width-border:hover {
                                        box-shadow: 0px 0px 20px 5px #e8e8e8;
                                        /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); */
                                    }

                                    .center {
                                        text-align: center;
                                    }

                                    .bt-start {
                                        background-color: #24C48E;
                                        border: 1px solid #24C48E;
                                        /* max-width: 30%; */
                                        width: fit-content;
                                        height: 8vh;
                                        border-radius: 5px;
                                        /* font-weight: 600; */
                                        font-size: 20px;
                                    }

                                    .bt-start:hover {
                                        color: white;
                                        border: 1px solid #fff;
                                        box-shadow: 0px 0px 20px 5px #BABABA;
                                    }

                                    .tg {
                                        color: #24C48E;
                                    }

                                    .bt-stop {
                                        background-color: #BDBDBD;
                                        border: 1px solid #BDBDBD;
                                        /* max-width: 30%; */
                                        width: fit-content;
                                        height: 8vh;
                                        border-radius: 5px;
                                        /* font-weight: 600; */
                                        font-size: 20px;
                                    }

                                    .bt-stop:hover {
                                        color: white;
                                        border: 1px solid #fff;
                                        box-shadow: 0px 0px 20px 5px #BABABA;
                                    }
                                </style>
                                <div id="tab-one-panel" class="panel active">
                                    <div class="settings-user-content"></div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="width-border">
                                                <h4 class="m-3">ความชื้นในอากาศ</h4>
                                                <div class="row">
                                                    <div class="center">
                                                        <img src="../imgs/wind.png" width="20%" alt="icon">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <h3 class="mt-2">0.0 %</h3>
                                                    </div>
                                                </div>
                                                <p class="ml-4">อัพเดทล่าสุด : {{ date("d/m/Y H:i:s") }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="width-border">
                                                <h4 class="m-3">อุณหภูมิ</h4>
                                                <div class="row">
                                                    <div class="center">
                                                        <img src="../imgs/temperature.png" width="20%" alt="icon">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <h3 class="mt-2">0.0 ํC</h3>
                                                    </div>
                                                </div>
                                                <p class="ml-4">อัพเดทล่าสุด : {{ date("d/m/Y H:i:s") }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="width-border">
                                                <h4 class="m-3">ความชื้นในดิน</h4>
                                                <div class="row">
                                                    <div class="center">
                                                        <img src="../imgs/water-drop.png" width="20%" alt="icon">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <h3 class="mt-2">0.0 ํC</h3>
                                                    </div>
                                                </div>
                                                <p class="ml-4">อัพเดทล่าสุด : {{ date("d/m/Y H:i:s") }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="width-border">
                                                <h4 class="m-3">ความเข้มข้นแสง</h4>
                                                <div class="row">
                                                    <div class="center">
                                                        <img src="../imgs/sun.png" width="20%" alt="icon">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <h3 class="mt-2">0.0 μmol</h3>
                                                    </div>
                                                </div>
                                                <p class="ml-4">อัพเดทล่าสุด : {{ date("d/m/Y H:i:s") }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="width-border">
                                                <h4 class="m-3">EC</h4>
                                                <div class="row">
                                                    <div class="center">
                                                        <img src="../imgs/thunder.png" width="20%" alt="icon">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <h3 class="mt-2">0.0 μS/cm</h3>
                                                    </div>
                                                </div>
                                                <p class="ml-4">อัพเดทล่าสุด : {{ date("d/m/Y H:i:s") }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="width-border">
                                                <h4 class="m-3">TDS</h4>
                                                <div class="row">
                                                    <div class="center">
                                                        <img src="../imgs/glass-of-water.png" width="20%" alt="icon">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <h3 class="mt-2">0.0 μS/cm</h3>
                                                    </div>
                                                </div>
                                                <p class="ml-4">อัพเดทล่าสุด : {{ date("d/m/Y H:i:s") }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-two-panel" class="panel">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-10">
                                            <div class="width-border">
                                                <h4 class="m-3">Profile 1 : พ่นน้ำโซน 1</h4>
                                                <h5 class="ml-4">เวลา : (08 : 00 : 00 - 08 : 30 : 00) AM</h5>
                                                <h5 class="ml-4 tg">ทำซ้ำ : ทุกวัน</h5>
                                                <h5 class="ml-4 tg">ทำงานไม่เกิน : 10 นาที</h5>
                                                <h5 class="ml-4 tg">รอเวลาก่อนรอบถัดไป : 10 นาที</h5>
                                                <h5 class="m-4">ตรวจสอบ อุณหภูมิ มากกว่า 30 ํC</h5>
                                                <div class="drop-start" style="display: none;">
                                                    <div class="row">
                                                        <div class="center">
                                                            <span class="move-drop">
                                                                <img src="../imgs/drop.png" width="10%" alt="icon">
                                                            </span>
                                                            <style type="text/css">
                                                                .move-drop {
                                                                    position: relative;
                                                                    animation: drop 1.5s infinite;
                                                                    animation-timing-function: linear;
                                                                }

                                                                @keyframes drop {
                                                                    from {
                                                                        top: -1px;
                                                                    }

                                                                    to {
                                                                        top: 4px;
                                                                    }
                                                                }

                                                                .loading__ellipsis:after {
                                                                    animation-duration: 1.5s;
                                                                    animation-fill-mode: both;
                                                                    animation-iteration-count: infinite;
                                                                    animation-name: loading-ellipsis;
                                                                    animation-timing-function: linear;
                                                                    content: "....";
                                                                    display: inline-block;
                                                                }

                                                                @keyframes loading-ellipsis {
                                                                    0% {
                                                                        content: "";
                                                                    }

                                                                    20% {
                                                                        content: ".";
                                                                    }

                                                                    40% {
                                                                        content: "..";
                                                                    }

                                                                    60% {
                                                                        content: "...";
                                                                    }

                                                                    80%,
                                                                    100% {
                                                                        content: "....";
                                                                    }
                                                                }
                                                            </style>
                                                            <h3 class="mt-2">สถานะ : กำลังรดน้ำ<span class="loading__ellipsis"></span></h3>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="center">
                                                            <button type="submit" class="bt-stop mb-5">หยุดการทำงาน</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="drop-stop">
                                                    <div class="row">
                                                        <div class="center">
                                                            <h3 class="mt-2">สถานะ : ไม่ทำงาน</h3>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="center">
                                                            <button type="submit" class="bt-start mb-5">เริ่มการทำงาน</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function() {
                                                        $('.bt-start').click(function() {
                                                            $('#drop-stop').fadeOut(function() {
                                                                $('.drop-start').fadeIn();
                                                            });
                                                        });
                                                        $('.bt-stop').click(function() {
                                                            $('.drop-start').fadeOut(function() {
                                                                $('#drop-stop').fadeIn();
                                                            });
                                                        });
                                                    });
                                                </script>
                                                <p class="ml-4">อัพเดทล่าสุด : 2021-11-06 08:00:00</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                    <div class="row">
                                        <div class="bt-g-br">
                                            <div class="col-sm-6">
                                                &nbsp;
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="bt-last">
                                                    <style>
                                                        .bt-create {
                                                            background-color: #24C48E;
                                                            border: 1px solid #24C48E;
                                                            font-size: 18px;
                                                        }

                                                        .bt-edit {
                                                            color: white;
                                                            background-color: #BDBDBD;
                                                            border: 1px solid #BDBDBD;
                                                            font-size: 18px;
                                                        }

                                                        .bt-delete {
                                                            color: white;
                                                            background-color: #666666;
                                                            border: 1px solid #666666;
                                                            font-size: 18px;
                                                        }

                                                        .bt-create,
                                                        .bt-edit,
                                                        .bt-delete {
                                                            max-width: fit-content;
                                                            width: fit-content;
                                                            height: fit-content;
                                                            border-radius: 5px;
                                                        }

                                                        .bt-create:hover,
                                                        .bt-edit:hover,
                                                        .bt-delete:hover {
                                                            box-shadow: 0px 0px 20px 5px #e8e8e8;
                                                        }

                                                        .bt-create:hover {
                                                            border: 1px solid #24C48E;
                                                            color: #24C48E;
                                                            background-color: white;
                                                        }

                                                        .bt-edit:hover {
                                                            border: 1px solid #BDBDBD;
                                                            color: #BDBDBD;
                                                            background-color: white;
                                                        }

                                                        .bt-delete:hover {
                                                            border: 1px solid #666666;
                                                            color: #666666;
                                                            background-color: white;
                                                        }

                                                        .bt-g-br {
                                                            position: fixed;
                                                            right: 10px;
                                                            bottom: 20px;
                                                        }

                                                        .bt-last {
                                                            display: flex;
                                                            justify-content: flex-end;
                                                        }
                                                    </style>
                                                    <button type="submit" class="bt-create ml-2 btn-sm">สร้าง</button>
                                                    <button type="submit" class="bt-edit ml-2 btn-sm">แก้ไข</button>
                                                    <button type="submit" class="bt-delete ml-2 btn-sm">ลบ</button>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('.bt-create').click(function() {
                                                                $('.ant-modal-root-2').show();
                                                            });
                                                            $('#cancelFormCreateAuto').click(function() {
                                                                $('.ant-modal-root-2').hide();
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-three-panel" class="panel">
                                    <style>

                                    </style>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="width-border">
                                                <h4 class="m-3" style="vertical-align: middle;"><img src="../imgs/power-off.png" class="mr-1" width="10%" alt="icon">โซน 1</h4>
                                                <div class="row">
                                                    <center>
                                                        <label class="switch">
                                                            <input type="checkbox" name="checkbox"><span class="slider round"></span>
                                                        </label>
                                                    </center>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <p class="mt-3">สถานะ : ปิด</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="width-border">
                                                <h4 class="m-3" style="vertical-align: middle;"><img src="../imgs/power-off.png" class="mr-1" width="10%" alt="icon">โซน 2</h4>
                                                <div class="row">
                                                    <center>
                                                        <label class="switch">
                                                            <input type="checkbox" name="checkbox"><span class="slider round"></span>
                                                        </label>
                                                    </center>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <p class="mt-3">สถานะ : ปิด</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="width-border">
                                                <h4 class="m-3" style="vertical-align: middle;"><img src="../imgs/power-off.png" class="mr-1" width="10%" alt="icon">โซน 3</h4>
                                                <div class="row">
                                                    <center>
                                                        <label class="switch">
                                                            <input type="checkbox" name="checkbox"><span class="slider round"></span>
                                                        </label>
                                                    </center>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <p class="mt-3">สถานะ : ปิด</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="width-border">
                                                <h4 class="m-3" style="vertical-align: middle;"><img src="../imgs/power-off.png" class="mr-1" width="10%" alt="icon">โซน 4</h4>
                                                <div class="row">
                                                    <center>
                                                        <label class="switch">
                                                            <input type="checkbox" name="checkbox"><span class="slider round"></span>
                                                        </label>
                                                    </center>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <p class="mt-3">สถานะ : ปิด</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="width-border">
                                                <h4 class="m-3" style="vertical-align: middle;"><img src="../imgs/power-off.png" class="mr-1" width="10%" alt="icon">โซน 5</h4>
                                                <div class="row">
                                                    <center>
                                                        <label class="switch">
                                                            <input type="checkbox" name="checkbox"><span class="slider round"></span>
                                                        </label>
                                                    </center>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <p class="mt-3">สถานะ : ปิด</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="width-border">
                                                <h4 class="m-3" style="vertical-align: middle;"><img src="../imgs/power-off.png" class="mr-1" width="10%" alt="icon">โซน 6</h4>
                                                <div class="row">
                                                    <center>
                                                        <label class="switch">
                                                            <input type="checkbox" name="checkbox"><span class="slider round"></span>
                                                        </label>
                                                    </center>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <p class="mt-3">สถานะ : ปิด</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="width-border">
                                                <h4 class="m-3" style="vertical-align: middle;"><img src="../imgs/power-off.png" class="mr-1" width="10%" alt="icon">โซน 7</h4>
                                                <div class="row">
                                                    <center>
                                                        <label class="switch">
                                                            <input type="checkbox" name="checkbox"><span class="slider round"></span>
                                                        </label>
                                                    </center>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <p class="mt-3">สถานะ : ปิด</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="width-border">
                                                <h4 class="m-3" style="vertical-align: middle;"><img src="../imgs/power-off.png" class="mr-1" width="10%" alt="icon">โซน 8</h4>
                                                <div class="row">
                                                    <center>
                                                        <label class="switch">
                                                            <input type="checkbox" name="checkbox"><span class="slider round"></span>
                                                        </label>
                                                    </center>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <p class="mt-3">สถานะ : ปิด</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-four-panel" class="panel">
                                    <style>

                                    </style>
                                    <script>

                                    </script>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="width-border">
                                                <h4 class="m-3" style="vertical-align: middle;"><img src="../imgs/clock.png" class="mr-1" width="5%" alt="icon">โซน 1</h4>
                                                <div class="row mb-3">
                                                    <center>
                                                        <div>
                                                            <span class="count-digit">0</span>
                                                            <span class="count-digit">0</span>
                                                            <span class="separator">:</span>
                                                            <span class="count-digit">0</span>
                                                            <span class="count-digit">0</span>
                                                            <span class="separator">:</span>
                                                            <span class="count-digit">0</span>
                                                            <span class="count-digit">0</span>
                                                        </div>
                                                        <!-- <select id="patientSelect">
                                                            <option id="timer">Heart Attack, 65, ETA: 30 secs</option>
                                                        </select> -->
                                                        <!-- <script>
                                                            $(document).ready(function() {
                                                                var count = 30;
                                                                var counter = setInterval(timer, 1000);

                                                                function timer() {
                                                                    count--;
                                                                    if (count <= 0) {
                                                                        clearInterval(counter);
                                                                        return;
                                                                    }
                                                                    document.getElementById("timer").innerHTML = "Heart Attack, 65, ETA: " + (count.toString()) + " secs";
                                                                }
                                                            });
                                                        </script> -->
                                                    </center>
                                                </div>
                                                <div class="ant-row">
                                                    <div class="ant-col ant-col-12">
                                                        <div class="ant-select ant-select-single ant-select-show-arrow ant-select-show-search" style="display: flex; margin-left: 50%">
                                                            <select class="ant-select-selector mr-2" name="" id="">
                                                                <option value="">
                                                                    <span class="">0 ชั่วโมง</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">1 ชั่วโมง</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">2 ชั่วโมง</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">3 ชั่วโมง</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">4 ชั่วโมง</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">5 ชั่วโมง</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">6 ชั่วโมง</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">7 ชั่วโมง</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">8 ชั่วโมง</span>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="ant-col ant-col-12">
                                                        <div class="ant-select ant-select-single ant-select-show-arrow ant-select-show-search" style="display: flex; margin-right: 50%">
                                                            <select class="ant-select-selector ml-2" name="" id="">
                                                                <option value="">
                                                                    <span class="">0 นาที</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">5 นาที</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">10 นาที</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">15 นาที</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">20 นาที</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">25 นาที</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">30 นาที</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">35 นาที</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">40 นาที</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">45 นาที</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">50 นาที</span>
                                                                </option>
                                                                <option value="">
                                                                    <span class="">55 นาที</span>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ant-row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-3">
                                                                <button type="button" class="ant-btn ant-btn-primary"><span>เริ่ม</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="button" class="ant-btn ant-btn-secondary"><span>หยุด</span></button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="center">
                                                        <p class="mt-3">สถานะ : ปิด</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <section id="dunkles" class="tab-panel">
                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Email Statistics</h4>
                                                <p class="card-category">Last Campaign Performance</p>
                                            </div>
                                            <div class="card-body ">
                                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-pie" style="width: 100%; height: 100%;">
                                                        <g class="ct-series ct-series-c">
                                                            <path d="M145.5,5A117.5,117.5,0,0,0,70.287,32.227L145.5,122.5Z" class="ct-slice-pie" ct:value="11"></path>
                                                        </g>
                                                        <g class="ct-series ct-series-b">
                                                            <path d="M70.603,31.965A117.5,117.5,0,0,0,123.886,237.995L145.5,122.5Z" class="ct-slice-pie" ct:value="36"></path>
                                                        </g>
                                                        <g class="ct-series ct-series-a">
                                                            <path d="M123.483,237.919A117.5,117.5,0,1,0,145.5,5L145.5,122.5Z" class="ct-slice-pie" ct:value="53"></path>
                                                        </g>
                                                        <g><text dx="203.98926542043094" dy="128.02886340746272" text-anchor="middle" class="ct-label">53%</text><text dx="88.59573928369292" dy="137.11053087093524" text-anchor="middle" class="ct-label">36%</text><text dx="125.59914718558909" dy="67.22325482393927" text-anchor="middle" class="ct-label">11%</text></g>
                                                    </svg></div>
                                                <div class="legend">
                                                    <i class="fa fa-circle text-info"></i> Open
                                                    <i class="fa fa-circle text-danger"></i> Bounce
                                                    <i class="fa fa-circle text-warning"></i> Unsubscribe
                                                </div>
                                                <hr>
                                                <div class="stats">
                                                    <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Users Behavior</h4>
                                                <p class="card-category">24 Hours performance</p>
                                            </div>
                                            <div class="card-body ">
                                                <div id="chartHours" class="ct-chart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="245px" class="ct-chart-line" style="width: 100%; height: 245px;">
                                                        <g class="ct-grids">
                                                            <line y1="210" y2="210" x1="50" x2="629" class="ct-grid ct-vertical"></line>
                                                            <line y1="185.625" y2="185.625" x1="50" x2="629" class="ct-grid ct-vertical"></line>
                                                            <line y1="161.25" y2="161.25" x1="50" x2="629" class="ct-grid ct-vertical"></line>
                                                            <line y1="136.875" y2="136.875" x1="50" x2="629" class="ct-grid ct-vertical"></line>
                                                            <line y1="112.5" y2="112.5" x1="50" x2="629" class="ct-grid ct-vertical"></line>
                                                            <line y1="88.125" y2="88.125" x1="50" x2="629" class="ct-grid ct-vertical"></line>
                                                            <line y1="63.75" y2="63.75" x1="50" x2="629" class="ct-grid ct-vertical"></line>
                                                            <line y1="39.375" y2="39.375" x1="50" x2="629" class="ct-grid ct-vertical"></line>
                                                            <line y1="15" y2="15" x1="50" x2="629" class="ct-grid ct-vertical"></line>
                                                        </g>
                                                        <g>
                                                            <g class="ct-series ct-series-a">
                                                                <path d="M50,210L50,140.044C74.125,140.044,98.25,116.156,122.375,116.156C146.5,116.156,170.625,90.563,194.75,90.563C218.875,90.563,243,90.075,267.125,90.075C291.25,90.075,315.375,74.963,339.5,74.963C363.625,74.963,387.75,67.163,411.875,67.163C436,67.163,460.125,39.863,484.25,39.863C508.375,39.863,532.5,40.594,556.625,40.594C580.75,40.594,604.875,26.7,629,26.7C653.125,26.7,677.25,17.925,701.375,17.925C725.5,17.925,749.625,3.787,773.75,3.787C797.875,3.787,822,-20.1,846.125,-20.1L846.125,210Z" class="ct-area" ct:values="[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object]"></path>
                                                            </g>
                                                            <g class="ct-series ct-series-b">
                                                                <path d="M50,210L50,193.669C74.125,193.669,98.25,172.95,122.375,172.95C146.5,172.95,170.625,175.144,194.75,175.144C218.875,175.144,243,151.5,267.125,151.5C291.25,151.5,315.375,140.044,339.5,140.044C363.625,140.044,387.75,128.344,411.875,128.344C436,128.344,460.125,103.969,484.25,103.969C508.375,103.969,532.5,103.481,556.625,103.481C580.75,103.481,604.875,78.619,629,78.619C653.125,78.619,677.25,77.887,701.375,77.887C725.5,77.887,749.625,77.4,773.75,77.4C797.875,77.4,822,52.294,846.125,52.294L846.125,210Z" class="ct-area" ct:values="[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object]"></path>
                                                            </g>
                                                            <g class="ct-series ct-series-c">
                                                                <path d="M50,210L50,204.394C74.125,204.394,98.25,182.456,122.375,182.456C146.5,182.456,170.625,193.669,194.75,193.669C218.875,193.669,243,183.675,267.125,183.675C291.25,183.675,315.375,163.688,339.5,163.688C363.625,163.688,387.75,151.744,411.875,151.744C436,151.744,460.125,135.169,484.25,135.169C508.375,135.169,532.5,134.925,556.625,134.925C580.75,134.925,604.875,102.994,629,102.994C653.125,102.994,677.25,110.063,701.375,110.063C725.5,110.063,749.625,110.063,773.75,110.063C797.875,110.063,822,85.931,846.125,85.931L846.125,210Z" class="ct-area" ct:values="[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object]"></path>
                                                            </g>
                                                        </g>
                                                        <g class="ct-labels">
                                                            <foreignObject style="overflow: visible;" x="50" y="215" width="72.375" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 72px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">9:00AM</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="122.375" y="215" width="72.375" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 72px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">12:00AM</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="194.75" y="215" width="72.375" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 72px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">3:00PM</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="267.125" y="215" width="72.375" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 72px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">6:00PM</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="339.5" y="215" width="72.375" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 72px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">9:00PM</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="411.875" y="215" width="72.375" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 72px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">12:00PM</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="484.25" y="215" width="72.375" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 72px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">3:00AM</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="556.625" y="215" width="72.375" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 72px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">6:00AM</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="185.625" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">0</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="161.25" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">100</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="136.875" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">200</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="112.5" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">300</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="88.125" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">400</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="63.75" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">500</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="39.375" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">600</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="15" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">700</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" style="height: 30px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">800</span></foreignObject>
                                                        </g>
                                                    </svg></div>
                                            </div>
                                            <div class="card-footer ">
                                                <div class="legend">
                                                    <i class="fa fa-circle text-info"></i> Open
                                                    <i class="fa fa-circle text-danger"></i> Click
                                                    <i class="fa fa-circle text-warning"></i> Click Second Time
                                                </div>
                                                <hr>
                                                <div class="stats">
                                                    <i class="fa fa-history"></i> Updated 3 minutes ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card ">
                                            <div class="card-header ">
                                                <h4 class="card-title">2017 Sales</h4>
                                                <p class="card-category">All products including Taxes</p>
                                            </div>
                                            <div class="card-body ">
                                                <div id="chartActivity" class="ct-chart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="245px" class="ct-chart-bar" style="width: 100%; height: 245px;">
                                                        <g class="ct-grids">
                                                            <line y1="210" y2="210" x1="50" x2="453" class="ct-grid ct-vertical"></line>
                                                            <line y1="188.33333333333334" y2="188.33333333333334" x1="50" x2="453" class="ct-grid ct-vertical"></line>
                                                            <line y1="166.66666666666666" y2="166.66666666666666" x1="50" x2="453" class="ct-grid ct-vertical"></line>
                                                            <line y1="145" y2="145" x1="50" x2="453" class="ct-grid ct-vertical"></line>
                                                            <line y1="123.33333333333333" y2="123.33333333333333" x1="50" x2="453" class="ct-grid ct-vertical"></line>
                                                            <line y1="101.66666666666667" y2="101.66666666666667" x1="50" x2="453" class="ct-grid ct-vertical"></line>
                                                            <line y1="80" y2="80" x1="50" x2="453" class="ct-grid ct-vertical"></line>
                                                            <line y1="58.33333333333334" y2="58.33333333333334" x1="50" x2="453" class="ct-grid ct-vertical"></line>
                                                            <line y1="36.66666666666666" y2="36.66666666666666" x1="50" x2="453" class="ct-grid ct-vertical"></line>
                                                            <line y1="15" y2="15" x1="50" x2="453" class="ct-grid ct-vertical"></line>
                                                        </g>
                                                        <g>
                                                            <g class="ct-series ct-series-a">
                                                                <line x1="61.79166666666667" x2="61.79166666666667" y1="210" y2="92.56666666666666" class="ct-bar" ct:value="542"></line>
                                                                <line x1="95.37500000000001" x2="95.37500000000001" y1="210" y2="114.01666666666667" class="ct-bar" ct:value="443"></line>
                                                                <line x1="128.95833333333334" x2="128.95833333333334" y1="210" y2="140.66666666666669" class="ct-bar" ct:value="320"></line>
                                                                <line x1="162.54166666666666" x2="162.54166666666666" y1="210" y2="41" class="ct-bar" ct:value="780"></line>
                                                                <line x1="196.125" x2="196.125" y1="210" y2="90.18333333333334" class="ct-bar" ct:value="553"></line>
                                                                <line x1="229.70833333333334" x2="229.70833333333334" y1="210" y2="111.85" class="ct-bar" ct:value="453"></line>
                                                                <line x1="263.2916666666667" x2="263.2916666666667" y1="210" y2="139.36666666666667" class="ct-bar" ct:value="326"></line>
                                                                <line x1="296.87500000000006" x2="296.87500000000006" y1="210" y2="115.96666666666667" class="ct-bar" ct:value="434"></line>
                                                                <line x1="330.45833333333337" x2="330.45833333333337" y1="210" y2="86.93333333333334" class="ct-bar" ct:value="568"></line>
                                                                <line x1="364.0416666666667" x2="364.0416666666667" y1="210" y2="77.83333333333334" class="ct-bar" ct:value="610"></line>
                                                                <line x1="397.62500000000006" x2="397.62500000000006" y1="210" y2="46.19999999999999" class="ct-bar" ct:value="756"></line>
                                                                <line x1="431.20833333333337" x2="431.20833333333337" y1="210" y2="16.083333333333343" class="ct-bar" ct:value="895"></line>
                                                            </g>
                                                            <g class="ct-series ct-series-b">
                                                                <line x1="71.79166666666667" x2="71.79166666666667" y1="210" y2="120.73333333333333" class="ct-bar" ct:value="412"></line>
                                                                <line x1="105.37500000000001" x2="105.37500000000001" y1="210" y2="157.35" class="ct-bar" ct:value="243"></line>
                                                                <line x1="138.95833333333334" x2="138.95833333333334" y1="210" y2="149.33333333333334" class="ct-bar" ct:value="280"></line>
                                                                <line x1="172.54166666666666" x2="172.54166666666666" y1="210" y2="84.33333333333333" class="ct-bar" ct:value="580"></line>
                                                                <line x1="206.125" x2="206.125" y1="210" y2="111.85" class="ct-bar" ct:value="453"></line>
                                                                <line x1="239.70833333333334" x2="239.70833333333334" y1="210" y2="133.51666666666665" class="ct-bar" ct:value="353"></line>
                                                                <line x1="273.2916666666667" x2="273.2916666666667" y1="210" y2="145" class="ct-bar" ct:value="300"></line>
                                                                <line x1="306.87500000000006" x2="306.87500000000006" y1="210" y2="131.13333333333333" class="ct-bar" ct:value="364"></line>
                                                                <line x1="340.45833333333337" x2="340.45833333333337" y1="210" y2="130.26666666666665" class="ct-bar" ct:value="368"></line>
                                                                <line x1="374.0416666666667" x2="374.0416666666667" y1="210" y2="121.16666666666667" class="ct-bar" ct:value="410"></line>
                                                                <line x1="407.62500000000006" x2="407.62500000000006" y1="210" y2="72.19999999999999" class="ct-bar" ct:value="636"></line>
                                                                <line x1="441.20833333333337" x2="441.20833333333337" y1="210" y2="59.41666666666666" class="ct-bar" ct:value="695"></line>
                                                            </g>
                                                        </g>
                                                        <g class="ct-labels">
                                                            <foreignObject style="overflow: visible;" x="50" y="215" width="33.583333333333336" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jan</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="83.58333333333334" y="215" width="33.583333333333336" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Feb</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="117.16666666666667" y="215" width="33.58333333333333" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Mar</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="150.75" y="215" width="33.58333333333334" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Apr</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="184.33333333333334" y="215" width="33.58333333333334" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Mai</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="217.91666666666669" y="215" width="33.583333333333314" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jun</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="251.5" y="215" width="33.58333333333334" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jul</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="285.08333333333337" y="215" width="33.58333333333334" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Aug</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="318.6666666666667" y="215" width="33.583333333333314" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Sep</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="352.25" y="215" width="33.58333333333337" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Oct</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="385.83333333333337" y="215" width="33.583333333333314" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Nov</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" x="419.4166666666667" y="215" width="33.583333333333314" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Dec</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="188.33333333333334" x="10" height="21.666666666666668" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">0</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="166.66666666666669" x="10" height="21.666666666666668" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">100</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="145" x="10" height="21.666666666666664" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">200</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="123.33333333333333" x="10" height="21.66666666666667" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">300</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="101.66666666666667" x="10" height="21.666666666666657" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">400</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="80" x="10" height="21.66666666666667" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">500</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="58.33333333333334" x="10" height="21.666666666666657" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">600</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="36.66666666666666" x="10" height="21.666666666666686" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">700</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="15" x="10" height="21.666666666666657" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">800</span></foreignObject>
                                                            <foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" style="height: 30px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">900</span></foreignObject>
                                                        </g>
                                                    </svg></div>
                                            </div>
                                            <div class="card-footer ">
                                                <div class="legend">
                                                    <i class="fa fa-circle text-info"></i> Tesla Model S
                                                    <i class="fa fa-circle text-danger"></i> BMW 5 Series
                                                </div>
                                                <hr>
                                                <div class="stats">
                                                    <i class="fa fa-check"></i> Data information certified
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card  card-tasks">
                                            <div class="card-header ">
                                                <h4 class="card-title">Tasks</h4>
                                                <p class="card-category">Backend development</p>
                                            </div>
                                            <div class="card-body ">
                                                <div class="table-full-width">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="checkbox" value="">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                                <td class="td-actions text-right">
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-info btn-simple btn-link" data-original-title="Edit Task">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-link" data-original-title="Remove">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="checkbox" value="" checked="">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                                <td class="td-actions text-right">
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-info btn-simple btn-link" data-original-title="Edit Task">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-link" data-original-title="Remove">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="checkbox" value="" checked="">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                                                </td>
                                                                <td class="td-actions text-right">
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-info btn-simple btn-link" data-original-title="Edit Task">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-link" data-original-title="Remove">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="checkbox" checked="">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                                                <td class="td-actions text-right">
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-info btn-simple btn-link" data-original-title="Edit Task">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-link" data-original-title="Remove">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="checkbox" value="">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>Read "Following makes Medium better"</td>
                                                                <td class="td-actions text-right">
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-info btn-simple btn-link" data-original-title="Edit Task">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-link" data-original-title="Remove">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="checkbox" value="" disabled="">
                                                                            <span class="form-check-sign"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>Unfollow 5 enemies from twitter</td>
                                                                <td class="td-actions text-right">
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-info btn-simple btn-link" data-original-title="Edit Task">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-link" data-original-title="Remove">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card-footer ">
                                                <hr>
                                                <div class="stats">
                                                    <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="savenote" class="tab-panel">
                        <style>
                            .rounder-border {
                                border-right: 1px solid #e8e8e8;
                                padding: 1.5rem;
                                overflow: auto;
                            }
                        </style>
                        <div class="w3-container">
                            <style>
                                #customers {
                                    font-family: Arial, Helvetica, sans-serif;
                                    border-collapse: collapse;
                                    width: 100%;
                                }

                                #customers td,
                                #customers th {
                                    border: 1px solid #ddd;
                                    padding: 8px;
                                }

                                #customers tr:nth-child(even) {
                                    background-color: #f2f2f2;
                                }

                                #customers tr:hover {
                                    background-color: #ddd;
                                }

                                #customers th {
                                    padding-top: 12px;
                                    padding-bottom: 12px;
                                    text-align: left;
                                    background-color: #04AA6D;
                                    color: white;
                                }

                                #name-savenote {
                                    font-weight: bolder;
                                    font-size: medium;
                                    padding-top: 12px;
                                    padding-bottom: 12px;
                                }

                                .box-border-shadow {
                                    padding: 10px;
                                    border: 1px solid #e8e8e8;
                                    box-shadow: 0px 0px 20px 5px #e8e8e8;
                                    border-radius: 5px;
                                }
                            </style>

                            <div class="box-border-shadow mb-3">
                                <button onclick="myFunction('Demo1')" id="name-savenote" class="w3-button w3-block w3-green w3-left-align">ปัจจัยการผลิตสำหรับฟาร์มเกษตรอินทรีย์ ( ชนิด / แหล่งที่มา )</button>
                                <div id="Demo1" class="">
                                    <table id="customers">
                                        <tr>
                                            <th>#</th>
                                            <th>ชื่อบริษัท / ฟาร์ม</th>
                                            <th>วันที่ซื้อ / ได้มา</th>
                                            <th>ชนิดปุ๋ยอินทรีย์ / สารสมุนไพร / เมล็ดพันธุ์</th>
                                            <th>ปริมาณ ( กก. / ลิตร )</th>
                                            <th>แหล่งที่มา</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="box-border-shadow mb-3">
                                <button onclick="myFunction('Demo2')" id="name-savenote" class="w3-button w3-block w3-green w3-left-align">การใช้ปัจจัยการผลิตสำหรับฟาร์มเกษตรอินทรีย์</button>
                                <div id="Demo2" class="">
                                    <table id="customers">
                                        <tr>
                                            <th>#</th>
                                            <th>ชื่อบริษัท / ฟาร์ม</th>
                                            <th>ชนิดปุ๋ยอินทรีย์ / สารสมุนไพร / เมล็ดพันธุ์</th>
                                            <th>แปลงที่</th>
                                            <th>ปริมาณ ( กก. / ลิตร )</th>
                                            <th>วันที่ใช้</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="box-border-shadow mb-3">
                                <button onclick="myFunction('Demo3')" id="name-savenote" class="w3-button w3-block w3-green w3-left-align">การเก็บเกี่ยวผลผลิตเกษตรอินทรีย์</button>
                                <div id="Demo3" class="">
                                    <table id="customers">
                                        <tr>
                                            <th>#</th>
                                            <th>ชื่อบริษัท / ฟาร์ม</th>
                                            <th>วันที่เก็บเกี่ยว</th>
                                            <th>ผลผลิต</th>
                                            <th>เก็บจากแปลงที่</th>
                                            <th>ปริมาณผลผลิตรวม (กก.)</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                            <td>test</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <script>
                            function myFunction(id) {
                                var x = document.getElementById(id);
                                if (x.className.indexOf("w3-show") == -1) {
                                    x.className += " w3-show";
                                } else {
                                    x.className = x.className.replace(" w3-show", "");
                                }
                            }
                        </script>
                        <!-- <div class="row"> -->
                        <div class="bt-g-br">
                            <div class="col-sm-6">
                                &nbsp;
                            </div>
                            <div class="col-sm-6">
                                <div class="bt-last">
                                    <style>
                                        .bt-create-farm-record {
                                            background-color: #24C48E;
                                            border: 1px solid #24C48E;
                                            font-size: 18px;
                                        }

                                        .bt-edit-farm-record {
                                            color: white;
                                            background-color: #BDBDBD;
                                            border: 1px solid #BDBDBD;
                                            font-size: 18px;
                                        }

                                        .bt-delete-farm-record {
                                            color: white;
                                            background-color: #666666;
                                            border: 1px solid #666666;
                                            font-size: 18px;
                                        }

                                        .bt-create-farm-record,
                                        .bt-edit-farm-record,
                                        .bt-delete-farm-record {
                                            max-width: fit-content;
                                            width: fit-content;
                                            height: fit-content;
                                            border-radius: 5px;
                                        }

                                        .bt-create-farm-record:hover,
                                        .bt-edit-farm-record:hover,
                                        .bt-delete-farm-record:hover {
                                            box-shadow: 0px 0px 20px 5px #e8e8e8;
                                        }

                                        .bt-create-farm-record:hover {
                                            border: 1px solid #24C48E;
                                            color: #24C48E;
                                            background-color: white;
                                        }

                                        .bt-edit-farm-record:hover {
                                            border: 1px solid #BDBDBD;
                                            color: #BDBDBD;
                                            background-color: white;
                                        }

                                        .bt-delete-farm-record:hover {
                                            border: 1px solid #666666;
                                            color: #666666;
                                            background-color: white;
                                        }
                                    </style>
                                    <button type="submit" class="bt-create-farm-record ml-2 btn-sm">สร้าง</button>
                                    <button type="submit" class="bt-edit-farm-record ml-2 btn-sm">แก้ไข</button>
                                    <button type="submit" class="bt-delete-farm-record ml-2 btn-sm">ลบ</button>
                                    <script>
                                        $(document).ready(function() {
                                            $('.bt-create-farm-record').click(function() {
                                                $('.ant-modal-root-3').show();
                                            });
                                            $('#cancelFormCreateFarmRecord').click(function() {
                                                $('.ant-modal-root-3').hide();
                                                $('.ant-modal-root-3-1').hide();
                                            });
                                            $('#FarmInputRecordTypeAndSource').click(function() {
                                                $('.ant-modal-root-3-1').show();
                                            });
                                            $('#cancelListRecord').click(function() {
                                                $('.ant-modal-root-3').hide();
                                            });
                                            $('#RecordOfFarmInputTheUtilization').click(function() {
                                                $('.ant-modal-root-3-2').show();
                                                $('#cancelRecordOfFarmInputTheUtilization').click(function() {
                                                    $('.ant-modal-root-3-2').hide();
                                                    $('.ant-modal-root-3').hide();
                                                });
                                            });
                                            $('#OrganicProduceHarvestRecord').click(function() {
                                                $('.ant-modal-root-3-3').show();
                                                $('#cancelOrganicProduceHarvestRecord').click(function() {
                                                    $('.ant-modal-root-3-3').hide();
                                                    $('.ant-modal-root-3').hide();
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>


            @endsection