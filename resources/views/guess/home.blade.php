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

<body class="mod-bg-1 mod-nav-link header-function-fixed nav-function-top blur">
	<!-- DOC: script to save and load page settings -->
	<script>
		/**
		 *	This script should be placed right after the body tag for fast execution
		 *	Note: the script is written in pure javascript and does not depend on thirdparty library
		 **/
		"use strict";

		var classHolder = document.getElementsByTagName("BODY")[0],
			/**
			 * Load from localstorage
			 **/
			themeSettings = localStorage.getItem("themeSettings")
				? JSON.parse(localStorage.getItem("themeSettings"))
				: {},
			themeURL = themeSettings.themeURL || "",
			themeOptions = themeSettings.themeOptions || "";
		/**
		 * Load theme options
		 **/
		if (themeSettings.themeOptions) {
			classHolder.className = themeSettings.themeOptions;
			console.log("%c✔ Theme settings loaded", "color: #148f32");
		} else {
			console.log(
				"%c✔ Heads up! Theme settings is empty or does not exist, loading default settings...",
				"color: #ed1c24"
			);
		}
		if (themeSettings.themeURL && !document.getElementById("mytheme")) {
			var cssfile = document.createElement("link");
			cssfile.id = "mytheme";
			cssfile.rel = "stylesheet";
			cssfile.href = themeURL;
			document.getElementsByTagName("head")[0].appendChild(cssfile);
		} else if (themeSettings.themeURL && document.getElementById("mytheme")) {
			document.getElementById("mytheme").href = themeSettings.themeURL;
		}
		/**
		 * Save to localstorage
		 **/
		var saveSettings = function () {
			themeSettings.themeOptions = String(classHolder.className)
				.split(/[^\w-]+/)
				.filter(function (item) {
					return /^(nav|header|footer|mod|display)-/i.test(item);
				})
				.join(" ");
			if (document.getElementById("mytheme")) {
				themeSettings.themeURL = document
					.getElementById("mytheme")
					.getAttribute("href");
			}
			localStorage.setItem("themeSettings", JSON.stringify(themeSettings));
		};
		/**
		 * Reset settings
		 **/
		var resetSettings = function () {
			localStorage.setItem("themeSettings", "");
		};
	</script>
	<!-- BEGIN Page Wrapper -->
	<div class="page-wrapper">
		<div class="page-inner">
			<!-- BEGIN Left Aside -->
			<aside class="page-sidebar" hidden>
				<div class="page-logo">
					<a
						href="#"
						class="page-logo-link press-scale-down d-flex align-items-center position-relative"
						data-toggle="modal"
						data-target="#modal-shortcut"
					>
						<img
							src="img/logo.png"
							alt="SmartAdmin WebApp"
							aria-roledescription="logo"
						/>
						<span class="page-logo-text mr-1">SmartAdmin WebApp</span>
						<span
							class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"
						></span>
						<i
							class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"
						></i>
					</a>
				</div>
				<!-- BEGIN PRIMARY NAVIGATION -->
				<nav id="js-primary-nav" class="primary-nav" role="navigation">
					<div class="nav-filter">
						<div class="position-relative">
							<input
								type="text"
								id="nav_filter_input"
								placeholder="Filter menu"
								class="form-control"
								tabindex="0"
							/>
							<a
								href="#"
								onclick="return false;"
								class="btn-primary btn-search-close js-waves-off"
								data-action="toggle"
								data-class="list-filter-active"
								data-target=".page-sidebar"
							>
								<i class="fal fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="info-card">
						<img
							src="img/demo/avatars/avatar-admin.png"
							class="profile-image rounded-circle"
							alt="Dr. Codex Lantern"
						/>
						<div class="info-card-text">
							<a href="#" class="d-flex align-items-center text-white">
								<span class="text-truncate text-truncate-sm d-inline-block">
									Dr. Codex Lantern
								</span>
							</a>
							<span class="d-inline-block text-truncate text-truncate-sm"
								>Toronto, Canada</span
							>
						</div>
						<img
							src="img/card-backgrounds/cover-2-lg.png"
							class="cover"
							alt="cover"
						/>
						<a
							href="#"
							onclick="return false;"
							class="pull-trigger-btn"
							data-action="toggle"
							data-class="list-filter-active"
							data-target=".page-sidebar"
							data-focus="nav_filter_input"
						>
							<i class="fal fa-angle-down"></i>
						</a>
					</div>
					<!--
					TIP: The menu items are not auto translated. You must have a residing lang file associated with the menu saved inside dist/media/data with reference to each 'data-i18n' attribute.
					-->
					<ul id="js-nav-menu" class="nav-menu">
						<li class="active">
							<a
								href="blank.html"
								title="Blank Project"
								data-filter-tags="blank page"
							>
								<i class="fal fa-globe"></i>
								<span class="nav-link-text" data-i18n="nav.blankpage"
									>Blank Project</span
								>
							</a>
						</li>
						<li class="nav-title">Navigation Title</li>
						<li>
							<a href="#" title="Category" data-filter-tags="category">
								<i class="fal fa-file"></i>
								<span class="nav-link-text" data-i18n="nav.category"
									>Category</span
								>
							</a>
							<ul>
								<li>
									<a
										href="javascript:void(0);"
										title="Menu child"
										data-filter-tags="utilities menu child"
									>
										<span
											class="nav-link-text"
											data-i18n="nav.utilities_menu_child"
											>Sub-category</span
										>
									</a>
									<ul>
										<li>
											<a
												href="javascript:void(0);"
												title="Sublevel Item"
												data-filter-tags="utilities menu child sublevel item"
											>
												<span
													class="nav-link-text"
													data-i18n="nav.utilities_menu_child_sublevel_item"
													>Sublevel Item</span
												>
											</a>
										</li>
										<li>
											<a
												href="javascript:void(0);"
												title="Another Item"
												data-filter-tags="utilities menu child another item"
											>
												<span
													class="nav-link-text"
													data-i18n="nav.utilities_menu_child_another_item"
													>Another Item</span
												>
											</a>
										</li>
									</ul>
								</li>
								<li class="disabled">
									<a
										href="javascript:void(0);"
										title="Disabled item"
										data-filter-tags="utilities disabled item"
									>
										<span
											class="nav-link-text"
											data-i18n="nav.utilities_disabled_item"
											>Disabled item</span
										>
									</a>
								</li>
							</ul>
						</li>
						<!-- Example of open and active states -->
						<li class="active open">
							<a href="#" title="Category" data-filter-tags="category">
								<i class="fal fa-plus"></i>
								<span class="nav-link-text" data-i18n="nav.category"
									>Open Item</span
								>
							</a>
							<ul>
								<li class="active open">
									<a
										href="javascript:void(0);"
										title="Menu child"
										data-filter-tags="utilities menu child"
									>
										<span
											class="nav-link-text"
											data-i18n="nav.utilities_menu_child"
											>Open Sub-category</span
										>
									</a>
									<ul>
										<li class="active">
											<a
												href="javascript:void(0);"
												title="Sublevel Item"
												data-filter-tags="utilities menu child sublevel item"
											>
												<span
													class="nav-link-text"
													data-i18n="nav.utilities_menu_child_sublevel_item"
													>Active Item</span
												>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
					<div class="filter-message js-filter-message bg-success-600"></div>
				</nav>
				<!-- END PRIMARY NAVIGATION -->
				<!-- NAV FOOTER -->
				<div class="nav-footer shadow-top">
					<a
						href="#"
						onclick="return false;"
						data-action="toggle"
						data-class="nav-function-minify"
						class="hidden-md-down"
					>
						<i class="ni ni-chevron-right"></i>
						<i class="ni ni-chevron-right"></i>
					</a>
					<ul class="list-table m-auto nav-footer-buttons">
						<li>
							<a
								href="javascript:void(0);"
								data-toggle="tooltip"
								data-placement="top"
								title="Chat logs"
							>
								<i class="fal fa-comments"></i>
							</a>
						</li>
						<li>
							<a
								href="javascript:void(0);"
								data-toggle="tooltip"
								data-placement="top"
								title="Support Chat"
							>
								<i class="fal fa-life-ring"></i>
							</a>
						</li>
						<li>
							<a
								href="javascript:void(0);"
								data-toggle="tooltip"
								data-placement="top"
								title="Make a call"
							>
								<i class="fal fa-phone"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- END NAV FOOTER -->
			</aside>
			<!-- END Left Aside -->
			<div class="page-content-wrapper mt-5">
				<!-- BEGIN Page Header -->
				<header class="page-header" role="banner">
					<!-- we need this logo when user switches to nav-function-top -->
					<div class="page-logo">
						<a href="#" class="page-logo-link press-scale-down
								d-flex align-items-center position-relative"
								data-toggle="modal" data-target="#modal-shortcut" >
							<img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo" />
							<span class="page-logo-text mr-1">SmartAdmin WebApp</span>
							<span class="position-absolute text-white
								opacity-50 small pos-top pos-right mr-2 mt-n2" ></span>
							<i class="fal fa-angle-down d-inline-block
								ml-1 fs-lg color-primary-300"></i>
						</a>
					</div>
					<!-- DOC: nav menu layout change shortcut -->
					<div class="hidden-md-down dropdown-icon-menu position-relative">
						<a
							href="#"
							class="header-btn btn js-waves-off"
							data-action="toggle"
							data-class="nav-function-hidden"
							title="Hide Navigation"
						>
							<i class="ni ni-menu"></i>
						</a>
						<ul>
							<li>
								<a
									href="#"
									class="btn js-waves-off"
									data-action="toggle"
									data-class="nav-function-minify"
									title="Minify Navigation"
								>
									<i class="ni ni-minify-nav"></i>
								</a>
							</li>
							<li>
								<a
									href="#"
									class="btn js-waves-off"
									data-action="toggle"
									data-class="nav-function-fixed"
									title="Lock Navigation"
								>
									<i class="ni ni-lock-nav"></i>
								</a>
							</li>
						</ul>
					</div>
					<!-- DOC: mobile button appears during mobile width -->
					<div class="hidden-lg-up">
						<a
							href="#"
							class="header-btn btn press-scale-down"
							data-action="toggle"
							data-class="mobile-nav-on"
						>
							<i class="ni ni-menu"></i>
						</a>
					</div>
					<div class="search">
						<form
							class="app-forms hidden-xs-down"
							role="search"
							action="page_search.html"
							autocomplete="off"
						>
							<input
								type="text"
								id="search-field"
								placeholder="Search for anything"
								class="form-control"
								tabindex="1"
							/>
							<a
								href="#"
								onclick="return false;"
								class="btn-danger btn-search-close js-waves-off d-none"
								data-action="toggle"
								data-class="mobile-search-on"
							>
								<i class="fal fa-times"></i>
							</a>
						</form>
					</div>
					<div class="ml-auto d-flex">
						<!-- activate app search icon (mobile) -->
						<div class="hidden-sm-up">
							<a
								href="#"
								class="header-icon"
								data-action="toggle"
								data-class="mobile-search-on"
								data-focus="search-field"
								title="Search"
							>
								<i class="fal fa-search"></i>
							</a>
						</div>
						<div class="hidden-sm-down">
							<a class="header-icon {{ request()->is('sample') ? 'bg-primary-900' : '' }}" href="#">
								<i class="fa fa-home"></i> </a>
						</div>
						<!-- app settings -->
						<div class="hidden-md-down">
							<a
								href="#"
								class="header-icon"
								data-toggle="modal"
								data-target=".js-modal-settings"
							>
								<i class="fal fa-cog"></i>
							</a>
						</div>
						<!-- app user menu -->
						<div>
							<a
								href="#"
								data-toggle="dropdown"
								title="drlantern@gotbootstrap.com"
								class="header-icon d-flex align-items-center justify-content-center ml-2"
							>
								{{-- <img
									src="img/demo/avatars/avatar-admin.png"
									class="profile-image rounded-circle"
									alt="Dr. Codex Lantern"
								/> --}}
								<i class="fa fa-user-circle fa-2x"></i>
								<!-- you can also add username next to the avatar with the codes below:
								<span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
								<i class="ni ni-chevron-down hidden-xs-down"></i> -->
							</a>
							<div class="dropdown-menu dropdown-menu-animated dropdown-lg">
								<div
									class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top"
								>
									<div
										class="d-flex flex-row align-items-center mt-1 mb-1 color-white"
									>
										<span class="mr-2">
											<img
												src="img/demo/avatars/avatar-admin.png"
												class="rounded-circle profile-image"
												alt="Dr. Codex Lantern"
											/>
										</span>
										<div class="info-card-text">
											<div class="fs-lg text-truncate text-truncate-lg">
												Dr. Codex Lantern
											</div>
											<span class="text-truncate text-truncate-md opacity-80"
												>drlantern@gotbootstrap.com</span
											>
										</div>
									</div>
								</div>
								<div class="dropdown-divider m-0"></div>
								<a href="#" class="dropdown-item" data-action="app-reset">
									<span data-i18n="drpdwn.reset_layout">Reset Layout</span>
								</a>
								<a
									href="#"
									class="dropdown-item"
									data-toggle="modal"
									data-target=".js-modal-settings"
								>
									<span data-i18n="drpdwn.settings">Settings</span>
								</a>
								<div class="dropdown-divider m-0"></div>
								<a
									href="#"
									class="dropdown-item"
									data-action="app-fullscreen"
								>
									<span data-i18n="drpdwn.fullscreen">Fullscreen</span>
									<i class="float-right text-muted fw-n">F11</i>
								</a>
								<a href="#" class="dropdown-item" data-action="app-print">
									<span data-i18n="drpdwn.print">Print</span>
									<i class="float-right text-muted fw-n">Ctrl + P</i>
								</a>
								<div class="dropdown-multilevel dropdown-multilevel-left">
									<div class="dropdown-item">Language</div>
									<div class="dropdown-menu">
										<a
											href="#?lang=fr"
											class="dropdown-item"
											data-action="lang"
											data-lang="fr"
											>Français</a
										>
										<a
											href="#?lang=en"
											class="dropdown-item active"
											data-action="lang"
											data-lang="en"
											>English (US)</a
										>
										<a
											href="#?lang=es"
											class="dropdown-item"
											data-action="lang"
											data-lang="es"
											>Español</a
										>
										<a
											href="#?lang=ru"
											class="dropdown-item"
											data-action="lang"
											data-lang="ru"
											>Русский язык</a
										>
										<a
											href="#?lang=jp"
											class="dropdown-item"
											data-action="lang"
											data-lang="jp"
											>日本語</a
										>
										<a
											href="#?lang=ch"
											class="dropdown-item"
											data-action="lang"
											data-lang="ch"
											>中文</a
										>
									</div>
								</div>
								<div class="dropdown-divider m-0"></div>
								<a
									class="dropdown-item fw-500 pt-3 pb-3"
									href="page_login.html"
								>
									<span data-i18n="drpdwn.page-logout">Logout</span>
									<span class="float-right fw-n">&commat;codexlantern</span>
								</a>
							</div>
						</div>
					</div>
				</header>
				<!-- END Page Header -->
				<!-- BEGIN Page Content -->
				<!-- the #js-page-content id is needed for some plugins to initialize -->
					<div class="row">
						<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="{{ url('storage/img/images/img-14.jpg')}}" data-src="" alt="First slide [800x400]" data-holder-rendered="true">
									<div class="carousel-caption d-none d-md-block">
										<h1 class="display-3">First slide label</h1>
										<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
									</div>
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="{{ url('storage/img/images/img-27.jpg')}}" data-src="" alt="Second slide [800x400]" data-holder-rendered="true">
									<div class="carousel-caption d-none d-md-block" style="text-align: left !important">
										<h1 class="display-3">Second slide label</h1>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									</div>
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>

					</div>
				<main id="js-page-content" role="main" class="page-content mt-5">
					<!-- Your main content goes below here: -->
					<div class="row">
						<div class="col-xl-6">
							<div id="panel-1" class="panel">
								<div class="panel-hdr">
									<h2>
										Panel <span class="fw-300"><i>Title</i></span>
									</h2>
									<div class="panel-toolbar">
										<button
											class="btn btn-panel"
											data-action="panel-collapse"
											data-toggle="tooltip"
											data-offset="0,10"
											data-original-title="Collapse"
										></button>
										<button
											class="btn btn-panel"
											data-action="panel-fullscreen"
											data-toggle="tooltip"
											data-offset="0,10"
											data-original-title="Fullscreen"
										></button>
										<button
											class="btn btn-panel"
											data-action="panel-close"
											data-toggle="tooltip"
											data-offset="0,10"
											data-original-title="Close"
										></button>
									</div>
								</div>
								<div class="panel-container show">
									<div class="panel-content">
										<div class="panel-tag">
											It stash and was even had of collection the latest story
											still every or times derive come way. Travelling
											business ill. Helplessly starting didn't should he her
											bad will so through audiences to the supported congress,
											if card with was way allows century quarter the control
											village for of payload.
										</div>
										<p>
											Offers it children. Been far good the or so eye. And
											first the her to white unionized that the absolutely
											supplies hall to named accuse times had or the to in the
											monitor a by carefully and than train excessive turned
											been a rationale to be the little. Agency still a the
											supported or people out doing place what does one
											studies of that value designer the you line their
											transformed extent, you to for not must reflection
											chequered with got rush than because he with thoughts
											until sisters term much and bed they of duty
											organization. And ago. As.
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div id="panel-1" class="panel">
								<div class="panel-hdr">
									<h2>
										Panel <span class="fw-300"><i>Title</i></span>
									</h2>
									<div class="panel-toolbar">
										<button
											class="btn btn-panel"
											data-action="panel-collapse"
											data-toggle="tooltip"
											data-offset="0,10"
											data-original-title="Collapse"
										></button>
										<button
											class="btn btn-panel"
											data-action="panel-fullscreen"
											data-toggle="tooltip"
											data-offset="0,10"
											data-original-title="Fullscreen"
										></button>
										<button
											class="btn btn-panel"
											data-action="panel-close"
											data-toggle="tooltip"
											data-offset="0,10"
											data-original-title="Close"
										></button>
									</div>
								</div>
								<div class="panel-container show">
									<div class="panel-content">
										<div class="panel-tag">
											It stash and was even had of collection the latest story
											still every or times derive come way. Travelling
											business ill. Helplessly starting didn't should he her
											bad will so through audiences to the supported congress,
											if card with was way allows century quarter the control
											village for of payload.
										</div>
										<p>
											Offers it children. Been far good the or so eye. And
											first the her to white unionized that the absolutely
											supplies hall to named accuse times had or the to in the
											monitor a by carefully and than train excessive turned
											been a rationale to be the little. Agency still a the
											supported or people out doing place what does one
											studies of that value designer the you line their
											transformed extent, you to for not must reflection
											chequered with got rush than because he with thoughts
											until sisters term much and bed they of duty
											organization. And ago. As.
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12">
							<div id="panel-1" class="panel">
								<div class="panel-hdr">
									<h2>
										Panel <span class="fw-300"><i>Title</i></span>
									</h2>
									<div class="panel-toolbar">
										<button
											class="btn btn-panel"
											data-action="panel-collapse"
											data-toggle="tooltip"
											data-offset="0,10"
											data-original-title="Collapse"
										></button>
										<button
											class="btn btn-panel"
											data-action="panel-fullscreen"
											data-toggle="tooltip"
											data-offset="0,10"
											data-original-title="Fullscreen"
										></button>
										<button
											class="btn btn-panel"
											data-action="panel-close"
											data-toggle="tooltip"
											data-offset="0,10"
											data-original-title="Close"
										></button>
									</div>
								</div>
								<div class="panel-container show">
									<div class="panel-content">
										<div class="panel-tag">
											It stash and was even had of collection the latest story
											still every or times derive come way. Travelling
											business ill. Helplessly starting didn't should he her
											bad will so through audiences to the supported congress,
											if card with was way allows century quarter the control
											village for of payload.
										</div>
										<p>
											Offers it children. Been far good the or so eye. And
											first the her to white unionized that the absolutely
											supplies hall to named accuse times had or the to in the
											monitor a by carefully and than train excessive turned
											been a rationale to be the little. Agency still a the
											supported or people out doing place what does one
											studies of that value designer the you line their
											transformed extent, you to for not must reflection
											chequered with got rush than because he with thoughts
											until sisters term much and bed they of duty
											organization. And ago. As.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
				<!-- this overlay is activated only when mobile menu is triggered -->
				<div
					class="page-content-overlay"
					data-action="toggle"
					data-class="mobile-nav-on"
				></div>
				<!-- END Page Content -->
				<!-- BEGIN Page Footer -->
				<footer class="page-footer" role="contentinfo">
					<div class="d-flex align-items-center flex-1 text-muted">
						<span class="hidden-md-down fw-700"
							>2020 © SmartAdmin by&nbsp;<a
								href="https://www.gotbootstrap.com"
								class="text-primary fw-500"
								title="gotbootstrap.com"
								target="_blank"
								>gotbootstrap.com</a
							></span
						>
					</div>
					<div>
						<ul class="list-table m-0">
							<li>
								<a
									href="intel_introduction.html"
									class="text-secondary fw-700"
									>About</a
								>
							</li>
							<li class="pl-3">
								<a
									href="info_app_licensing.html"
									class="text-secondary fw-700"
									>License</a
								>
							</li>
							<li class="pl-3">
								<a href="info_app_docs.html" class="text-secondary fw-700"
									>Documentation</a
								>
							</li>
							<li class="pl-3 fs-xl">
								<a
									href="https://wrapbootstrap.com/user/MyOrange"
									class="text-secondary"
									target="_blank"
									><i class="fal fa-question-circle" aria-hidden="true"></i
								></a>
							</li>
						</ul>
					</div>
				</footer>
				<!-- END Page Footer -->
				<!-- BEGIN Shortcuts -->
				<div
					class="modal fade modal-backdrop-transparent"
					id="modal-shortcut"
					tabindex="-1"
					role="dialog"
					aria-labelledby="modal-shortcut"
					aria-hidden="true"
				>
					<div
						class="modal-dialog modal-dialog-top modal-transparent"
						role="document"
					>
						<div class="modal-content">
							<div class="modal-body">
								<ul class="app-list w-auto h-auto p-0 text-left">
									<li>
										<a
											href="intel_introduction.html"
											class="app-list-item text-white border-0 m-0"
										>
											<div class="icon-stack">
												<i
													class="base base-7 icon-stack-3x opacity-100 color-primary-500"
												></i>
												<i
													class="base base-7 icon-stack-2x opacity-100 color-primary-300"
												></i>
												<i
													class="fal fa-home icon-stack-1x opacity-100 color-white"
												></i>
											</div>
											<span class="app-list-name"> Home </span>
										</a>
									</li>
									<li>
										<a
											href="page_inbox_general.html"
											class="app-list-item text-white border-0 m-0"
										>
											<div class="icon-stack">
												<i
													class="base base-7 icon-stack-3x opacity-100 color-success-500"
												></i>
												<i
													class="base base-7 icon-stack-2x opacity-100 color-success-300"
												></i>
												<i
													class="ni ni-envelope icon-stack-1x text-white"
												></i>
											</div>
											<span class="app-list-name"> Inbox </span>
										</a>
									</li>
									<li>
										<a
											href="intel_introduction.html"
											class="app-list-item text-white border-0 m-0"
										>
											<div class="icon-stack">
												<i
													class="base base-7 icon-stack-2x opacity-100 color-primary-300"
												></i>
												<i
													class="fal fa-plus icon-stack-1x opacity-100 color-white"
												></i>
											</div>
											<span class="app-list-name"> Add More </span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- END Shortcuts -->
				<!-- BEGIN Color profile -->
				<!-- this area is hidden and will not be seen on screens or screen readers -->
				<!-- we use this only for CSS color refernce for JS stuff -->
				<p id="js-color-profile" class="d-none">
					<span class="color-primary-50"></span>
					<span class="color-primary-100"></span>
					<span class="color-primary-200"></span>
					<span class="color-primary-300"></span>
					<span class="color-primary-400"></span>
					<span class="color-primary-500"></span>
					<span class="color-primary-600"></span>
					<span class="color-primary-700"></span>
					<span class="color-primary-800"></span>
					<span class="color-primary-900"></span>
					<span class="color-info-50"></span>
					<span class="color-info-100"></span>
					<span class="color-info-200"></span>
					<span class="color-info-300"></span>
					<span class="color-info-400"></span>
					<span class="color-info-500"></span>
					<span class="color-info-600"></span>
					<span class="color-info-700"></span>
					<span class="color-info-800"></span>
					<span class="color-info-900"></span>
					<span class="color-danger-50"></span>
					<span class="color-danger-100"></span>
					<span class="color-danger-200"></span>
					<span class="color-danger-300"></span>
					<span class="color-danger-400"></span>
					<span class="color-danger-500"></span>
					<span class="color-danger-600"></span>
					<span class="color-danger-700"></span>
					<span class="color-danger-800"></span>
					<span class="color-danger-900"></span>
					<span class="color-warning-50"></span>
					<span class="color-warning-100"></span>
					<span class="color-warning-200"></span>
					<span class="color-warning-300"></span>
					<span class="color-warning-400"></span>
					<span class="color-warning-500"></span>
					<span class="color-warning-600"></span>
					<span class="color-warning-700"></span>
					<span class="color-warning-800"></span>
					<span class="color-warning-900"></span>
					<span class="color-success-50"></span>
					<span class="color-success-100"></span>
					<span class="color-success-200"></span>
					<span class="color-success-300"></span>
					<span class="color-success-400"></span>
					<span class="color-success-500"></span>
					<span class="color-success-600"></span>
					<span class="color-success-700"></span>
					<span class="color-success-800"></span>
					<span class="color-success-900"></span>
					<span class="color-fusion-50"></span>
					<span class="color-fusion-100"></span>
					<span class="color-fusion-200"></span>
					<span class="color-fusion-300"></span>
					<span class="color-fusion-400"></span>
					<span class="color-fusion-500"></span>
					<span class="color-fusion-600"></span>
					<span class="color-fusion-700"></span>
					<span class="color-fusion-800"></span>
					<span class="color-fusion-900"></span>
				</p>
				<!-- END Color profile -->
			</div>
		</div>
	</div>
	<!-- END Page Wrapper -->
	<!-- BEGIN Quick Menu -->
	<!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
	<nav class="shortcut-menu d-none d-sm-block">
		<input
			type="checkbox"
			class="menu-open"
			name="menu-open"
			id="menu_open"
		/>
		<label for="menu_open" class="menu-open-button">
			<span class="app-shortcut-icon d-block"></span>
		</label>
		<a
			href="#"
			class="menu-item btn"
			data-toggle="tooltip"
			data-placement="left"
			title="Scroll Top"
		>
			<i class="fal fa-arrow-up"></i>
		</a>
		<a
			href="page_login.html"
			class="menu-item btn"
			data-toggle="tooltip"
			data-placement="left"
			title="Logout"
		>
			<i class="fal fa-sign-out"></i>
		</a>
		<a
			href="#"
			class="menu-item btn"
			data-action="app-fullscreen"
			data-toggle="tooltip"
			data-placement="left"
			title="Full Screen"
		>
			<i class="fal fa-expand"></i>
		</a>
		<a
			href="#"
			class="menu-item btn"
			data-action="app-print"
			data-toggle="tooltip"
			data-placement="left"
			title="Print page"
		>
			<i class="fal fa-print"></i>
		</a>
		<a
			href="#"
			class="menu-item btn"
			data-action="app-voice"
			data-toggle="tooltip"
			data-placement="left"
			title="Voice command"
		>
			<i class="fal fa-microphone"></i>
		</a>
	</nav>
	<!-- END Quick Menu -->
	<!-- BEGIN Messenger -->
	<div
		class="modal fade js-modal-messenger modal-backdrop-transparent"
		tabindex="-1"
		role="dialog"
		aria-hidden="true"
	>
		<div class="modal-dialog modal-dialog-right">
			<div class="modal-content h-100">
				<div
					class="dropdown-header bg-trans-gradient d-flex align-items-center w-100"
				>
					<div
						class="d-flex flex-row align-items-center mt-1 mb-1 color-white"
					>
						<span class="mr-2">
							<span
								class="rounded-circle profile-image d-block"
								style="
									background-image: url('img/demo/avatars/avatar-d.png');
									background-size: cover;
								"
							></span>
						</span>
						<div class="info-card-text">
							<a
								href="javascript:void(0);"
								class="fs-lg text-truncate text-truncate-lg text-white"
								data-toggle="dropdown"
								aria-expanded="false"
							>
								Tracey Chang
								<i
									class="fal fa-angle-down d-inline-block ml-1 text-white fs-md"
								></i>
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#">Send Email</a>
								<a class="dropdown-item" href="#">Create Appointment</a>
								<a class="dropdown-item" href="#">Block User</a>
							</div>
							<span class="text-truncate text-truncate-md opacity-80"
								>IT Director</span
							>
						</div>
					</div>
					<button
						type="button"
						class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2"
						data-dismiss="modal"
						aria-label="Close"
					>
						<span aria-hidden="true"><i class="fal fa-times"></i></span>
					</button>
				</div>
				<div class="modal-body p-0 h-100 d-flex">
					<!-- BEGIN msgr-list -->
					<div
						class="msgr-list d-flex flex-column bg-faded border-faded border-top-0 border-right-0 border-bottom-0 position-absolute pos-top pos-bottom"
					>
						<div>
							<div
								class="height-4 width-3 h3 m-0 d-flex justify-content-center flex-column color-primary-500 pl-3 mt-2"
							>
								<i class="fal fa-search"></i>
							</div>
							<input
								type="text"
								class="form-control bg-white"
								id="msgr_listfilter_input"
								placeholder="Filter contacts"
								aria-label="FriendSearch"
								data-listfilter="#js-msgr-listfilter"
							/>
						</div>
						<div class="flex-1 h-100 custom-scroll">
							<div class="w-100">
								<ul id="js-msgr-listfilter" class="list-unstyled m-0">
									<li>
										<a
											href="#"
											class="d-table w-100 px-2 py-2 text-dark hover-white"
											data-filter-tags="tracey chang online"
										>
											<div
												class="d-table-cell align-middle status status-success status-sm"
											>
												<span
													class="profile-image-md rounded-circle d-block"
													style="
														background-image: url('img/demo/avatars/avatar-d.png');
														background-size: cover;
													"
												></span>
											</div>
											<div class="d-table-cell w-100 align-middle pl-2 pr-2">
												<div class="text-truncate text-truncate-md">
													Tracey Chang
													<small
														class="d-block font-italic text-success fs-xs"
													>
														Online
													</small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a
											href="#"
											class="d-table w-100 px-2 py-2 text-dark hover-white"
											data-filter-tags="oliver kopyuv online"
										>
											<div
												class="d-table-cell align-middle status status-success status-sm"
											>
												<span
													class="profile-image-md rounded-circle d-block"
													style="
														background-image: url('img/demo/avatars/avatar-b.png');
														background-size: cover;
													"
												></span>
											</div>
											<div class="d-table-cell w-100 align-middle pl-2 pr-2">
												<div class="text-truncate text-truncate-md">
													Oliver Kopyuv
													<small
														class="d-block font-italic text-success fs-xs"
													>
														Online
													</small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a
											href="#"
											class="d-table w-100 px-2 py-2 text-dark hover-white"
											data-filter-tags="dr john cook phd away"
										>
											<div
												class="d-table-cell align-middle status status-warning status-sm"
											>
												<span
													class="profile-image-md rounded-circle d-block"
													style="
														background-image: url('img/demo/avatars/avatar-e.png');
														background-size: cover;
													"
												></span>
											</div>
											<div class="d-table-cell w-100 align-middle pl-2 pr-2">
												<div class="text-truncate text-truncate-md">
													Dr. John Cook PhD
													<small class="d-block font-italic fs-xs">
														Away
													</small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a
											href="#"
											class="d-table w-100 px-2 py-2 text-dark hover-white"
											data-filter-tags="ali amdaney online"
										>
											<div
												class="d-table-cell align-middle status status-success status-sm"
											>
												<span
													class="profile-image-md rounded-circle d-block"
													style="
														background-image: url('img/demo/avatars/avatar-g.png');
														background-size: cover;
													"
												></span>
											</div>
											<div class="d-table-cell w-100 align-middle pl-2 pr-2">
												<div class="text-truncate text-truncate-md">
													Ali Amdaney
													<small
														class="d-block font-italic fs-xs text-success"
													>
														Online
													</small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a
											href="#"
											class="d-table w-100 px-2 py-2 text-dark hover-white"
											data-filter-tags="sarah mcbrook online"
										>
											<div
												class="d-table-cell align-middle status status-success status-sm"
											>
												<span
													class="profile-image-md rounded-circle d-block"
													style="
														background-image: url('img/demo/avatars/avatar-h.png');
														background-size: cover;
													"
												></span>
											</div>
											<div class="d-table-cell w-100 align-middle pl-2 pr-2">
												<div class="text-truncate text-truncate-md">
													Sarah McBrook
													<small
														class="d-block font-italic fs-xs text-success"
													>
														Online
													</small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a
											href="#"
											class="d-table w-100 px-2 py-2 text-dark hover-white"
											data-filter-tags="ali amdaney offline"
										>
											<div class="d-table-cell align-middle status status-sm">
												<span
													class="profile-image-md rounded-circle d-block"
													style="
														background-image: url('img/demo/avatars/avatar-a.png');
														background-size: cover;
													"
												></span>
											</div>
											<div class="d-table-cell w-100 align-middle pl-2 pr-2">
												<div class="text-truncate text-truncate-md">
													oliver.kopyuv@gotbootstrap.com
													<small class="d-block font-italic fs-xs">
														Offline
													</small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a
											href="#"
											class="d-table w-100 px-2 py-2 text-dark hover-white"
											data-filter-tags="ali amdaney busy"
										>
											<div
												class="d-table-cell align-middle status status-danger status-sm"
											>
												<span
													class="profile-image-md rounded-circle d-block"
													style="
														background-image: url('img/demo/avatars/avatar-j.png');
														background-size: cover;
													"
												></span>
											</div>
											<div class="d-table-cell w-100 align-middle pl-2 pr-2">
												<div class="text-truncate text-truncate-md">
													oliver.kopyuv@gotbootstrap.com
													<small
														class="d-block font-italic fs-xs text-danger"
													>
														Busy
													</small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a
											href="#"
											class="d-table w-100 px-2 py-2 text-dark hover-white"
											data-filter-tags="ali amdaney offline"
										>
											<div class="d-table-cell align-middle status status-sm">
												<span
													class="profile-image-md rounded-circle d-block"
													style="
														background-image: url('img/demo/avatars/avatar-c.png');
														background-size: cover;
													"
												></span>
											</div>
											<div class="d-table-cell w-100 align-middle pl-2 pr-2">
												<div class="text-truncate text-truncate-md">
													oliver.kopyuv@gotbootstrap.com
													<small class="d-block font-italic fs-xs">
														Offline
													</small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a
											href="#"
											class="d-table w-100 px-2 py-2 text-dark hover-white"
											data-filter-tags="ali amdaney inactive"
										>
											<div class="d-table-cell align-middle">
												<span
													class="profile-image-md rounded-circle d-block"
													style="
														background-image: url('img/demo/avatars/avatar-m.png');
														background-size: cover;
													"
												></span>
											</div>
											<div class="d-table-cell w-100 align-middle pl-2 pr-2">
												<div class="text-truncate text-truncate-md">
													+714651347790
													<small class="d-block font-italic fs-xs opacity-50">
														Missed Call
													</small>
												</div>
											</div>
										</a>
									</li>
								</ul>
								<div class="filter-message js-filter-message"></div>
							</div>
						</div>
						<div>
							<a class="fs-xl d-flex align-items-center p-3">
								<i class="fal fa-cogs"></i>
							</a>
						</div>
					</div>
					<!-- END msgr-list -->
					<!-- BEGIN msgr -->
					<div class="msgr d-flex h-100 flex-column bg-white">
						<!-- BEGIN custom-scroll -->
						<div class="custom-scroll flex-1 h-100">
							<div id="chat_container" class="w-100 p-4">
								<!-- start .chat-segment -->
								<div class="chat-segment">
									<div class="time-stamp text-center mb-2 fw-400">Jun 19</div>
								</div>
								<!--  end .chat-segment -->
								<!-- start .chat-segment -->
								<div class="chat-segment chat-segment-sent">
									<div class="chat-message">
										<p>Hey Tracey, did you get my files?</p>
									</div>
									<div class="text-right fw-300 text-muted mt-1 fs-xs">
										3:00 pm
									</div>
								</div>
								<!--  end .chat-segment -->
								<!-- start .chat-segment -->
								<div class="chat-segment chat-segment-get">
									<div class="chat-message">
										<p>Hi</p>
										<p>
											Sorry going through a busy time in office. Yes I
											analyzed the solution.
										</p>
										<p>
											It will require some resource, which I could not manage.
										</p>
									</div>
									<div class="fw-300 text-muted mt-1 fs-xs">3:24 pm</div>
								</div>
								<!--  end .chat-segment -->
								<!-- start .chat-segment -->
								<div class="chat-segment chat-segment-sent chat-start">
									<div class="chat-message">
										<p>Okay</p>
									</div>
								</div>
								<!--  end .chat-segment -->
								<!-- start .chat-segment -->
								<div class="chat-segment chat-segment-sent chat-end">
									<div class="chat-message">
										<p>
											Sending you some dough today, you can allocate the
											resources to this project.
										</p>
									</div>
									<div class="text-right fw-300 text-muted mt-1 fs-xs">
										3:26 pm
									</div>
								</div>
								<!--  end .chat-segment -->
								<!-- start .chat-segment -->
								<div class="chat-segment chat-segment-get chat-start">
									<div class="chat-message">
										<p>Perfect. Thanks a lot!</p>
									</div>
								</div>
								<!--  end .chat-segment -->
								<!-- start .chat-segment -->
								<div class="chat-segment chat-segment-get">
									<div class="chat-message">
										<p>I will have them ready by tonight.</p>
									</div>
								</div>
								<!--  end .chat-segment -->
								<!-- start .chat-segment -->
								<div class="chat-segment chat-segment-get chat-end">
									<div class="chat-message">
										<p>Cheers</p>
									</div>
								</div>
								<!--  end .chat-segment -->
								<!-- start .chat-segment for timestamp -->
								<div class="chat-segment">
									<div class="time-stamp text-center mb-2 fw-400">Jun 20</div>
								</div>
								<!--  end .chat-segment for timestamp -->
							</div>
						</div>
						<!-- END custom-scroll  -->
						<!-- BEGIN msgr__chatinput -->
						<div class="d-flex flex-column">
							<div
								class="border-faded border-right-0 border-bottom-0 border-left-0 flex-1 mr-3 ml-3 position-relative shadow-top"
							>
								<div class="pt-3 pb-1 pr-0 pl-0 rounded-0" tabindex="-1">
									<div
										id="msgr_input"
										contenteditable="true"
										data-placeholder="Type your message here..."
										class="height-10 form-content-editable"
									></div>
								</div>
							</div>
							<div
								class="height-8 px-3 d-flex flex-row align-items-center flex-wrap flex-shrink-0"
							>
								<a
									href="javascript:void(0);"
									class="btn btn-icon fs-xl width-1 mr-1"
									data-toggle="tooltip"
									data-original-title="More options"
									data-placement="top"
								>
									<i class="fal fa-ellipsis-v-alt color-fusion-300"></i>
								</a>
								<a
									href="javascript:void(0);"
									class="btn btn-icon fs-xl mr-1"
									data-toggle="tooltip"
									data-original-title="Attach files"
									data-placement="top"
								>
									<i class="fal fa-paperclip color-fusion-300"></i>
								</a>
								<a
									href="javascript:void(0);"
									class="btn btn-icon fs-xl mr-1"
									data-toggle="tooltip"
									data-original-title="Insert photo"
									data-placement="top"
								>
									<i class="fal fa-camera color-fusion-300"></i>
								</a>
								<div class="ml-auto">
									<a href="javascript:void(0);" class="btn btn-info">Send</a>
								</div>
							</div>
						</div>
						<!-- END msgr__chatinput -->
					</div>
					<!-- END msgr -->
				</div>
			</div>
		</div>
	</div>
	<!-- END Messenger -->
	<!-- BEGIN Page Settings -->
	<div
		class="modal fade js-modal-settings modal-backdrop-transparent"
		tabindex="-1"
		role="dialog"
		aria-hidden="true"
	>
		<div class="modal-dialog modal-dialog-right modal-md">
			<div class="modal-content">
				<div
					class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100"
				>
					<h4 class="m-0 text-center color-white">
						Layout Settings
						<small class="mb-0 opacity-80">User Interface Settings</small>
					</h4>
					<button
						type="button"
						class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2"
						data-dismiss="modal"
						aria-label="Close"
					>
						<span aria-hidden="true"><i class="fal fa-times"></i></span>
					</button>
				</div>
				<div class="modal-body p-0">
					<div class="settings-panel">
						<div class="mt-4 d-table w-100 px-5">
							<div class="d-table-cell align-middle">
								<h5 class="p-0">App Layout</h5>
							</div>
						</div>
						<div class="list" id="fh">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="header-function-fixed"
							></a>
							<span class="onoffswitch-title">Fixed Header</span>
							<span class="onoffswitch-title-desc"
								>header is in a fixed at all times</span
							>
						</div>
						<div class="list" id="nff">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="nav-function-fixed"
							></a>
							<span class="onoffswitch-title">Fixed Navigation</span>
							<span class="onoffswitch-title-desc">left panel is fixed</span>
						</div>
						<div class="list" id="nfm">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="nav-function-minify"
							></a>
							<span class="onoffswitch-title">Minify Navigation</span>
							<span class="onoffswitch-title-desc"
								>Skew nav to maximize space</span
							>
						</div>
						<div class="list" id="nfh">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="nav-function-hidden"
							></a>
							<span class="onoffswitch-title">Hide Navigation</span>
							<span class="onoffswitch-title-desc"
								>roll mouse on edge to reveal</span
							>
						</div>
						<div class="list" id="nft">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="nav-function-top"
							></a>
							<span class="onoffswitch-title">Top Navigation</span>
							<span class="onoffswitch-title-desc"
								>Relocate left pane to top</span
							>
						</div>
						<div class="list" id="fff">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="footer-function-fixed"
							></a>
							<span class="onoffswitch-title">Fixed Footer</span>
							<span class="onoffswitch-title-desc">page footer is fixed</span>
						</div>
						<div class="list" id="mmb">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-main-boxed"
							></a>
							<span class="onoffswitch-title">Boxed Layout</span>
							<span class="onoffswitch-title-desc"
								>Encapsulates to a container</span
							>
						</div>
						<div class="expanded">
							<ul class="mb-3 mt-1">
								<li>
									<div
										class="bg-fusion-50"
										data-action="toggle"
										data-class="mod-bg-1"
									></div>
								</li>
								<li>
									<div
										class="bg-warning-200"
										data-action="toggle"
										data-class="mod-bg-2"
									></div>
								</li>
								<li>
									<div
										class="bg-primary-200"
										data-action="toggle"
										data-class="mod-bg-3"
									></div>
								</li>
								<li>
									<div
										class="bg-success-300"
										data-action="toggle"
										data-class="mod-bg-4"
									></div>
								</li>
								<li>
									<div
										class="bg-white border"
										data-action="toggle"
										data-class="mod-bg-none"
									></div>
								</li>
							</ul>
							<div class="list" id="mbgf">
								<a
									href="#"
									onclick="return false;"
									class="btn btn-switch"
									data-action="toggle"
									data-class="mod-fixed-bg"
								></a>
								<span class="onoffswitch-title">Fixed Background</span>
							</div>
						</div>
						<div class="mt-4 d-table w-100 px-5">
							<div class="d-table-cell align-middle">
								<h5 class="p-0">Mobile Menu</h5>
							</div>
						</div>
						<div class="list" id="nmp">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="nav-mobile-push"
							></a>
							<span class="onoffswitch-title">Push Content</span>
							<span class="onoffswitch-title-desc"
								>Content pushed on menu reveal</span
							>
						</div>
						<div class="list" id="nmno">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="nav-mobile-no-overlay"
							></a>
							<span class="onoffswitch-title">No Overlay</span>
							<span class="onoffswitch-title-desc"
								>Removes mesh on menu reveal</span
							>
						</div>
						<div class="list" id="sldo">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="nav-mobile-slide-out"
							></a>
							<span class="onoffswitch-title"
								>Off-Canvas <sup>(beta)</sup></span
							>
							<span class="onoffswitch-title-desc"
								>Content overlaps menu</span
							>
						</div>
						<div class="mt-4 d-table w-100 px-5">
							<div class="d-table-cell align-middle">
								<h5 class="p-0">Accessibility</h5>
							</div>
						</div>
						<div class="list" id="mbf">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-bigger-font"
							></a>
							<span class="onoffswitch-title">Bigger Content Font</span>
							<span class="onoffswitch-title-desc"
								>content fonts are bigger for readability</span
							>
						</div>
						<div class="list" id="mhc">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-high-contrast"
							></a>
							<span class="onoffswitch-title"
								>High Contrast Text (WCAG 2 AA)</span
							>
							<span class="onoffswitch-title-desc"
								>4.5:1 text contrast ratio</span
							>
						</div>
						<div class="list" id="mcb">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-color-blind"
							></a>
							<span class="onoffswitch-title"
								>Daltonism <sup>(beta)</sup>
							</span>
							<span class="onoffswitch-title-desc"
								>color vision deficiency</span
							>
						</div>
						<div class="list" id="mpc">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-pace-custom"
							></a>
							<span class="onoffswitch-title">Preloader Inside</span>
							<span class="onoffswitch-title-desc"
								>preloader will be inside content</span
							>
						</div>
						<div class="list" id="mpi">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-panel-icon"
							></a>
							<span class="onoffswitch-title"
								>SmartPanel Icons (not Panels)</span
							>
							<span class="onoffswitch-title-desc"
								>smartpanel buttons will appear as icons</span
							>
						</div>
						<div class="mt-4 d-table w-100 px-5">
							<div class="d-table-cell align-middle">
								<h5 class="p-0">Global Modifications</h5>
							</div>
						</div>
						<div class="list" id="mcbg">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-clean-page-bg"
							></a>
							<span class="onoffswitch-title">Clean Page Background</span>
							<span class="onoffswitch-title-desc">adds more whitespace</span>
						</div>
						<div class="list" id="mhni">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-hide-nav-icons"
							></a>
							<span class="onoffswitch-title">Hide Navigation Icons</span>
							<span class="onoffswitch-title-desc"
								>invisible navigation icons</span
							>
						</div>
						<div class="list" id="dan">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-disable-animation"
							></a>
							<span class="onoffswitch-title">Disable CSS Animation</span>
							<span class="onoffswitch-title-desc"
								>Disables CSS based animations</span
							>
						</div>
						<div class="list" id="mhic">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-hide-info-card"
							></a>
							<span class="onoffswitch-title">Hide Info Card</span>
							<span class="onoffswitch-title-desc"
								>Hides info card from left panel</span
							>
						</div>
						<div class="list" id="mlph">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-lean-subheader"
							></a>
							<span class="onoffswitch-title">Lean Subheader</span>
							<span class="onoffswitch-title-desc"
								>distinguished page header</span
							>
						</div>
						<div class="list" id="mnl">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-nav-link"
							></a>
							<span class="onoffswitch-title">Hierarchical Navigation</span>
							<span class="onoffswitch-title-desc"
								>Clear breakdown of nav links</span
							>
						</div>
						<div class="list" id="mdn">
							<a
								href="#"
								onclick="return false;"
								class="btn btn-switch"
								data-action="toggle"
								data-class="mod-nav-dark"
							></a>
							<span class="onoffswitch-title">Dark Navigation</span>
							<span class="onoffswitch-title-desc"
								>Navigation background is darkend</span
							>
						</div>
						<hr class="mb-0 mt-4" />
						<div class="mt-4 d-table w-100 pl-5 pr-3">
							<div class="d-table-cell align-middle">
								<h5 class="p-0">Global Font Size</h5>
							</div>
						</div>
						<div class="list mt-1">
							<div
								class="btn-group btn-group-sm btn-group-toggle my-2"
								data-toggle="buttons"
							>
								<label
									class="btn btn-default btn-sm"
									data-action="toggle-swap"
									data-class="root-text-sm"
									data-target="html"
								>
									<input type="radio" name="changeFrontSize" /> SM
								</label>
								<label
									class="btn btn-default btn-sm"
									data-action="toggle-swap"
									data-class="root-text"
									data-target="html"
								>
									<input type="radio" name="changeFrontSize" checked="" /> MD
								</label>
								<label
									class="btn btn-default btn-sm"
									data-action="toggle-swap"
									data-class="root-text-lg"
									data-target="html"
								>
									<input type="radio" name="changeFrontSize" /> LG
								</label>
								<label
									class="btn btn-default btn-sm"
									data-action="toggle-swap"
									data-class="root-text-xl"
									data-target="html"
								>
									<input type="radio" name="changeFrontSize" /> XL
								</label>
							</div>
							<span class="onoffswitch-title-desc d-block mb-0"
								>Change <strong>root</strong> font size to effect rem values
								(resets on page refresh)</span
							>
						</div>
						<hr class="mb-0 mt-4" />
						<div class="mt-4 d-table w-100 pl-5 pr-3">
							<div class="d-table-cell align-middle">
								<h5 class="p-0 pr-2 d-flex">
									Theme colors
									<a
										href="#"
										class="ml-auto fw-400 fs-xs"
										data-toggle="popover"
										data-trigger="focus"
										data-placement="top"
										title=""
										data-html="true"
										data-content="The settings below uses <code>localStorage</code> to load the external <strong>CSS</strong> file as an overlap to the base css. Due to network latency and <strong>CPU utilization</strong>, you may experience a brief flickering effect on page load which may show the intial applied theme for a split second. Setting the prefered style/theme in the header will prevent this from happening."
										data-original-title="<span class='text-primary'><i class='fal fa-exclamation-triangle mr-1'></i> Heads up!</span>"
										data-template='<div class="popover bg-white border-white" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body fs-xs"></div></div>'
										><i class="fal fa-info-circle mr-1"></i> more info</a
									>
								</h5>
							</div>
						</div>
						<div class="expanded theme-colors pl-5 pr-3">
							<ul class="m-0">
								<li>
									<a
										href="#"
										id="myapp-0"
										data-action="theme-update"
										data-themesave
										data-theme=""
										data-toggle="tooltip"
										data-placement="top"
										title="Wisteria (base css)"
										data-original-title="Wisteria (base css)"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-1"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-1.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Tapestry"
										data-original-title="Tapestry"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-2"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-2.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Atlantis"
										data-original-title="Atlantis"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-3"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-3.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Indigo"
										data-original-title="Indigo"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-4"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-4.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Dodger Blue"
										data-original-title="Dodger Blue"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-5"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-5.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Tradewind"
										data-original-title="Tradewind"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-6"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-6.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Cranberry"
										data-original-title="Cranberry"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-7"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-7.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Oslo Gray"
										data-original-title="Oslo Gray"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-8"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-8.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Chetwode Blue"
										data-original-title="Chetwode Blue"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-9"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-9.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Apricot"
										data-original-title="Apricot"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-10"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-10.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Blue Smoke"
										data-original-title="Blue Smoke"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-11"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-11.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Green Smoke"
										data-original-title="Green Smoke"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-12"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-12.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Wild Blue Yonder"
										data-original-title="Wild Blue Yonder"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-13"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-13.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Emerald"
										data-original-title="Emerald"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-14"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-14.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Supernova"
										data-original-title="Supernova"
									></a>
								</li>
								<li>
									<a
										href="#"
										id="myapp-15"
										data-action="theme-update"
										data-themesave
										data-theme="css/themes/cust-theme-15.css"
										data-toggle="tooltip"
										data-placement="top"
										title="Hoki"
										data-original-title="Hoki"
									></a>
								</li>
							</ul>
						</div>
						<hr class="mb-0 mt-4" />
						<div class="mt-4 d-table w-100 pl-5 pr-3">
							<div class="d-table-cell align-middle">
								<h5 class="p-0 pr-2 d-flex">
									Theme Modes (beta)
									<a
										href="#"
										class="ml-auto fw-400 fs-xs"
										data-toggle="popover"
										data-trigger="focus"
										data-placement="top"
										title=""
										data-html="true"
										data-content="This is a brand new technique we are introducing which uses CSS variables to infiltrate color options. While this has been working nicely on modern browsers without much issues, some users <strong>may still face issues on Internet Explorer </strong>. Until these issues are resolved or Internet Explorer improves, this feature will remain in Beta"
										data-original-title="<span class='text-primary'><i class='fal fa-question-circle mr-1'></i> Why beta?</span>"
										data-template='<div class="popover bg-white border-white" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body fs-xs"></div></div>'
										><i class="fal fa-question-circle mr-1"></i> why beta?</a
									>
								</h5>
							</div>
						</div>
						<div class="pl-5 pr-3 py-3">
							<div class="ie-only alert alert-warning d-none">
								<h6>Internet Explorer Issue</h6>
								This particular component may not work as expected in Internet
								Explorer. Please use with caution.
							</div>
							<div class="row no-gutters">
								<div class="col-4 pr-2 text-center">
									<div
										id="skin-default"
										data-action="toggle-replace"
										data-replaceclass="mod-skin-light mod-skin-dark"
										data-class=""
										data-toggle="tooltip"
										data-placement="top"
										title=""
										class="d-flex bg-white border border-primary rounded overflow-hidden text-success js-waves-on"
										data-original-title="Default Mode"
										style="height: 80px"
									>
										<div
											class="bg-primary-600 bg-primary-gradient px-2 pt-0 border-right border-primary"
										></div>
										<div class="d-flex flex-column flex-1">
											<div
												class="bg-white border-bottom border-primary py-1"
											></div>
											<div class="bg-faded flex-1 pt-3 pb-3 px-2">
												<div
													class="py-3"
													style="
														background: url('img/demo/s-1.png') top left
															no-repeat;
														background-size: 100%;
													"
												></div>
											</div>
										</div>
									</div>
									Default
								</div>
								<div class="col-4 px-1 text-center">
									<div
										id="skin-light"
										data-action="toggle-replace"
										data-replaceclass="mod-skin-dark"
										data-class="mod-skin-light"
										data-toggle="tooltip"
										data-placement="top"
										title=""
										class="d-flex bg-white border border-secondary rounded overflow-hidden text-success js-waves-on"
										data-original-title="Light Mode"
										style="height: 80px"
									>
										<div
											class="bg-white px-2 pt-0 border-right border-"
										></div>
										<div class="d-flex flex-column flex-1">
											<div class="bg-white border-bottom border- py-1"></div>
											<div class="bg-white flex-1 pt-3 pb-3 px-2">
												<div
													class="py-3"
													style="
														background: url('img/demo/s-1.png') top left
															no-repeat;
														background-size: 100%;
													"
												></div>
											</div>
										</div>
									</div>
									Light
								</div>
								<div class="col-4 pl-2 text-center">
									<div
										id="skin-dark"
										data-action="toggle-replace"
										data-replaceclass="mod-skin-light"
										data-class="mod-skin-dark"
										data-toggle="tooltip"
										data-placement="top"
										title=""
										class="d-flex bg-white border border-dark rounded overflow-hidden text-success js-waves-on"
										data-original-title="Dark Mode"
										style="height: 80px"
									>
										<div class="bg-fusion-500 px-2 pt-0 border-right"></div>
										<div class="d-flex flex-column flex-1">
											<div class="bg-fusion-600 border-bottom py-1"></div>
											<div class="bg-fusion-300 flex-1 pt-3 pb-3 px-2">
												<div
													class="py-3 opacity-30"
													style="
														background: url('img/demo/s-1.png') top left
															no-repeat;
														background-size: 100%;
													"
												></div>
											</div>
										</div>
									</div>
									Dark
								</div>
							</div>
						</div>
						<hr class="mb-0 mt-4" />
						<div class="pl-5 pr-3 py-3 bg-faded">
							<div class="row no-gutters">
								<div class="col-6 pr-1">
									<a
										href="#"
										class="btn btn-outline-danger fw-500 btn-block"
										data-action="app-reset"
										>Reset Settings</a
									>
								</div>
								<div class="col-6 pl-1">
									<a
										href="#"
										class="btn btn-danger fw-500 btn-block"
										data-action="factory-reset"
										>Factory Reset</a
									>
								</div>
							</div>
						</div>
					</div>
					<span id="saving"></span>
				</div>
			</div>
		</div>
	</div>
	<!-- END Page Settings -->
	<!-- base vendor bundle:
		 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
					+ pace.js (recommended)
					+ jquery.js (core)
					+ jquery-ui-cust.js (core)
					+ popper.js (core)
					+ bootstrap.js (core)
					+ slimscroll.js (extension)
					+ app.navigation.js (core)
					+ ba-throttle-debounce.js (core)
					+ waves.js (extension)
					+ smartpanels.js (extension)
					+ src/../jquery-snippets.js (core) -->
	<script src="js/vendors.bundle.js"></script>
	<script src="js/app.bundle.js"></script>
	<!--This page contains the basic JS and CSS files to get started on your project. If you need aditional addon's or plugins please see scripts located at the bottom of each page in order to find out which JS/CSS files to add.-->
</body>

</html>
