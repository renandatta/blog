<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:image" content="{{ asset('img/favicon.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('img/favicon.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="600">
    <meta name="description" content="{{ env('APP_NAME') }}">
    <meta name="author" content="Adtek">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title'){{ env('APP_NAME') }}</title>

    <link href="{{ asset('lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/typicons.font/typicons.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/sweetalert/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/dropify/css/dropify.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/azia.css') }}">
    <style>
        /*.az-header{*/
        /*    background-color: #007bff;*/
        /*}*/
        /*.az-content-breadcrumb span a{*/
        /*    color: #969dab;*/
        /*}*/
        /*.az-content-breadcrumb span:last-child a{*/
        /*    color: #70737c;*/
        /*}*/
        /*.az-header-menu-icon span::before, .az-header-menu-icon span::after{*/
        /*    background-color: #fff;*/
        /*}*/
        /*.az-header-menu-icon span{*/
        /*    background-color: #fff;*/
        /*}*/
        /*.az-header-message > a, .az-header-notification > a{*/
        /*    color: #fff;*/
        /*}*/
        .az-body-sidebar .az-content-header{
            padding: 15px 20px;
        }
        .az-content-breadcrumb{
            margin-bottom: 0;
        }
        a{
            color: #70737c;
        }
        .select2-container{
            width: 100%!important;
        }
        .ui-datepicker-year{
            border: 0;
            font-weight: bold;
        }
        .ui-datepicker .ui-datepicker-calendar .ui-datepicker-today a, .ui-datepicker .ui-datepicker-calendar .ui-datepicker-today a:hover, .ui-datepicker .ui-datepicker-calendar .ui-datepicker-today a:focus{
            background-color: transparent;
            color: #000;
        }
        .ui-datepicker .ui-datepicker-calendar td span, .ui-datepicker .ui-datepicker-calendar td a.ui-state-active{
            background-color: #007bff;
            color: #fff;
        }
        @media (min-width: 992px) {
            .custom-width{
                max-width: calc(100vw - 240px);
            }
            .normal-width{
                max-width: 100vw;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="az-body az-body-sidebar">
<div class="az-sidebar">
    <div class="az-sidebar-loggedin pt-3">
        <div class="az-img-user online">
            <img src="{{ asset('img/user.png') }}" alt="">
        </div>
        <div class="media-body">
            <h6>{{ Auth::user()->name }}</h6>
            <span>{{ Auth::user()->user_level->name }}</span>
        </div>
    </div>
    <div class="az-sidebar-body">
        <ul class="nav">
            <li class="nav-label">Main Menu</li>
            @php
                $credentials = Auth::user()->user_level->modules;
                $modules = [];
                foreach ($credentials as $credential) {
                    array_push($modules, $credential->module);
                }
            @endphp
            @foreach ($modules as $module)
                @if(!empty($module))
                    @if($module->parent_code == '#')
                        @if($module->action != '#')
                            <li class="nav-item @if(Session::get('menu_active') == $module->action) active show @endif">
                                <a @if(Route::has($module->action)) href="{{ route($module->action) }}" @endif class="nav-link"><i class="{{ $module->icon }}"></i>{{ $module->name }}</a>
                            </li>
                        @else
                            <li class="nav-item" id="menu{{ $module->id }}">
                                <a href="javascript:void(0)" class="nav-link with-sub"><i class="la la-shield"></i>{{ $module->name }}</a>
                                <nav class="nav-sub">
                                    @if(count($module->sub_modules) > 0)
                                        @foreach($module->sub_modules as $subModule)
                                            <a @if(Route::has($subModule->action)) href="{{ route($subModule->action) }}" @endif class="nav-sub-link @if(Session::get('menu_active') == $subModule->action) active show @endif">{{ $subModule->name }}</a>
                                            @if(Session::get('menu_active') == $subModule->action)
                                                <script>
                                                    document.getElementById('menu{{ $module->id }}').className += " active show";
                                                </script>
                                            @endif
                                        @endforeach
                                    @endif
                                </nav>
                            </li>
                        @endif
                    @endif
                @endif
            @endforeach
            <li class="nav-label"></li>
            <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link"><i class="la la-sign-out"></i>Logout</a></li>
        </ul>
    </div>
</div>
<div class="az-content az-content-dashboard-two custom-width">
    @include('_tools.alert')
    @yield('content')
    <div class="az-footer">
        <div class="container-fluid">
            <span>&copy; {{ date('Y') }} Administrasi Teknik</span>
            <span>Designed by the hand of <i class="la la-code"></i></span>
        </div>
    </div>
</div>
@stack('modals')

<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/sweetalert/sweetalert2.min.js') }}"></script>
<script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<script src="{{ asset('js/autoNumeric.js') }}"></script>
<script src="{{ asset('lib/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('js/azia.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function add_commas(nStr) {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }
    function remove_commas(nStr) {
        nStr = nStr.replace(/\./g,'');
        return nStr;
    }
    $(function(){
        'use strict';

        $('.az-sidebar .with-sub').on('click', function(e){
            e.preventDefault();
            $(this).parent().toggleClass('show');
            $(this).parent().siblings().removeClass('show');
        });

        $(document).on('click touchstart', function(e){
            e.stopPropagation();

            // closing of sidebar menu when clicking outside of it

            if(!$(e.target).closest('.az-header-menu-icon').length) {
                var sidebarTarg = $(e.target).closest('.az-sidebar').length;
                if(!sidebarTarg) {
                    $('body').removeClass('az-sidebar-show');
                }
            }
        });


        $('#azSidebarToggle').on('click', function(e){
            e.preventDefault();

            $('.az-content-dashboard-two').removeAttr('style');
            if(window.matchMedia('(min-width: 992px)').matches) {
                $('body').toggleClass('az-sidebar-hide');
                $('.az-content-dashboard-two').toggleClass('custom-width normal-width');
            } else {
                $('body').toggleClass('az-sidebar-show');
            }
        });

        $('.dropify').dropify();
        $('.select2').select2();
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy',
            showOtherMonths: true,
            selectOtherMonths: true,
            changeYear: true
        });
        $('.autonumeric').attr('data-a-sep','.');
        $('.autonumeric').attr('data-a-dec',',');
        $('.autonumeric').autoNumeric({mDec: '0',vMax:'9999999999999999999999999'});
        $('.autonumeric-decimal').attr('data-a-sep','.');
        $('.autonumeric-decimal').attr('data-a-dec',',');
        $('.autonumeric-decimal').autoNumeric({mDec: '2',vMax:'999'});
    });
</script>
@stack('scripts')
</body>
</html>
