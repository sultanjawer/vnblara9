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
		<style>
			.row-eq-height {
  display: flex;
  flex-wrap: wrap;
}

.row-eq-height > [class*='col-'] {
  display: flex;
  flex-direction: column;
}

.row-eq-height > [class*='col-'] > .container {
  flex: 1;
}

		</style>
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
			<!-- hero section -->
			<div id="heroSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
				<div class="carousel-inner">
					@foreach ($posts as $post)
						<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
							<div class="section section-hero">
								<div class="section-bg with-cover"
								style="background: url('{{ $post->mime ? asset('storage/img/post_img/' . $post->mime) : asset('storage/img/images/default-100.jpg') }}') center 0px / cover no-repeat;">

								</div>
								<div class="section-bg bg-gray-800 bg-opacity-50"></div>
								<div class="container position-relative">
									<div class="section-hero-content m-5">
										<div class="row">
											<div class="col-lg-8 col-lg-10">
												<h1 class="hero-title mb-3 mt-5 pt-md-5">
													{{$post->post_title}}
												</h1>
												<div class="fs-18px text-white text-opacity-80">
													{{$post->post_exerpt}}
												</div>
												<a href="{{route('newsroom.show', $post->id)}}"
													class="hero-btn fw-bold mt-4 mb-5 pb-5">
													<i class="fas fa-arrow-right"></i>
													Read more...
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#heroSlider" data-bs-slide="prev">
					<i class="fas fa-angle-left fa-2x"></i>
				</a>
				<a class="carousel-control-next fa-2x" href="#heroSlider" data-bs-slide="next">
					<i class="fas fa-angle-right"></i>
				</a>
			</div>
			<div id="catalogue" class="section bg-success bg-opacity-50">
				<div class="container">
					<div class="pt-lg-5 pb-lg-3 text-center">
						<div class="display-6 fw-bolder mb-3 d-flex align-items-center justify-content-center">
							Product Catalogues
						</div>
						<p class="fs-18px mb-5">
							Best in Quality and Price
						</p>
					</div>
					<div class="row gx-5 mb-5 row-eq-height">
						@foreach ($products as $product)
							<div class="col-md-4 mb-3" >
								<div class="container rounded-3 shadow-lg position-relative" style="background: url('{{ $product->product_mime ? asset('storage/img/product_img/' . $product->product_mime) : asset('storage/img/images/default-100.jpg') }}') center 0px / cover no-repeat;">
									<div class="section-hero-content">
										<div class="row">
											<div class="col m-2">
												<h4 class="hero-title mb-1 mt-5 pt-md-5 text-white"
													style="margin-top:80pt !important; text-shadow: 3px 3px 5px #000">
													{{$product->product_name}}
												</h4>
												<a href="{{route('ourproducts.show',$product->id)}} "
													class="btn btn-danger btn-sm fw-bold">
													<i class="fas fa-arrow-right"></i>
													Check
												</a><br><br>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div id="highlights" class="section">
				<div class="container">
					<div class="section-subtitle text-center">Product Highlights</div>
					<div class="row gx-5 mb-5">
						<div class="col-lg-6">
							<div class="news rounded-3 overflow-hidden mb-5 mb-lg-0">
								{{-- <div class="news-media mb-0">
									<div class="news-media-img" style="background-image:url(../assets/img/corporate/img-6.jpg);"></div>
								</div> --}}
								<div class="news-content px-4 py-4">
									<div class="news-label"><span class="bg-teal-200 text-teal-800">Keunggulan</span></div>
									<div class="news-title">Produk-produk kami memiliki kualitas terbaik di bidangnya.</div>
									<p>
										Dikarenakan kami selalu menjaga & memelihara barang masuk , barang keluar, hingga barang di gudang kami.
									</p>
									<p>
										Kami juga menjual:
										<ol>
											<li>Plastic Wrapping for machine use ( 20micron x 1500 x 500 )</li>
											<li>Chemical Cerium Oxide ( Merah, Kuning, Putih ) & Sodium Sulfate Anhydrous</li>
											<li>Brown Alumunium Oxide / Pasir Garnet</li>
										</ol>
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row h-50">
								@foreach ($moreproducts as $product)
									<div class="col-lg-12 h-50 mb-5 mb-lg-0 pb-lg-3">
										<div class="news rounded-3 overflow-hidden shadow d-flex h-100 mb-0">
											<div class="news-content w-100 p-4 d-flex align-items-center">
												<div>
													<div class="news-label fw-bold">{{$product->product_name}}</div>
													<div class="">Ukuran: 1220 x 2440 x 12 mm</div>
												</div>
											</div>
											<div class="news-media w-50 h-100 mb-0">
												<div class="news-media-img h-100 pt-0"
												style="background: url('{{ $product->product_mime ? asset('storage/img/product_img/' . $product->product_mime) : asset('storage/img/images/default-100.jpg') }}') center 0px / cover no-repeat;">
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="product" class="section bg-success bg-opacity-50 mt-5">
				<div class="container">
					<div class="card-group d-flex flex-wrap">
						@foreach ($moreproducts as $product)
							<div class="col-lg-3 p-1 d-flex">
								<div class="news rounded-3 overflow-hidden mb-5 mb-lg-0 d-flex flex-column">
									<div class="news-media mb-0">
										<div class="news-media-img"
											style="background: url('{{ $product->product_mime ? asset('storage/img/product_img/' . $product->product_mime) : asset('storage/img/images/default-100.jpg') }}')
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
									<a href="{{route('ourproducts.show',$product->id)}}" class="stretched-link"></a>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		{{-- @include('partials.corporate.footer-widget') --}}
		@include('partials.corporate.footer')
		<script src="{{ asset('guess/js/app.min.js') }}"></script>
		<script src="{{ asset('guess/js/vendor.min.js') }}"></script>
	<script defer="" src="{{ asset('guess/js/vaafb692b2aea4879b33c060e79fe94621666317369993') }}" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon="{&quot;rayId&quot;:&quot;7ab22863df764983&quot;,&quot;version&quot;:&quot;2023.2.0&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;4db8c6ef997743fda032d4f73cfeff63&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>

	</body>
</html>
