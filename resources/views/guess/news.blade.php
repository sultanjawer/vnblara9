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
		{{-- <style>
			.pagination {
				display: flex;
				justify-content: center;
				align-items: center;
				margin-top: 20px;
				}

				.pagination a {
				display: inline-block;
				padding: 8px 16px;
				margin-right: 5px;
				border: 1px solid #ccc;
				color: #666;
				text-decoration: none;
				transition: all 0.3s ease-in-out;
				}

				.pagination a:hover,
				.pagination .active a {
				background-color: #007bff;
				color: #fff;
				border-color: #007bff;
				}

				.pagination .disabled a {
				pointer-events: none;
				opacity: 0.6;
				border-color: #ccc;
				}

				.pagination .prev,
				.pagination .next {
				margin-right: 10px;
				}

				.pagination .prev a::before,
				.pagination .next a::after {
				content: "\\2039";
				display: inline-block;
				transform: rotate(180deg);
				margin-right: 5px;
				}

				.pagination .next a::after {
				content: "\\203A";
				transform: rotate(0deg);
				margin-right: 0;
				}

				@media screen and (max-width: 576px) {
					.pagination a {
						padding: 5px 10px;
						margin-right: 3px;
						font-size: 12px;
					}
				}

		</style> --}}
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
				<div class="section-bg" style="background-image: url('{{ asset('storage/img/images/img-14.jpg') }}');"></div>
				<div class="section-bg bg-gray-800 opacity-50"></div>
				<div class="container position-relative text-white text-center">
					<div class="display-6 fw-bolder">Newsroom</div>
				</div>
			</div>
			<div class="section py-5">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="news">
								@foreach ($posts as $post)
								<div class="row align-items-center mb-3">
									<div class="col-sm-4 mb-3 mb-sm-0">
										<div class="news-media mb-0">
											<div class="news-media-img news-media-img-lg"
												style="background-image:url(../assets/img/corporate/img-3.jpg);"></div>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="news-content">
											<div class="news-label">
												<span class="bg-indigo-200 text-indigo-800">{{$post->category->name}}</span></div>
											<div class="news-title mb-2">
												{{$post->post_title}}
											</div>
											<div class="mb-4 fw-bold text-gray-600">
												{{$post->post_exerpt}}
											</div>
											<div class="news-date text-gray-400">{{$post->published_at}}</div>
										</div>
										<a href="{{route('newsroom.show',$post->id)}}" class="">read</a>
									</div>
								</div>
								@endforeach
							</div>
								<div class="pagination">
									{{ $posts->links() }}
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
