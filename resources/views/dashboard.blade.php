@extends('layouts.admin')
@section('styles')

@endsection
@section('content')
@include('partials.breadcrumb')
@include('partials.subheader')

	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="fal fa-times"></i></span>
		</button>
		<div class="d-flex flex-start w-100">
			<div class="mr-2 hidden-md-down">
				<span class="icon-stack icon-stack-lg">
					<i class="base base-7 icon-stack-3x opacity-100 color-success-500"></i>
					<i class="base base-7 icon-stack-2x opacity-100 color-success-300 fa-flip-vertical"></i>
					<i class="fas fa-check icon-stack-1x opacity-100 color-white"></i>
				</span>
			</div>
			<div class="d-flex flex-fill">
				<div class="flex-fill">
					<span class="h5">Success</span>
					<p>
						{{ $message }}
					</p>
				</div>
			</div>
		</div>
	</div>
	@elseif ($message = Session::get('error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="fal fa-times"></i></span>
		</button>
		<div class="d-flex flex-start w-100">
			<div class="mr-2 hidden-md-down">
				<span class="icon-stack icon-stack-lg">
					<i class="base base-7 icon-stack-3x opacity-100 color-success-500"></i>
					<i class="base base-7 icon-stack-2x opacity-100 color-success-300 fa-flip-vertical"></i>
					<i class="fas fa-times icon-stack-1x opacity-100 color-white"></i>
				</span>
			</div>
			<div class="d-flex flex-fill">
				<div class="flex-fill">
					<span class="h5">Error</span>
					<p>
						{{ $message }}
					</p>
				</div>
			</div>
		</div>
	</div>
	@else
	@endif
	<div class="panel" id="panel-1">
		<div class="panel-hdr">
			<h2>Panel</h2>
			<div class="panel-toolbar">

			</div>
		</div>
		<div class="panel-container show">
			<div class="panel-content">
				<div>

				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@parent

@endsection
