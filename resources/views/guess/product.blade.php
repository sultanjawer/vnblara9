<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<title>{{env('APP_NAME')}} | {{  ($page_title ?? '') }}</title>
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
		<meta content="" name="description">
		<meta content="" name="author">

		<link rel="stylesheet" href="{{ asset('guess/css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('guess/css/app.min.css') }}">
		<link rel="stylesheet" href="{{ asset('guess/css/vendor.min.css') }}">

		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-light.css') }}">
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-regular.css') }}">
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-solid.css') }}">
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-brands.css') }}">

	</head>
	<body class="pace-done ">
		<div class="pace pace-inactive">
			<div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
				<div class="pace-progress-inner"></div>
			</div>
			<div class="pace-activity"></div>
		</div>
		<div id="page-loader" class="fade show">
			<span class="spinner"></span>
		</div>

		<div id="page-container">
			<!-- header nav -->
			@include('partials.corporate.headernav')
			<!-- hero section-->
			<div class="section py-5 mb-5">
				<div class="section-bg" style="background-image: url('{{ asset('storage/img/product_img/'. $product->product_mime) }}');"></div>
				<div class="section-bg bg-gray-800 opacity-50"></div>
				<div class="container position-relative text-white text-center">
					<div class="display-6 fw-bolder">{{$product->product_name}}</div>
				</div>
			</div>
			<div class="section pt-0">
				<div class="container">
					<div class="row gx-0 align-items-center">
						<div class="col-lg-6 mb-4 mb-lg-0">
							<img class="mw-100" src="{{ url('storage/img/product_img/'.$product->product_mime)}}" alt="">
						</div>
						<div class="col-lg-6 px-lg-5">
							<ul class="list-group list-group-flush mb-2">
								<span class="fw-bold">Nama Produk</span>
								<li class="list-group-item">
									<i>{{$product->product_name}}</i>
								</li>
							</ul>
							<ul class="list-group list-group-flush mb-2">
								<span class="fw-bold">Spesifikasi</span>
								<li class="list-group-item">
									<i>{{$product->product_specs}}</i>
								</li>
							</ul>
							<ul class="list-group list-group-flush mb-2">
								<span class="fw-bold">Keterangan Singkat</span>
								<li class="list-group-item">
									<i>{{$product->product_short}}</i>
								</li>
							</ul>
							<ul class="list-group list-group-flush mb-2">
								<span class="fw-bold">Deskripsi</span>
								<li class="list-group-item">
									<i>{!!$product->product_desc!!}</i>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('partials.corporate.footer')
		<script src="{{ asset('guess/js/app.min.js') }}"></script>
		<script src="{{ asset('guess/js/vendor.min.js') }}"></script>
		<script defer="" src="{{ asset('guess/js/vaafb692b2aea4879b33c060e79fe94621666317369993') }}" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon="{&quot;rayId&quot;:&quot;7ab22863df764983&quot;,&quot;version&quot;:&quot;2023.2.0&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;4db8c6ef997743fda032d4f73cfeff63&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>

	</body>
</html>
