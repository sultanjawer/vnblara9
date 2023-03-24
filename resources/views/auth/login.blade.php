<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<title>
		{{ env('APP_NAME')}} | {{ ($page_title ?? '') }}
	</title>
	<meta name="description" content="Login">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">

	<!-- Call App Mode on ios devices -->
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no">

	<!-- base css -->
	<meta name="description" content="Page Title">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
	<!-- Call App Mode on ios devices -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no">

	<!-- smartadmin base css -->
	<link id="vendorsbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/vendors.bundle.css') }}">
	<link id="myskin" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/skins/skin-master.css') }}">
	<link id="appbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/app.bundle.css') }}">
	<link rel="stylesheet" media="screen, print" href="{{asset('css/smartadmin/page-login.css')}}">
	<link id="mytheme" rel="stylesheet" media="screen, print" href="#">

	<!-- Place favicon.ico in the root directory -->
	<link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('img/favicon.png') }}" rel="icon" />
	<link href="{{ asset('img/logo-icon.png') }}" rel="apple-touch-icon" sizes="180x180" />
	<link href="{{ asset('img/logo-icon.png') }}" rel="safari-pinned-tab.svg" color="#5bbad5" />

	<!-- Font Awsome -->
	<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-light.css') }}">
	<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-regular.css') }}">
	<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-solid.css') }}">
	<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-brands.css') }}">



	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Scripts -->
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

	<div class="page-wrapper">
		<div class="page-inner bg-brand-gradient">
			<div class="page-content-wrapper bg-transparent m-0">
				<div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
					<div class="d-flex align-items-center container p-0">
						<div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9 border-0">
							<a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
								{{-- <img src="img/logo.png" alt="SmartCompany WebApp" aria-roledescription="logo"> --}}
								<span class="page-logo-text mr-1">Viral Niaga Berjaya</span>
							</a>
						</div>
						<div class="ml-auto">
							<ol class="nav">
								{{-- @guest
									@if (Route::has('login'))
										<li class="nav-item" {{ request()->is('*login*') ? 'hidden' : '' }}>
											<a class="btn-link text-white nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
										</li>
									@endif

									@if (Route::has('register'))
										<li class="nav-item" {{ request()->is('*register*') ? 'hidden' : '' }}>
											<a class="nav-link btn-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
										</li>
									@endif
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle text-white" href="#"
												id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">
												Bahasa (ID)
											</a>
											<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
												<a class="dropdown-item" href="#">English (EN)</a>
											</div>
										</li>
								@endguest --}}
							</ol>
						</div>
					</div>
				</div>

				<div class="flex-1 my-bg" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
					<div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
						<div class="row">
							<div class="col-lg-4"></div>
							<div class="col-lg-4 ml-auto">
								<h1 class="text-white fw-300 mb-3">
									Secure login
								</h1>
								<div class="card p-4 rounded-plus bg-faded">
									<div class="d-sm-block d-md-none text-center mt-0 mb-1">
										{{-- <img src="{{ asset('img/logo-icon.png') }}" alt="" aria-roledescription="logo" style="width:150px; height:auto;"> --}}
									</div>
									<form id="js-login" method="POST" novalidate="" action="{{route('login')}}">
										@csrf
										<div class="form-group">
											<label class="form-label" for="email">{{ __('Email Address') }}</label>
											<div class="input-group" data-toggle="tooltip" title data-original-title="Your Email">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<span class="fal fa-user"></span>
													</div>
												</div>
												<input id="email" type="email" class="form-control form-control-md @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="username@example.com" />

												@error('email')
												<div class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</div>
												@enderror
											</div>
										</div>
										<div class="form-group">
											<label class="form-label" for="password">{{ __('Password') }}</label>

											<div class="input-group bg-white shadow-inset-2" data-toggle="tooltip" title data-original-title="Your password">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<span id="togglePassword" class="fal fa-key"></span>
													</div>
												</div>

												<input id="password" type="password"" class=" form-control form-control-md bg-transparent pr-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="your password" />
												@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group text-left">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
												<label class="custom-control-label" for="remember"> {{ __('Remember Me') }}</label>
											</div>
										</div>
										<div class="row no-gutters">
											<div class="col-lg-6 pl-lg-1 my-2" data-title="Tombol masuk" data-intro="Klik tombol ini untuk mengakses aplikasi jika seluruh kolom telah terisi" data-step="6">
												<button id="js-login-btn" type="submit" class="btn btn-danger btn-block btn-sm">Sign in</button>
											</div>

											<div class="col-lg-6 pl-lg-1 my-2">
												@if (Route::has('password.request'))
												<a class="btn btn-link" href="{{ route('password.request') }}">
													{{ __('Forgot Your Password?') }}
												</a>
												@endif
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4"></div>
						</div>
					</div>
				</div>
				<div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
					2023 © Viral Niaga Berjaya
				</div>
			</div>
		</div>
	</div>
	{{-- @include('partials.pagesettings') --}}
	<script src="{{ asset('js/vendors.bundle.js') }}"></script>
	<script src="{{ asset('js/app.bundle.js') }}"></script>
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/6.0.0/intro.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/6.0.0/intro.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/6.0.0/intro.min.js.map"></script> --}}

	<script>
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#password');

		togglePassword.addEventListener('click', function(e) {
			// toggle the type attribute
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});
	</script>
	<script>
		$("#js-login-btn").click(function(event) {

			// Fetch form to apply custom Bootstrap validation
			var form = $("#js-login")

			if (form[0].checkValidity() === false) {
				event.preventDefault()
				event.stopPropagation()
			}

			form.addClass('was-validated');
			// Perform ajax submit here...
		});
	</script>
</body>

</html>
