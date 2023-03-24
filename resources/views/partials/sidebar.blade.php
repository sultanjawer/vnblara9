<div id="sidebar" class="sidebar">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<div class="image">
					<a href="javascript:;"><img src="assets/img/user-13.jpg" alt="" /></a>
				</div>
				<div class="info">
					Sean Ngu
					<small>Front end developer</small>
				</div>
			</li>
		</ul>
		<!-- end sidebar user -->
		<!-- begin sidebar nav -->
		<ul class="nav">
			<li class="nav-header">Navigation</li>
			<li class="has-sub {{ request()->is('dashboard') ? 'active' : '' }}">
				<a href="javascript:;">
					<b class="caret pull-right"></b>
					<i class="fa fa-laptop"></i>
					<span>Dashboard</span>
				</a>
				<ul class="sub-menu">
					<li><a href="index.html">Dashboard v1</a></li>
					<li class="{{ request()->is('dashboard') ? 'active' : '' }}">
						<a href="index_v2.html">Dashboard v2</a>
					</li>
				</ul>
			</li>
			<li class="{{ request()->is('categories*') ? 'active' : '' }}">
				<a href="{{route('categories.index')}}">
					<i class="fa fa-list mr-1"></i>
					<span>Post Category</span>
				</a>
			</li>
			<!-- begin sidebar minify button -->
			<li>
				<a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
					<i class="fa fa-angle-double-left"></i>
				</a>
			</li>
			<!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
