<div class="header {{ request()->is('/') ? 'header-float' : 'header-default' }}">
	<div class="container d-flex">
		<div class="header-logo">
			<a href="{{url('/')}}" class="logo-link">
				<span><b>Viral Niaga Berjaya</b><br><p class="d-none d-lg-block">Corporate Tagline</p>
			</a>
		</div>
		<div class="header-nav" id="header-nav">
			<div class="container">
				<div class="header-nav-item nav-item" >
					<a href="{{url('/')}}" class="header-nav-link nav-link {{ request()->is('/') ? 'btn btn-primary active' : '' }}">Home</a>
				</div>
				<div class="header-nav-item">
					<a href="{{ route('ourproducts.index') }}" class="header-nav-link nav-link
						{{ Request::is('ourproducts*', 'ourproducts') ? 'btn btn-primary active text-white' : '' }}">
						Our Products
					</a>
				</div>
				<div class="header-nav-item">
					<a href=" {{route('about')}} " class="header-nav-link nav-link
						{{ request()->is('about') ? 'btn btn-primary active text-white' : '' }}">
						Who We Are
					</a>
				</div>
				{{-- <div class="header-nav-item">
					<a href="{{route('contact')}}" class="header-nav-link
						{{ request()->is('contact') ? 'btn btn-primary active text-white' : '' }}">
						Contact Us
					</a>
				</div> --}}
				{{-- <div class="header-nav-item">
					<a href="{{ route('newsroom.index') }}" class="header-nav-link nav-link
						{{ Request::is('newsroom*', 'newsroom') ? 'btn btn-primary active text-white' : '' }}">
						Newsroom
					</a>
				</div> --}}
			</div>
		</div>
		<button class="header-mobile-nav-toggler" type="button" data-toggle="header-mobile-nav" data-target="#header-nav">
			<span class="header-mobile-nav-toggler-icon"></span>
		</button>
	</div>
</div>
