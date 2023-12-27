<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <!--begin::Head-->
  <head>
    <title>{{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="/assets/v8.1.5/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="/assets/v8.1.5/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <!--<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />-->
        <link href="/assets/v8.1.5/css/style.bundle.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/v8.1.5/common.css" rel="stylesheet" type="text/css"/>
    <style>

      .aside.aside-dark {
        /*background: linear-gradient(to left, #6d5892 0%,#664c90 47%,#563d7c 100%);*/
      }
      .aside.aside-dark .aside-logo {
        /*background-color: #0000000d;*/
        /*background: #3b3b3b;*/
      }     

      .aside-dark .menu .menu-item .menu-link.active {        
        background-color: rgb(0 0 0 / 5%);      
      }

      .aside-dark .menu .menu-item .menu-section {
        color: #d9d9d9!important;
      }

      .aside-dark .menu .menu-item .menu-link .menu-title {
        color: #b3a7c5;
      }

      .aside-dark .menu .menu-item .menu-link.active .menu-icon .svg-icon svg [fill]:not(.permanent):not(g) {
        fill: #FFFFFF;
      }

      .aside-dark .menu .menu-item.hover:not(.here)>.menu-link:not(.disabled):not(.active):not(.here) .menu-icon .svg-icon svg [fill]:not(.permanent):not(g), .aside-dark .menu .menu-item:not(.here) .menu-link:hover:not(.disabled):not(.active):not(.here) .menu-icon .svg-icon svg [fill]:not(.permanent):not(g) {
          fill: #FFFFFF;
      }

      .aside-dark .menu .menu-item .menu-link .menu-icon .svg-icon svg [fill]:not(.permanent):not(g) {
        fill: rgb(255 255 255 / 54%);
      }

      .aside-dark .menu .menu-item .menu-link:hover:not(.disabled):not(.active), 
      .aside-dark .menu .menu-item.hover>.menu-link:not(.disabled):not(.active) {
        background-color: #00000029;
      }

      .aside-dark .menu .menu-item .menu-link:hover:not(.disabled):not(.active) .menu-icon .svg-icon svg [fill]:not(.permanent):not(g), 
      .aside-dark .menu .menu-item.hover>.menu-link:not(.disabled):not(.active) .menu-icon .svg-icon svg [fill]:not(.permanent):not(g) {
        fill: #ffffff;
      }

      .aside.aside-dark .aside-toggle svg [fill]:not(.permanent):not(g) {
        fill: #ffffff5e;
      }

      .aside-dark .btn-check:active+.btn.btn-active-color-primary .svg-icon svg [fill]:not(.permanent):not(g), 
      .aside-dark .btn-check:checked+.btn.btn-active-color-primary .svg-icon svg [fill]:not(.permanent):not(g), 
      .aside-dark .btn.btn-active-color-primary.active .svg-icon svg [fill]:not(.permanent):not(g), 
      .aside-dark .btn.btn-active-color-primary.show .svg-icon svg [fill]:not(.permanent):not(g), 
      .aside-dark .btn.btn-active-color-primary:active:not(.btn-active) .svg-icon svg [fill]:not(.permanent):not(g), 
      .aside-dark .btn.btn-active-color-primary:focus:not(.btn-active) .svg-icon svg [fill]:not(.permanent):not(g), 
      .aside-dark .btn.btn-active-color-primary:hover:not(.btn-active) .svg-icon svg [fill]:not(.permanent):not(g), 
      .aside-dark .show>.btn.btn-active-color-primary .svg-icon svg [fill]:not(.permanent):not(g) {
        fill: #ffffff;
      }

      .aside-dark .menu .menu-item.show>.menu-link .menu-icon .svg-icon svg [fill]:not(.permanent):not(g) {
          fill: #ffffff;
      }

      .aside-dark .menu .menu-item.show>.menu-link .menu-title {
          color: inherit;
      }

      

      .aside-dark .menu .menu-item .menu-link {
          position: relative;
      }

      .menu-item .menu-link .menu-arrow.menu-arrow-folder {
        position: absolute;
          top: 0;
          right: 8px;
          width: 39px;
          height: 39px;
          /* background: #455a64; */
          margin: 0;
          padding: 0;
          border-radius: 4px;
      }

      .menu-item .menu-link .menu-arrow.menu-arrow-folder:hover{
        background: #3a3a3a;
      }


      .menu-item .menu-link .menu-arrow.menu-arrow-folder:after {
        position: absolute;
          top: 0;
          right: 0;
          width: 100%;
          height: 100%;
          background-size: 35%;
      }

      .not-selectable,
      .not-selectable > * {
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none; 
      }



      table.dataTable>thead .sorting:after, 
      table.dataTable>thead .sorting:before, 
      table.dataTable>thead .sorting_asc:after, 
      table.dataTable>thead .sorting_asc:before, 
      table.dataTable>thead .sorting_desc:after, 
      table.dataTable>thead .sorting_desc:before {
        position: relative;
          top: 4px;
      }

      .toastr {
        opacity: 1 !important;
      }

      .input-group-text {
        background-color: #03a9f4;
        border:  0;
      }

      .input-group-label {
        position: absolute;
          bottom: -1px;
          text-align: center;
          font-size: 0.6rem;
          font-weight: 400;
          color: white;
      }

      .input-group-text .svg-icon {
        margin-top: -5px;
      }

      .input-group-text .svg-icon svg [fill]:not(.permanent):not(g) {
          fill: #ffffff;
      }

      .stepper.stepper-pills .stepper-item.current:last-child .stepper-icon .stepper-number {
          display: inline-block;
      }

      .stepper.stepper-pills .stepper-item.current:last-child .stepper-icon .stepper-check {
          display: none;
      }

      .stepper.stepper-pills .stepper-item.current:last-child .stepper-icon {
          background-color: #009ef7;
      }

      .breadcrumb-item {
        color:  #009ef7!important;
        cursor:  default;
      }

      .breadcrumb-item * {
        color:  #1976d2!important;
      }
    </style>
    <!--end::Global Stylesheets Bundle-->
    @yield('stylesheet')
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
      <!--begin::Page-->
      <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
          <!--begin::Brand-->
          <div class="aside-logo flex-column-auto" id="kt_aside_logo">
            <!--begin::Logo-->
            <a href="#">
              <img alt="Logo" src="/assets/images/logo_kratein_inline_white.png" class="h-25px logo" />
            </a>
            <!--end::Logo-->
            <!--begin::Aside toggler-->
            <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
              <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
              <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                    <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                  </g>
                </svg>
              </span>
              <!--end::Svg Icon-->
            </div>
            <!--end::Aside toggler-->
          </div>
          <!--end::Brand-->
          <!--begin::Aside menu-->
          <div class="aside-menu flex-column-fluid">
            <!--begin::Aside Menu-->
            <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
              <!--begin::Menu-->
              <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 not-selectable" id="#kt_aside_menu" data-kt-menu="true">
                <?php
                  $directoryURI = $_SERVER['REQUEST_URI'];
                  $path = parse_url($directoryURI, PHP_URL_PATH);
                  $components = explode('/', $path);
                  $first_part = isset($components[2])?$components[2]:"";
                  $last_part  = $components[count($components)-1];
                  
                  

                ?>
                
                
                <div class="menu-item">
                  <div class="menu-content pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Administration</span>
                  </div>
                </div>
                <div class="menu-item">
                  <a class="menu-link <?php if ($first_part=="users") {echo "active"; }?>" href="/admin/users">
                    <span class="menu-icon">
                      <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                          </g>
                        </svg>
                      </span>
                    </span>
                    <span class="menu-title">Users</span>
                  </a>
                </div>

                
                
                
                
                
                
                
              </div>
              <!--end::Menu-->
            </div>
            <!--end::Aside Menu-->
          </div>
          <!--end::Aside menu-->
          
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
          <!--begin::Header-->
          <div id="kt_header" style="" class="header align-items-stretch">
            <!--begin::Container-->
            <div class="container-fluid d-flex align-items-stretch justify-content-between">
              <!--begin::Aside mobile toggle-->
              <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
                  <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                  <span class="svg-icon svg-icon-2x mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                        <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
                      </g>
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </div>
              </div>
              <!--end::Aside mobile toggle-->
              <!--begin::Mobile logo-->
              <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                <a href="#" class="d-lg-none">
                  <img alt="Logo" src="/assets/images/logo_kratein_inline_white.png" class="h-30px" />
                </a>
              </div>
              <!--end::Mobile logo-->
              <!--begin::Wrapper-->
              <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                <!--begin::Navbar-->
                <div class="d-flex align-items-center" id="kt_header_nav">
                  <!--begin::Page title-->
                  <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_header_nav'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('navbar_title')</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                      <!--begin::Item-->
                      <!--
                      <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                      </li>
                      -->
                      <!--end::Item-->
                      <!--begin::Item-->
                      <!--
                      <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                      </li>
                      -->
                      <!--end::Item-->
                      <!--begin::Item-->
                      <li class="breadcrumb-item text-dark">@yield('navbar_breadcrumb')</li>
                      <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                  </div>
                  <!--end::Page title-->
                </div>
                <!--end::Navbar-->
                
                <div class="d-flex align-items-stretch flex-shrink-0">
                  <!--begin::Toolbar wrapper-->
                  <div class="d-flex align-items-stretch flex-shrink-0">                      
                    
                    <!--begin::User-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                      <!--begin::Menu wrapper-->
                      <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                        <img src="/assets/v8.1.5/media/avatars/blank.png" alt="metronic" />
                      </div>
                      <!--begin::Menu-->
                      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <div class="menu-content d-flex align-items-center px-3">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px me-5">
                              <img alt="Logo" src="/assets/v8.1.5/media/avatars/blank.png" />
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Username-->
                            <div class="d-flex flex-column">
                              <div class="fw-bolder d-flex align-items-center fs-5">Max Smith
                              <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span></div>
                              <a href="#" class="fw-bold text-muted text-hover-primary fs-7">max@kt.com</a>
                            </div>
                            <!--end::Username-->
                          </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                          <a href="#" class="menu-link px-5">My Profile</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="bottom, top">
                          <a href="#" class="menu-link px-5">
                            <span class="menu-title position-relative">Language
                            <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
                            <img class="w-15px h-15px rounded-1 ms-2" src="/assets/v8.1.5/media/flags/united-states.svg" alt="metronic" /></span></span>
                          </a>
                          <!--begin::Menu sub-->
                          <div class="menu-sub menu-sub-dropdown w-175px py-4">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="#" class="menu-link d-flex px-5 active">
                              <span class="symbol symbol-20px me-4">
                                <img class="rounded-1" src="/assets/v8.1.5/media/flags/united-states.svg" alt="metronic" />
                              </span>English</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="#" class="menu-link d-flex px-5">
                              <span class="symbol symbol-20px me-4">
                                <img class="rounded-1" src="/assets/v8.1.5/media/flags/spain.svg" alt="metronic" />
                              </span>Spanish</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="#" class="menu-link d-flex px-5">
                              <span class="symbol symbol-20px me-4">
                                <img class="rounded-1" src="/assets/v8.1.5/media/flags/germany.svg" alt="metronic" />
                              </span>German</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="#" class="menu-link d-flex px-5">
                              <span class="symbol symbol-20px me-4">
                                <img class="rounded-1" src="/assets/v8.1.5/media/flags/japan.svg" alt="metronic" />
                              </span>Japanese</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                              <a href="#" class="menu-link d-flex px-5">
                              <span class="symbol symbol-20px me-4">
                                <img class="rounded-1" src="/assets/v8.1.5/media/flags/france.svg" alt="metronic" />
                              </span>French</a>
                            </div>
                            <!--end::Menu item-->
                          </div>
                          <!--end::Menu sub-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5 my-1">
                          <a href="" class="menu-link px-5">Account Settings</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                          <a href="/sign-out" class="menu-link px-5">Sign Out</a>
                        </div>
                        <!--end::Menu item-->
                        
                      </div>
                      <!--end::Menu-->
                      <!--end::Menu wrapper-->
                    </div>
                    <!--end::User -->
                    <!--begin::Heaeder menu toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                      <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
                        <!--begin::Svg Icon | path: icons/duotone/Text/Toggle-Right.svg-->
                        <span class="svg-icon svg-icon-1">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24" />
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M22 11.5C22 12.3284 21.3284 13 20.5 13H3.5C2.6716 13 2 12.3284 2 11.5C2 10.6716 2.6716 10 3.5 10H20.5C21.3284 10 22 10.6716 22 11.5Z" fill="black" />
                              <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M14.5 20C15.3284 20 16 19.3284 16 18.5C16 17.6716 15.3284 17 14.5 17H3.5C2.6716 17 2 17.6716 2 18.5C2 19.3284 2.6716 20 3.5 20H14.5ZM8.5 6C9.3284 6 10 5.32843 10 4.5C10 3.67157 9.3284 3 8.5 3H3.5C2.6716 3 2 3.67157 2 4.5C2 5.32843 2.6716 6 3.5 6H8.5Z" fill="black" />
                            </g>
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </div>
                    </div>
                    <!--end::Heaeder menu toggle-->
                  </div>
                  <!--end::Toolbar wrapper-->
                </div>

              </div>
              <!--end::Wrapper-->
            </div>
            <!--end::Container-->
          </div>
          <!--end::Header-->
          <!--begin::Content-->
          <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

            @yield('content')
            
          </div>
          <!--end::Content-->
          <!--begin::Footer-->
          <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
            <!--begin::Container-->
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center">
              <!--begin::Copyright-->
              <div class="text-dark order-2 order-md-1">                
                <a href="#" target="_blank" class="text-gray-800 text-hover-primary">
                  <img src="/assets/images/logo_kratein_inline_dark.png" class="h-15px" />
                </a>
              </div>
              <!--end::Copyright-->             
            </div>
            <!--end::Container-->
          </div>
          <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->
    
    


    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
      <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
      <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24" />
            <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
            <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
          </g>
        </svg>
      </span>
      <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="/assets/v8.1.5/plugins/global/plugins.bundle.js"></script>
    <script src="/assets/v8.1.5/js/scripts.bundle.js"></script>
    <script src="/assets/v8.1.5/common.js"></script>
    
    <!--end::Global Javascript Bundle-->
    @yield('scripts')
    
    
  </body>
  <!--end::Body-->  
</html>