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
			<div class="section py-5">
				<div class="section-bg" style=""></div>
				<div class="section-bg bg-gray-800 opacity-50"></div>
				<div class="container position-relative text-white text-center">
					<div class="display-6 fw-bolder">Newsroom</div>
				</div>
			</div>
			<div class="section pt-5">
				<div class="container">
					<div class="row gx-5">
						<div class="col">
							<h2 class="mb-3 line-h-13">
								{{$post->post_title}}
							</h2>
							<p class="fw-bold text-gray-600 mb-4 fs-13px">
								<span>By
									<a>Administrator</a>
								</span>
								<span class="ms-5">
									<i class="far fa-clock"></i>
									{{$post->created_at}}
								</span>
							</p>
							{{-- <div class="mb-4">
								<a href=""
									class="btn btn-secondary btn-sm fw-bold w-100px me-1 mb-2 mb-md-0">
									<i class="fab fa-facebook-f fa-fw me-1 ms-n1"></i> Share
								</a>
								<a href=""
									class="btn btn-secondary btn-sm fw-bold w-100px me-1 mb-2 mb-md-0">
									<i class="fab fa-twitter fa-fw me-1 ms-n1"></i> Tweet
								</a>
								<a href=""
									class="btn btn-secondary btn-sm fw-bold w-100px me-1 mb-2 mb-md-0">
									<i class="fab fa-pinterest fa-fw me-1 ms-n1 "></i> Pin</a>
								<a href=""
									class="btn btn-secondary btn-sm fw-bold w-100px me-1 mb-2 mb-md-0">
									<i class="fa fa-envelope fa-fw me-1 ms-n1"></i> Email</a>
								<a href=""
									class="btn btn-secondary btn-sm fw-bold w-100px me-1 mb-2 mb-md-0">
									<i class="fa fa-share fa-fw me-1 ms-n1"></i> Share</a>
							</div> --}}
							<div>
								<div>
									<img class="d-block mw-100"
										src="{{ url('storage/img/post_img/'.$post->mime)}}" alt="">
								</div>
								<div class="text-center mt-2 mb-3"><i>Image from: unsplash.com </i></div>
								<p> {!!$post->post_content!!} </p>
							</div>
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
