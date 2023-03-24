<aside class="page-sidebar">
    <div class="page-logo">
		<a href="/dashboard" class="page-logo-link press-scale-down d-flex align-items-center position-relative">
			{{-- <img src="{{ asset('img/favicon.png') }}" alt="VNB" aria-roledescription="logo"> --}}
			<span class="page-logo-text">Viral Niaga Berjaya</span>
		</a>

	</div>

	<!-- BEGIN PRIMARY NAVIGATION -->
	<nav id="js-primary-nav" class="primary-nav" role="navigation">
		<ul id="js-nav-menu" class="nav-menu">

			<li class="c-sidebar-nav-item {{ request()->is('categories') ? 'active open' : '' }}">
				<a href="{{ route('categories.index') }}" class="c-sidebar-nav-link"
					data-filter-tags="">
					<i class="c-sidebar-nav-icon fal fa-list"></i>
					<span class="nav-link-text"
						data-i18n="nav.post_categories">Post Categories</span>
				</a>
			</li>
			<li class="{{ request()->is('posts*') ? 'active open' : '' }} ">
				<a href="#" title="Articles" data-filter-tags="Articles/Posts">
					<i class="fal fa-newspaper"></i>
					<span class="nav-link-text"
						data-i18n="nav.posts">Articles/Posts</span>
				</a>
				<ul>
					<li class="c-sidebar-nav-item {{ request()->is('posts') ? 'active' : '' }}">
						<a href="{{ route('posts.index') }}" class="c-sidebar-nav-link"
							data-filter-tags="article post">
							<i
								class="fa-fw fal fa-newspaper c-sidebar-nav-icon"></i>Articles Index
						</a>
					</li>
					<li class="c-sidebar-nav-item {{ request()->is('posts/create') ? 'active' : '' }}">
						<a href="{{ route('posts.create') }}" title="Create an Article"
							data-filter-tags="posts create">
							<i class="fa-fw fal fa-file-edit c-sidebar-nav-icon"></i>
							<span class="nav-link-text" data-i18n="nav.posts_create">Create Article</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="{{ request()->is('products*') ? 'active open' : '' }} ">
				<a href="#" title="Produk-produk" data-filter-tags="produk">
					<i class="fal fa-shopping-cart"></i>
					<span class="nav-link-text"
						data-i18n="nav.products">Products</span>
				</a>
				<ul>
					<li class="c-sidebar-nav-item {{ request()->is('products') ? 'active' : '' }}">
						<a href="{{ route('products.index') }}" class="c-sidebar-nav-link"
							data-filter-tags="produk product">
							<i
								class="fa-fw fal fa-cubes c-sidebar-nav-icon"></i>Product Catalog
						</a>
					</li>
					<li class="c-sidebar-nav-item {{ request()->is('products/create') ? 'active' : '' }}">
						<a href="{{ route('products.create') }}" title="Add a Product"
							data-filter-tags="product create">
							<i class="fa-fw fal fa-cart-plus c-sidebar-nav-icon"></i>
							<span class="nav-link-text" data-i18n="nav.posts_create">Add Product</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="c-sidebar-nav-item {{ request()->is('profile') ? 'active open' : '' }}">
				<a href="{{ route('profile.edit') }}" class="c-sidebar-nav-link"
					data-filter-tags="">
					<i class="c-sidebar-nav-icon fal fa-list"></i>
					<span class="nav-link-text"
						data-i18n="nav.profile">Profile</span>
				</a>
			</li>
			{{-- logout --}}
			<li class="c-sidebar-nav-item">
				<a href="#" class="c-sidebar-nav-link"
					onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
					<i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
					<span class="nav-link-text"
						data-i18n="nav.landing_page">Logout</span>
				</a>
			</li>
		</ul>
	</nav>
	<!-- END PRIMARY NAVIGATION -->
</aside>
