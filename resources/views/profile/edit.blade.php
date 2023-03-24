@extends('layouts.admin')

@section('content')
@include('partials.breadcrumb')
@include('partials.subheader')


<div class="row">
	<div class="col-md-12">
		<div class="panel" id="panel-1">
			<div class="panel-container show">
				<div class="panel-content">
					@include('profile.partials.update-profile-information-form')
				</div>
			</div>
		</div>
		<div class="panel" id="panel-2">
			<div class="panel-container show">
				<div class="panel-content">
					def
					@include('profile.partials.update-password-form')
				</div>
			</div>
		</div>
		{{-- <div class="panel" id="panel-3">
			<div class="panel-container show">
				<div class="panel-content">
					@include('profile.partials.delete-user-form')
				</div>
			</div>
		</div> --}}
	</div>
</div>

@endsection

@section('scripts')
@parent

@endsection
