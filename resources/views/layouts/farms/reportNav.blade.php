<div class="user-layout-right-content user-layout-right-content-fold">
    <div class="main-layout ">
        <div class="main-layout--header">
            <div class="main-layout--header-name">ทดสอบ</div>
            <div class="main-layout--header-options">
                <!-- <div><button type="button" class="ant-btn ant-btn-default"><span>Clone</span></button><button type="button" class="ant-btn ant-btn-primary"><span>Edit</span></button></div> -->
            </div>
        </div>
        <div class="product-details-content main-layout--content">
            <div class="ant-tabs ant-tabs-top products-tabs">
                <div role="tablist" class="ant-tabs-nav">
                    <div class="ant-tabs-nav-wrap">
                        <div class="ant-tabs-nav-list" style="transform: translate(0px, 0px);">
                            <div class="ant-tabs-tab">
                                <div role="tab" aria-selected="false" class="ant-tabs-tab-btn" tabindex="0" id="rc-tabs-0-tab-info" aria-controls="rc-tabs-0-panel-info"><a href="{{ route('farmInfo') }}">ข้อมูล</a></div>
                            </div>
                            <div class="ant-tabs-tab">
                                <div role="tab" aria-selected="false" class="ant-tabs-tab-btn" tabindex="0" id="rc-tabs-0-tab-metadata" aria-controls="rc-tabs-0-panel-metadata"><a href="{{ route('farmDashboard') }}" style="color:black;">แผงควบคุม</a></div>
                            </div>
                            <div class="ant-tabs-tab ant-tabs-tab-active">
                                <div role="tab" aria-selected="true" class="ant-tabs-tab-btn" tabindex="0" id="rc-tabs-0-tab-datastreams" aria-controls="rc-tabs-0-panel-datastreams"><a href="{{ route('farmReport') }}">รายงาน</a></div>
                            </div>
                            <!-- <button onclick="document.location='{{ route('farmInfo') }}'">HTML Tutorial</button> -->
                            <div class="ant-tabs-ink-bar ant-tabs-ink-bar-animated" style="left: 0px; width: 31px;"></div>
                        </div>
                    </div>
                </div>
                