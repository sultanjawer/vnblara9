@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
@include('partials.breadcrumb')
@include('partials.subheader')


<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{ route('products.update', [$product->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row d-flex">
                <div class="col-lg-8">
				    {{-- input judul artikal --}}
                    <div class="form-group">
                        <input type="text" name="product_name" id="product_name"
                            class="fs-xxl form-control custom-form-control panel-hdr fw-500 {{ $errors->has('product_name') ? 'is-invalid' : '' }}" placeholder="Post Title" value="{{ old('product_name', $product->product_name) }}"
                            aria-describedby="product_name" required>
                        @if($errors->has('product_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('product_name') }}
                            </div>
                        @endif
                        <small id="helptitle" class="text-muted">Beri nama produk</small>
                    </div>
                    {{-- end input judul --}}

                    {{-- article content input --}}
                    <textarea name="summernoteInput" class="summernote" required></textarea>
                    {{-- <textarea class='summernote text-wrap ' id='body' name='body'></textarea> --}}
                    {{-- end article input --}}

                    {{-- exerpt input --}}
                    <div class="panel mt-3" id="panel-1">
                        <div class="panel-hdr">
                            <h2>Product Short | <i>Exerpt</i></h2>
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
                                <input type="text" name="product_short" id="product_short"
                                    class="form-control custom-form-control"
                                    placeholder="product_short" value="{{ old('product_short', $product->product_short) }}"
                                    aria-describedby="product_short">
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
                                        <span>{{$product->created_at}}</span>
                                    </div>
                                    <div>
                                        <span>Last update:</span>
                                        <span>{{$product->updated_at}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" id="card-1">
                        <div class="card-header">Current Post Image</div>
                        @if (is_null($product->product_mime))
                            <img src="{{$defaultimg}}"alt=""  class="card-img-top img-fluid"
                            alt="Card image cap">
                        @else
                            <img src="{{ url('storage/img/product_img/' . $product->product_mime) }}"
                                class="card-img-top img-fluide"
                                alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control form-control-sm" id="product_mime" name="product_mime"
                                        aria-describedby="image" value="{{ old('product_mime', $product->product_mime) }}">
                                    <label class="custom-file-label" for="product_mime">{{ old('product_mime', $product->product_mime) }}</label>
                                </div>
                                <span class="help-block">change product image</span>
                            </div>
							<div class="form-group">
								<label for="product_specs">Specification</label>
								<input type="text" class="form-control form-control-sm"
								name="product_specs" id="product_specs" placeholder="Tambahkan product_specs" value=" {{ old('product_specs', $product->product_specs) }} " >
								<span class="help-block">Spesifikasi dan atau ukuran produk.</span>
							</div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
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
                height: 120,
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
            var content = {!! json_encode($product->product_desc) !!};
            $('.summernote').summernote('code', content);

        });
    </script>
    <!-- summernote -->
@endsection
