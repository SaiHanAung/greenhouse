@extends('reports.layout')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold font-prompt">
    <div class="main-layout products-container">
        <div class="main-layout--header" style="border-bottom-color:#49cea1;">
            <div class="main-layout--header-name font-prompt">แปลง : {{$value_name_sub}}</div>
            <div class="main-layout--header-options">
                <nav>
                    <div class="nav nav-tabs" style="border-bottom-color: #49cea1;">
                        <button class="nav-link"><a href="{{ route('savenote.index', $datas) }}" class="clearfonts">จดบันทึก</a></button>
                        <label class="nav-link clearfont active" style="color: #49cea1;border-color: #49cea1;border-bottom-color:transparent;">รายงาน</label>
                        <button class="nav-link"><a href="{{ route('dashboard.index', $datas) }}" class="clearfonts">แผงควบคุม</a></button>
                        <button class="nav-link"><a href="{{ route('plots.show', $datas) }}" class="clearfonts">ข้อมูล</a></button>
                    </div>
                </nav>
            </div>
        </div>
        <div class="main-layout--content">
            <section style="margin-top: 1rem;">
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
        </div>
    </div>
</div>

@endsection