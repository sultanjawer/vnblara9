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
				<div class="section-bg" style="background-image: url('{{ asset('storage/img/images/Asset-1-80.jpg') }}');"></div>
				<div class="section-bg bg-gray-800 opacity-50"></div>
				<div class="container position-relative text-white text-center">
					<div class="display-6 fw-bolder">About Us</div>
				</div>
			</div>
			<div class="section py-5">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-12">
							<div class="row gx-5 mb-5">
								<div class="col-lg-6 mb-lg-0">
									<div class="row gx-5 mb-5">
										<h5 class="mb-3">About Us</h5>
										<p>
											PT. Viral Niaga Berjaya berdiri sejak tahun 2022,
											merupakan perusahaan importir dan distributor untuk
											peralatan pabrik kaca % aplikator kaca. kami juga menyediakan
											jasa trading. Jika Anda ingin mengetahui lebih lanjut
											tentang bagaimana PT. Viral Niaga Berjaya dapat melayani
											kebutuhan peralatan dan industri Anda, hubungi hari ini.
										</p>
									</div>
									<div class="row gx-5 mb-5">
										<h5 class="mb-3">Contact Us</h5>
										<div><b>PT. Viral Niaga Berjaya</b></div>
										<p class="text-wrap">
											Jl. Ruko Pelangi No.25, RT.7/RW.8<br>
											Cengkareng Barat, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730, Indonesia<br>
										</p>
										<p class="text-decoration-none">
											<i class="far fa-envelope mr-1"></i>
											<a href="mailto:viralniagaberjaya@gmail.com" class="text-decoration-none text-red-600">
												viralniagaberjaya@gmail.com
											</a><br>
											<i class="fab fa-whatsapp tex-success mr-1"></i>
											<a href="https://wa.me/6281284331989?text=I'm%20interested%20in%20your%20products"
												class="text-decoration-none text-red-600">
												+6281284331989
											</a><br>
										</p>
									</div>
								</div>
								<div class="col-lg-6">
									<h5 class="mb-3">We are here</h5>
									<div class="row gx-4">
										<div class="col mb-3 mb-lg-0">
											<div class="ratio ratio-16x9">
												<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31735.712562358072!2d106.722604!3d-6.13553!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1d5439c793e3%3A0xf3eface6d8a2b209!2sJl.%20Ruko%20Pelangi%20No.25%2C%20RT.7%2FRW.8%2C%20Cengkareng%20Bar.%2C%20Kecamatan%20Cengkareng%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2011730!5e0!3m2!1sid!2sid!4v1679600060693!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
											</div>
										</div>
									</div>
								</div>
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
