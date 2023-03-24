<!-- BEGIN Page Header -->
<header class="page-header" role="banner">
	<!-- we need this logo when user switches to nav-function-top -->
	<div class="page-logo">
		<a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative"
			data-toggle="modal" data-target="#modal-shortcut">
			{{-- <img src="" alt="" aria-roledescription="logo"> --}}
			<span class="page-logo-text mr-1">Viral Niaga Berjaya</span>
			<span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
			<i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
		</a>
	</div>
	<!-- DOC: nav menu layout change shortcut -->
	<div class="hidden-md-down dropdown-icon-menu position-relative">
		<a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden"
			title="Hide Navigation">
			<i class="ni ni-menu"></i>
		</a>

	</div>
	<!-- DOC: mobile button appears during mobile width -->
	<div class="hidden-lg-up">
		<a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
			<i class="ni ni-menu"></i>
		</a>
	</div>
	<div class="ml-auto d-flex">
		<!-- app user menu -->
		<div>
			<a href="#" data-toggle="dropdown" title="{{ Auth::user()->name }}"
				class="header-icon d-flex align-items-center justify-content-center ml-2">
				@if (!empty(Auth::user()::find(Auth::user()->id)->data_user->logo))
					<img src="{{ Storage::disk('public')->url(Auth::user()::find(Auth::user()->id)->data_user->logo) }}"
						class="profile-image rounded-circle">
				@else
					<img src="{{ asset('/img/avatars/admin.png') }}" class="profile-image rounded-circle"
						alt="{{ Auth::user()->name }}">
				@endif
			</a>
			<div class="dropdown-menu dropdown-menu-animated dropdown-lg">
				<div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
					<div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
						<span class="mr-2">
							@if (!empty(Auth::user()::find(Auth::user()->id)->data_user->avatar))
								<img src="{{ Storage::disk('public')->url(Auth::user()::find(Auth::user()->id)->data_user->avatar) }}"
									class="profile-image rounded-circle">
							@else
								<img src="{{ asset('/img/avatars/admin.png') }}"
									class="profile-image rounded-circle" alt="{{ Auth::user()->name }}">
							@endif

						</span>
						<div class="info-card-text">
							<div class="fs-lg text-truncate text-truncate-lg">{{ Auth::user()->name }}</div>
							<span class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->email }}</span>
						</div>
					</div>
				</div>
				<div class="dropdown-divider m-0"></div>

				<div class="dropdown-divider m-0"></div>
				<a href="#" class="dropdown-item" data-action="app-fullscreen">
					<span data-i18n="drpdwn.fullscreen">Layar Penuh</span>
					<i class="float-right text-muted fw-n">F11</i>
				</a>
				<a href="{{route('profile.edit')}}" class="dropdown-item">
					<span data-i18n="drpdwn.profile">Profile</span>
				</a>
				<div class="dropdown-divider m-0"></div>
				<a class="dropdown-item fw-500 pt-3 pb-3"
					onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
					href="{{ trans('global.logout') }}">
					<span data-i18n="drpdwn.page-logout">Keluar</span>
					<span class="float-right fw-n">&commat;{{ Auth::user()->name }}</span>
				</a>
			</div>
		</div>
	</div>
</header>
