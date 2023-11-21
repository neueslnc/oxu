<!doctype html>
<html class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

	@yield('style')

	@yield('script_include_header')

	<title>{{ config('app.name') }}</title>
</head>

<body>
	<header>
		<div class="topbar d-flex align-items-center" style="position: fixed; left: 0px;">
			<nav class="navbar navbar-brand">
				<div class="row">

					<div class="col-md-5">
						<img src="{{ url('logo.png') }}" width="10" height="50" class="logo-icon" alt="logo icon">
					</div>

					<div class="col-md-6 align-self-center">
						<h4 class="align-middle">
							{{ env('APP_NAME') }}
						</h4>   
					</div>
				</div>
			</nav>
		</div>
	</header>
	
	<!--wrapper-->
	<div class="wrapper">
		
        @yield('body')

		<div class="bg-white p-3 fixed-bottom border-top shadow">
			<div class="d-flex align-items-center justify-content-between flex-wrap">
				<ul class="list-inline mb-0">
				</ul>
				<p class="mb-0">Copyright © 2023.</p>
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ url('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ url('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
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
	
	@stack('scripte_include_end_body')

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
