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

		<link rel="stylesheet" media="screen, print" href="{{ asset('css/font/fa-light.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/font/fa-regular.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/font/fa-solid.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/font/fa-brands.css') }}">

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
			<div class="section py-5">
				<div class="section-bg" style="background-image: url('{{ asset('storage/img/images/img-27.jpg') }}');"></div>
				<div class="section-bg bg-gray-800 opacity-50"></div>
				<div class="container position-relative text-white text-center">
					<div class="display-6 fw-bolder">Katalog Produk</div>
				</div>
			</div>
			<div id="product" class="section">
				<div class="container">
					<div class="card-group d-flex flex-wrap">
						@foreach ($ourproducts as $product)
							<div class="col-lg-3 p-3 d-flex">
								<div class="news rounded-3 overflow-hidden mb-5 mb-lg-0 d-flex flex-column  shadow-lg">
									<div class="news-media mb-0">
										<div class="news-media-img"
											style="background: url('{{ $product->product_mime ? asset('storage/img/product_img/' . $product->product_mime) : asset('storage/img/post_img/default.jpg') }}')
												center 0px / cover no-repeat;">
										</div>
									</div>
									<div class="news-content px-4 py-4 bg-white flex-grow-1">
										<div class="news-label">
											<span class="bg-teal-200 text-teal-800">
												{{$product->tags}}
											</span>
										</div>
										<div class="news-title">
											{{$product->product_name}}
										</div>
										<p>{{$product->product_short}}</p>
									</div>
									<a href="{{route('ourproducts.show', $product->id)}}" class="stretched-link"></a>
								</div>
							</div>
						@endforeach
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
