@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
@include('partials.breadcrumb')
@include('partials.subheader')


<div class="row">
	<div class="col-md-12">
		<form method="post" action="{{ route('posts.update', [$post->id]) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row d-flex">
				<div class="col-lg-8">
					{{-- input judul artikal --}}
					<div class="form-group">
						<input type="text" name="post_title" id="post_title"
							class="fs-xxl form-control custom-form-control panel-hdr fw-500 {{ $errors->has('post_title') ? 'is-invalid' : '' }}" placeholder="Post Title" value="{{ old('post_title', $post->post_title) }}"
							aria-describedby="post_title" required>
						@if($errors->has('post_title'))
							<div class="invalid-feedback">
								{{ $errors->first('post_title') }}
							</div>
						@endif
						<small id="helptitle" class="text-muted">{{ __('Isikan judul artikel.') }}</small>
					</div>
					{{-- end input judul --}}

					{{-- article content input --}}
					<textarea name="summernoteInput" class="summernote" required></textarea>
					{{-- <textarea class='summernote text-wrap ' id='body' name='body'></textarea> --}}
					{{-- end article input --}}

					{{-- exerpt input --}}
					<div class="panel mt-3" id="panel-1">
						<div class="panel-hdr">
							<h2>Kutipan | <i>Exerpt</i></h2>
							<div class="panel-toolbar">
								<a href="javascript:void(0);"
									class="mr-1 btn btn-success btn-xs btn-icon waves-effect waves-themed"
									data-action="panel-collapse" title="Tampil/Sembunyi Panel">
									<i class="fal fa-minus"></i>
								</a>
							</div>
						</div>
						<div class="panel-container show">
							<div class="panel-content">
								<input type="text" name="post_exerpt" id="post_exerpt"
									class="form-control custom-form-control"
									placeholder="post_exerpt" value="{{ old('post_exerpt', $post->post_exerpt) }}"
									aria-describedby="post_exerpt">
							</div>
						</div>
					</div>

					{{-- Post statistics --}}
					<div class="panel mt-2" id="panel-2">
						<div class="panel-hdr">
							<h2>
								Post Statistics
							</h2>
						</div>
						<div class="panel-container show">
							<div class="panel-content">
								<div class="d-flex justify-content-between align-items-center small">
									<div>
										<span>Created at:</span>
										<span>{{$post->created_at}}</span>
									</div>
									<div>
										<span>Published at:</span>
										<span>{{$post->published_at}}</span>
									</div>
									<div>
										<span>Last update:</span>
										<span>{{$post->updated_at}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card" id="card-1">
						<div class="card-header">Current Post Image</div>
						@if (is_null($post->mime))
							<img src="{{$defaultimg}}"alt=""  class="card-img-top img-fluid"
							alt="Card image cap">
						@else
							<img src="{{ url('storage/img/post_img/' . $post->mime) }}"
								class="card-img-top img-fluide"
								alt="Card image cap">
						@endif
						<div class="card-body">
							<div class="form-group">
								<div class="custom-file">
									<input type="file" class="form-control form-control-sm" id="mime" name="mime"
										aria-describedby="image" value="{{ old('title', $post->mime) }}">
									<label class="custom-file-label" for="mime">{{ old('title', $post->mime) }}</label>
								</div>
								<span class="help-block">change post image</span>
							</div>
						</div>
					</div>
					<div class="card mt-3" id="card-2">
						<div class="card-header">
							<div class="card-title h6 fs-sm">Publish</div>
						</div>
						<div class="card-body">

							<div class="form-group">
								<label for="category">Category</label>
								<select class="form-control select2-placeholder" name="category_id" id="category_id">
									<option value="">Pilih Category</option>
									@foreach ($categories as $category)
										<option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
									@endforeach
								</select>
								<span class="help-block">Pilih kategori yang telah disediakan.</span>
							</div>

							<div class="form-group">
								<label for="tags">Tags</label>
								<input type="text" class="form-control form-control-sm"
								name="tags" id="tags" placeholder="Tambahkan tags" value=" {{ old('tags', $post->tags) }} " >
								<span class="help-block">Berikan Tags untuk artikel ini.</span>
							</div>
						</div>
						<div class="card-footer d-flex justify-content-between">
							{{-- <div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="post_status"
									name="post_status" {{ $post->post_status == 'Published' ? 'checked' : '' }}>s
								<label class="custom-control-label" for="draft" id="statusDraft">
									{{ $post->published_at ? 'Published' : 'Draft' }}
								</label>
							</div> --}}
							<div>
								<button class="btn btn-primary btn-xs waves-effect waves-themed mr-2 btnsave"
									id="saveBtn" type="submit">
									Update
								</button>
								<a href="javascript:history.back();"
									class="mr-1 btn btn-warning btn-xs waves-effect waves-themed btnBack"
									title="Batalkan">Cancel
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>

@endsection

@section('scripts')
@parent
<script src="{{ asset('js/formplugins/summernote/summernote-bs4.js') }}"></script>
	<script>
		$(document).ready(function() {
			//init default
			$('.summernote').summernote(
			{
				height: 515,
				dialogsFade: true,
				toolbar: [
					['style', ['style']],
					['font', ['strikethrough', 'superscript', 'subscript']],
					['font', ['bold', 'italic', 'underline', 'clear']],
					['fontsize', ['fontsize']],
					['fontname', ['fontname']],
					['color', ['color']],
					['para', ['ul', 'ol', 'paragraph']],
					['height', ['height']],
					['table', ['table']],
					['insert', ['link']],
					['view', ['fullscreen', 'codeview', 'help']]
				]
			});
			var content = {!! json_encode($post->post_content) !!};
			$('.summernote').summernote('code', content);

		});
	</script>
	<!-- summernote -->
@endsection
