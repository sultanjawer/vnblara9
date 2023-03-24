@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
@include('partials.breadcrumb')
@include('partials.subheader')


	<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
		@csrf
		<div class="row d-flex">
			<div class="col-lg-8">
				{{-- input judul artikal --}}
				<div class="form-group">
					<input type="text" name="post_title" id="post_title"
						class="form-control custom-form-control panel-hdr fw-500 {{ $errors->has('post_title') ? 'is-invalid' : '' }}" placeholder="Post Title" value="{{ old('post_title', '') }}"
						aria-describedby="post_title" required>
					@if($errors->has('post_title'))
						<div class="invalid-feedback">
							{{ $errors->first('post_title') }}
						</div>
					@endif
					<small id="post_title" class="text-muted">{{ __('Isikan judul artikel.') }}</small>
				</div>
				{{-- end input judul --}}

				{{-- article content input --}}
				<textarea name="summernoteInput" class="summernote" required></textarea>
				{{-- <textarea class='summernote text-wrap ' id='body' name='body'></textarea> --}}
				{{-- end article input --}}

				{{-- exerpt input --}}
				<div class="panel mt-3" id="panel-1">
					<div class="panel-hdr">
						<h2>Exerpt</h2>
						<div class="panel-toolbar">
							<a href="javascript:void(0);"
								class="mr-1 btn btn-success btn-xs btn-icon waves-effect waves-themed"
								data-action="panel-collapse" title="Tampil/Sembunyi Panel">
								<i class="fal fa-minus"></i>
							</a>
						</div>
					</div>
					<div class="panel-container collapse">
						<div class="panel-content">
							<textarea class="form-control" placeholder="type exerpt here" id="post_exerpt" name="post_exerpt" rows="2"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header">
						<div class="card-title h6 fs-sm">Publish</div>
					</div>
					<div class="card-body">
						<div class="form-group">
							<div class="custom-file">
								<input type="file" class="form-control form-control-sm" id="mime" name="mime"
									aria-describedby="image">
								<label class="custom-file-label" for="mime"></label>
							</div>
							<span class="help-block">add image for this article</span>
						</div>
						<div class="form-group">
							<select class="form-control select2-placeholder" name="category_id" id="category_id">
								<option value="">Pilih Category</option>
								@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
							<span class="help-block">pilih kategori yang telah disediakan.</span>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-sm"
							name="tags" id="tags" placeholder="Tambahkan tags" value=" {{ old('tags', '') }} " >
							<span class="help-block">Berikan Tags untuk artikel ini.</span>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-between">
						<button class="btn btn-primary btn-xs waves-effect waves-themed mr-2 btnsave" id="saveBtn"
							type="submit">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>

@endsection

<!-- start script for this page -->
@section('scripts')
@parent

{{-- summernote for textarea --}}
    <script src="{{ asset('js/formplugins/summernote/summernote-bs4.js') }}"></script>
    <script>
        $(document).ready(function() {
            //init default
            $('.summernote').summernote(
            {
                height: 200,
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
                    ['insert', ['link']], //['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

        });
    </script>

{{-- select2 for select option features --}}

    {{-- radio draft-publish button --}}
@endsection
