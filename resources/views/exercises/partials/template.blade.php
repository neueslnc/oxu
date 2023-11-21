<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--favicon-->
    <link rel="icon" href="{{ url('logo.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ url('assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ url('assets/css/pace.min.css') }}" rel="stylesheet"/>
    <script src="{{ url('assets/js/pace.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap') }}" rel="stylesheet">
    <link href="{{ url('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/header-colors.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('style')

    @yield('script_include_header')

    <title>{{ config('app.name') }}</title>


</head>

<body>
<!--wrapper-->
<div class="wrapper" id="block_wrapper">
    <!--sidebar wrapper -->
<!--end sidebar wrapper -->
    <!--start header -->
    <header>
        <div class="topbar d-flex align-items-center" style="left: 0">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                </div>
                <div class="search-bar flex-grow-1">
{{--                    <div class="position-relative search-bar-box">--}}
{{--                        <input type="text" class="form-control search-control" placeholder="Izlash ..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>--}}
{{--                        <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>--}}
{{--                    </div>--}}
                </div>
                <div class="user-box dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('avatar-2.jpg') }}" class="user-img" alt="user avatar">
                        <div class="user-info ps-3">
                            <p class="user-name mb-0">{{ auth()->user()->full_name }}</p>
                            <p class="designattion mb-0">{{ __(auth()->user()->user_level->name) }}</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        {{-- <li>
                            <a class="dropdown-item" href="{{ route('load_script') }}"><i class="bx bx-download"></i>Обновления</a>
                        </li> --}}
                        <li>
                            <a class="dropdown-item" href="{{ route('destroy') }}"><i class='bx bx-log-out-circle'></i><span>Chiqish</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

<!--end header -->
    <!--start page wrapper -->
@yield('body_exercise')
<!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer" id="block_page_footer" style="left: 0;">
        <p class="mb-0">Copyright © 2023.</p>
    </footer>
</div>
<!--end wrapper-->
<!--start switcher-->
<!--end switcher-->
<!-- Bootstrap JS -->
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ url('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
<script src="{{ url('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ url('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ url('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ url('assets/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ url('assets/plugins/input-tags/js/tagsinput.js') }}"></script>
<script src="{{ url('assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
<script src="{{ url('assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
<!--notification js -->
<script src="{{ url('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ url('assets/plugins/notifications/js/notifications.min.js') }}"></script>
{{-- <script src="{{ url('assets/js/index3.js') }}"></script> --}}
<!--app JS-->
<script src="{{ url('assets/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('check')
@stack('scripte_include_end_body')

<script defer src="{{ url('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
<script defer src="{{ url('assets/plugins/notifications/js/notifications.min.js') }}"></script>

<script>

    function succes_noti(title = "Проверен", msg="") {
        Lobibox.notify('success', {
            title: title,
            pauseDelayOnHover: true,
            size: 'mini',
            icon: 'bx bx-check-circle',
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: msg
        });
    }

    function error_noti(title = "Xato", msg="") {
        Lobibox.notify('error', {
            title: title,
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-x-circle',
            msg: msg
        });
    }

</script>
</body>

</html>
