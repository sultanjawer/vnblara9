<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			{{ env('APP_NAME')}} | {{ ($page_title ?? '') }}
		</title>
		<meta name="description" content="Page Title">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">

		<!-- Call App Mode on ios devices -->
		<meta name="apple-mobile-web-app-capable" content="yes" />

		<!-- Remove Tap Highlight on Windows Phone IE -->
		<meta name="msapplication-tap-highlight" content="no">

		<!-- smartadmin base css -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
		<link id="vendorsbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/vendors.bundle.css') }}">
		<link id="myskin" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/skins/skin-master.css') }}">
		<link id="appbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/app.bundle.css') }}">
		<link id="mytheme" rel="stylesheet" media="screen, print" href="#">

		<!-- Place favicon.ico in the root directory -->
		<link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('img/favicon.png') }}" rel="icon" />
		<link href="{{ asset('img/logo-icon.png') }}" rel="apple-touch-icon" sizes="180x180" />
		<link href="{{ asset('img/logo-icon.png') }}" rel="safari-pinned-tab.svg" color="#5bbad5" />


		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/miscellaneous/reactions/reactions.css') }}">

		<!-- You can add your own stylesheet here to override any styles that comes before it
		<link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/datagrid/datatables/datatables.bundle.css') }}">
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-light.css') }}">
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-regular.css') }}">
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-solid.css') }}">
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-brands.css') }}">

		<!-- coreui -->
		<link href="{{ asset('css/ajax/all.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/datatables/buttons.dataTables.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/datatables/select.dataTables.min.css') }}" rel="stylesheet" />

		<link href="{{ asset('css/toastr.css') }}" rel="stylesheet" />

		<meta name="csrf-token" content="{{ csrf_token() }}">
		@yield('styles')
    </head>

	<body class="mod-bg-1 mod-nav-link footer-function-fixed">
		<script src="{{ asset('js/smartadmin/pagesetting.js') }}"></script>
		<!-- begin page wrapper -->
		<div class="page-wrapper">
            <div class="page-inner">
				<!-- begin sidebar -->
				@include('partials.menu')
				<!-- end sidebar -->
				<div class="page-content-wrapper">
					<!-- begin page header -->
					@include('partials.header')
					<!-- end page header -->
					<!-- begin page content -->
					<main id="js-page-content" role="main" class="page-content">
						<!-- start alert pesan -->
						@if(session('message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fal fa-times-circle"></i></span>
							</button>
							<strong>{{ session('message') }}.</strong>
						</div>
						@endif
						<!-- end alert pesan -->
						<!-- start alert error -->
						@if($errors->count() > 0)
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fal fa-times-circle"></i></span>
							</button>
							<strong>PERHATIAN!</strong>
							<ul class="list-unstyled">
								@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						<!-- end alert error -->
						@yield('content')
					</main>
					<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
					<!-- end page content -->

					<!-- begin page footer -->
					{{-- @include('partials.footer') --}}
					<!-- end page footer -->
					<!-- begin shortcut -->
					{{-- @include('partials.shortcut') --}}
					<!-- end shortcut -->
				</div>
			</div>
		</div>
		<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
		<!-- end page wrapper -->
		<!-- begin quick menu -->
		{{-- @include('partials.quickmenu') --}}
		<!-- end quick menu -->
		{{-- base app script --}}
		<script src="{{ asset('js/app.js') }}"></script>

		<!-- Smartadmin core -->
		<script src="{{ asset('js/smartadmin/vendors.bundle.js') }}"></script>
		<script src="{{ asset('js/smartadmin/app.bundle.js?v=1.1') }}"></script>
		<!-- Smartadmin plugin -->
		<script src="{{ asset('js/smartadmin/datagrid/datatables/datatables.bundle.js') }}"></script>
		<script src="{{ asset('js/smartadmin/datagrid/datatables/datatables.export.js') }}"></script>
		<script src="{{ asset('js/datatables/datetime.js') }}"></script>

		@yield('scripts')
	</body>
</html>
