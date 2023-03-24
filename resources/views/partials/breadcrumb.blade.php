	<!-- breadcrumb -->
	<ol class="breadcrumb page-breadcrumb">
		<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
		@if ($page_title ==='')
			<li class="breadcrumb-item active"></i>{{  ($page_modul ?? '') }}></li>
		@else
			<li class="breadcrumb-item">{{ ($page_modul ?? '')  }}</li>
			<li class="breadcrumb-item active"></i>{{  ($page_title ?? '') }}</li>
		@endif
		<li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
	</ol>
	<!-- End breadcrumb -->
