@extends('layouts.setting.index')

@section('content')

<div class="user-layout-right-content user-layout-right-content-fold">
    <div class="organization-settings-contaiter">
        <section class="ant-layout ant-layout-has-sider">
            <aside class="ant-layout-sider ant-layout-sider-dark page-layout-navigation" style="flex: 0 0 280px; max-width: 280px; min-width: 280px; width: 280px;">
                <div class="ant-layout-sider-children">
                    <div class="search-filter-list">
                        <div class="page-layout-navigation-header"><span class="linearicon linearicon-building8 undefined"></span>My organization - 9894WM</div>
                        <div class="search-filter-category"><span class="linearicon linearicon-apartment search-filter-category-icon"></span>
                            <div>Organization Settings</div>
                        </div>
                        <div class="search-filter-category-item search-filter-category-item-selected">
                            <div>General</div>
                        </div>
                        <div class="search-filter-category-item">
                            <div>Users</div>
                        </div>
                        <div class="search-filter-category-item">
                            <div>Locations</div>
                        </div>
                        <div class="search-filter-category-item">
                            <div>Billing</div>
                        </div>
                        <div class="search-filter-category-item search-filter-category-item--last">
                            <div>Tags</div>
                        </div>
                        <div class="search-filter-category"><span class="linearicon linearicon-user-lock search-filter-category-icon"></span>
                            <div>Access</div>
                        </div>
                        <div class="search-filter-category-item search-filter-category-item--last">
                            <div>Roles and permissions</div>
                        </div>
                        <div class="search-filter-category"><span class="linearicon linearicon-gear search-filter-category-icon"></span>
                            <div>Developers</div>
                        </div>
                        <div class="search-filter-category-item search-filter-category-item--last">
                            <div>Webhooks</div>
                        </div>
                    </div>
                </div>
            </aside>
            <section class="ant-layout page-layout-content">
                <div class="settings-title">Organization Settings</div>
                <div class="settings-line"></div>
                <div class="settings-content-container">
                    <div class="org-settings max-width-content">
                        <div class="ant-row" style="margin-left: -12px; margin-right: -12px; row-gap: 0px;">
                            <div class="ant-col ant-col-14" style="padding-left: 12px; padding-right: 12px; min-width: 330px; padding-bottom: 64px;">
                                <form class="ant-form ant-form-horizontal">
                                    <div class="ant-row" style="margin-left: -4px; margin-right: -4px; row-gap: 0px;">
                                        <div class="ant-col ant-col-24" style="padding-left: 4px; padding-right: 4px;">
                                            <div class="ant-row ant-form-item ant-form-item-with-help own-custom-form-field normal-offset normal-offset org-settings-name ant-form-item-has-success" style="row-gap: 0px;">
                                                <div class="ant-col ant-form-item-label"><label for="name" class="" title="Organization Name">Organization Name</label></div>
                                                <div class="ant-col ant-form-item-control">
                                                    <div class="ant-form-item-control-input">
                                                        <div class="ant-form-item-control-input-content"><input placeholder="Name" maxlength="80" name="name" type="text" id="name" class="ant-input" value="My organization - 9894WM"></div>
                                                    </div>
                                                    <div class="ant-form-item-explain ant-form-item-explain-success">
                                                        <div role="alert">Use letters, digits, space or '.', '-', ''' characters</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-row ant-form-item medium-offset" style="row-gap: 0px;">
                                        <div class="ant-col ant-form-item-label"><label for="description" class="" title="Description (optional)">Description (optional)</label></div>
                                        <div class="ant-col ant-form-item-control">
                                            <div class="ant-form-item-control-input">
                                                <div class="ant-form-item-control-input-content">
                                                    <div class="ant-input-textarea ant-input-textarea-show-count" data-count="0 / 500"><textarea rows="4" type="text" placeholder="Add some description" id="description" class="ant-input"></textarea></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-row ant-form-item own-custom-form-field normal-offset normal-offset ant-form-item-has-success" style="row-gap: 0px;">
                                        <div class="ant-col ant-form-item-label"><label for="phoneNumber" class="" title="Phone Number">Phone Number</label></div>
                                        <div class="ant-col ant-form-item-control">
                                            <div class="ant-form-item-control-input">
                                                <div class="ant-form-item-control-input-content">
                                                    <div class=" react-tel-input">
                                                        <div class="special-label">Phone</div><input class="ant-input form-control" placeholder="+1(222)333-44-55" type="tel" value="">
                                                        <div class=" flag-dropdown">
                                                            <div class="selected-flag" title="" tabindex="0" role="button" aria-haspopup="listbox">
                                                                <div class="flag 0">
                                                                    <div class="arrow"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ant-row ant-form-item medium-offset" style="row-gap: 0px;">
                                        <div class="ant-col ant-form-item-label"><label for="tz" class="" title="Timezone">Timezone</label></div>
                                        <div class="ant-col ant-form-item-control">
                                            <div class="ant-form-item-control-input">
                                                <div class="ant-form-item-control-input-content">
                                                    <div class="ant-select org-settings--organization-settings-timezones-select ant-select-single ant-select-show-arrow ant-select-show-search">
                                                        <div class="ant-select-selector"><span class="ant-select-selection-search"><input id="tz" autocomplete="off" type="search" class="ant-select-selection-search-input" role="combobox" aria-haspopup="listbox" aria-owns="tz_list" aria-autocomplete="list" aria-controls="tz_list" aria-activedescendant="tz_list_0" value=""></span><span class="ant-select-selection-item" title="(GMT+07:00) Bangkok">(GMT+07:00) Bangkok</span></div><span class="ant-select-arrow" unselectable="on" aria-hidden="true" style="user-select: none;"><span role="img" aria-label="down" class="anticon anticon-down ant-select-suffix"><svg viewBox="64 64 896 896" focusable="false" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                                                    <path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>
                                                                </svg></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="ant-col ant-col-10" style="padding-left: 12px; padding-right: 12px;">
                                <div class="user-profile--section--item">
                                    <div class="user-profile--section--item-title">Logo</div>
                                    <div class="user-profile--section--item-content org-settings--logo-uploader">
                                        <div class="image-uploader"><span>
                                                <div class="ant-upload ant-upload-drag"><span tabindex="0" class="ant-upload ant-upload-btn" role="button"><input type="file" accept=".png, .jpg, .jpeg" style="display: none;">
                                                        <div class="ant-upload-drag-container">
                                                            <div>
                                                                <p class="ant-upload-drag-icon"><span class="linearicon linearicon-cloud-upload image-uploader-file-icon"></span></p>
                                                                <p class="ant-upload-text"><span>Upload Logo (optional)</span> </p>
                                                                <p class="ant-upload-hint">
                                                                <div>Upload from computer or drag-n-drop<div>.png, .jpg or .jpeg, minimum width 500px</div>
                                                                </div>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </span></div>
                                            </span></div>
                                        <div class="org-settings--logo-uploader-message">Please clear the cache after the upload to see the change right&nbsp;away</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="settings-button-container"><button type="button" class="ant-btn"><span>Cancel</span></button><button disabled="" type="button" class="ant-btn ant-btn-primary"><span>Save</span></button></div>
                    </div>
                </div>
            </section>
        </section>
    </div>
</div>

@endsection