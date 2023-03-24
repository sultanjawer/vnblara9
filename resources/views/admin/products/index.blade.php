@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" media="screen, print" href="{{ asset('css/formplugins/bootstrap-colorpicker/bootstrap-colorpicker.css') }}">
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
			<h2>Products</h2>
			<div class="panel-toolbar">
				<a href="{{route('products.create')}}" class="btn btn-info btn-xs waves-effect waves-themed">
					<i class="fal fa-plus-circle mr-1"></i>
					Add New Product
				</a>
			</div>
		</div>
		<div class="panel-container show">
			<div class="panel-content">
				<div>
					<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
						<thead class="bg-primary-600">
							<tr>
								<th style="width: 20%">Product Image</th>
								<th>Product Name</th>
								<th>Specifications</th>
								<th>Short Brief</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							{{-- {{ dd($categories) }} --}}
							@foreach ($products as $product)
								<tr>
									<td>
										<img src="{{ url('storage/img/product_img/' . $product->product_mime) }}"
				class="img-fluid" alt="{{$product->product_name}}">
									</td>
									<td> {{($product->product_name)}}</td>
									<td> {{($product->product_specs)}} </td>
									<td> {{($product->product_short)}} </td>
									<td class="d-flex">
										<a href="{{route('products.edit', $product->id)}}"
											class="btn btn-sm btn-warning btn-icon mr-1">
											<i class="fas fa-edit"></i>
										</a>
										<form id="delete-form" method="POST"
											action="{{ route('products.destroy', [$product->id]) }}" enctype="multipart/form-data">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-sm btn-danger btn-icon"
												title="Hapus Artikel" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
												<i class="fas fa-trash-alt"></i>
											</button>
										</form>

									</td>
									<!-- Edit Category Modal -->
									<div class="modal fade edit-example-modal-right-sm"
										tabindex="-1" role="dialog" aria-hidden="true"
										id="editCategory{{ $product->id }}">
										<div class="modal-dialog modal-dialog-right modal-sm">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title h4">Edit this Product</h5>
													<button type="button" class="close"
													data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true"><i class="fal fa-times"></i></span>
													</button>
												</div>
												<form method="POST" action="{{ route('products.update', [$product->id]) }}" enctype="multipart/form-data">
													@csrf
													@method('PUT')
													<div class="modal-body">
														<div class="form-group">
															<label for="product_name">Product Name</label>
															<input type="text" name="product_name"
															id="product_name" class="form-control"
															placeholder="Product Name" aria-describedby="helpId"
															value="{{ old('product_name', $product->product_name) }}">
															<small id="helpId" class="text-muted">Product Name</small>
														</div>
														<div class="form-group">
															<label for="product_specs">Specifications</label>
															<div class="input-group" id="product_specs">
																<input type="text" name="product_specs"
																	id="product_specs" class="form-control"
																	placeholder="Specifications" aria-describedby="helpId"
																	value="{{ old('product_specs', $product->product_specs) }}">
																<span class="input-group-append form">
																	<span class="input-group-text colorpicker-input-addon"><i></i></span>
																</span>
															</div>
															<small id="helpId" class="text-muted">Hex Color are used for category color.</small>
														</div>
														<div class="form-group">
															<label for="product_desc">Description</label>
															<div class="input-group" id="product_desc">
																<input type="text" name="product_desc"
																	id="product_desc" class="form-control"
																	placeholder="Product Description" aria-describedby="helpId"
																	value="{{ old('product_desc', $product->product_desc) }}">
																<span class="input-group-append form">
																	<span class="input-group-text colorpicker-input-addon"><i></i></span>
																</span>
															</div>
															<small id="helpId" class="text-muted">Text Color are used for category text color.</small>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">Close</button>
														<button class="btn btn-primary"
															type="submit">Save</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- New Category Modal -->
	<div class="modal fade new-example-modal-right-sm" tabindex="-1" role="dialog" aria-hidden="true" id="newCategory">
		<div class="modal-dialog modal-dialog-right">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title h4">Add New Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"><i class="fal fa-times"></i></span>
					</button>
				</div>
				<form method="POST" action="{{ route('products.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<div class="form-group">
							<label for="category_name">Product Name</label>
							<input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category Name" aria-describedby="helpId">
							<small id="helpId" class="text-muted">Category name</small>
						</div>
						<div class="form-group">
							<label for="hexcolor">Hex Color</label>
							<div class="input-group" id="hexcolor">
								<input type="text"
									name="hexcolor"
									id="hexcolor"
									class="form-control"
									placeholder="Category Color"
									aria-describedby="helpId">
								<span class="input-group-append form">
									<span class="input-group-text colorpicker-input-addon"><i></i></span>
								</span>
							</div>
							<small id="helpId" class="text-muted">Hex Color are used for category color.</small>
						</div>
						<div class="form-group">
							<label for="hexcolor">Text Color</label>
							<div class="input-group" id="textcolor">
								<input type="text"
									name="textcolor"
									id="textcolor"
									class="form-control"
									placeholder="Category Text Color"
									aria-describedby="helpId">
								<span class="input-group-append form">
									<span class="input-group-text colorpicker-input-addon"><i></i></span>
								</span>
							</div>
							<small id="helpId" class="text-muted">Text Color are used for category text color.</small>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button class="btn btn-primary" type="submit">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@parent
<script>
	$(document).ready(function()
	{

		// initialize datatable
		$('#dt-basic-example').dataTable(
		{
			responsive: true,
			lengthChange: true,
			dom:
				/*	--- Layout Structure
					--- Options
					l	-	length changing input control
					f	-	filtering input
					t	-	The table!
					i	-	Table information summary
					p	-	pagination control
					r	-	processing display element
					B	-	buttons
					R	-	ColReorder
					S	-	Select

					--- Markup
					< and >				- div element
					<"class" and >		- div with a class
					<"#id" and >		- div with an ID
					<"#id.class" and >	- div with an ID and a class

					--- Further reading
					https://datatables.net/reference/option/dom
					--------------------------------------
				 */
				"<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'l>>" +
				"<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			buttons: [
				/*{
					extend:    'colvis',
					text:      'Column Visibility',
					titleAttr: 'Col visibility',
					className: 'mr-sm-3'
				},*/
				{
					extend: 'pdfHtml5',
					text: 'PDF',
					titleAttr: 'Generate PDF',
					className: 'btn-outline-danger btn-sm mr-1'
				},
				{
					extend: 'excelHtml5',
					text: 'Excel',
					titleAttr: 'Generate Excel',
					className: 'btn-outline-success btn-sm mr-1'
				},
				{
					extend: 'csvHtml5',
					text: 'CSV',
					titleAttr: 'Generate CSV',
					className: 'btn-outline-primary btn-sm mr-1'
				},
				{
					extend: 'copyHtml5',
					text: 'Copy',
					titleAttr: 'Copy to clipboard',
					className: 'btn-outline-primary btn-sm mr-1'
				},
				{
					extend: 'print',
					text: 'Print',
					titleAttr: 'Print Table',
					className: 'btn-outline-primary btn-sm'
				}
			]
		});

	});

</script>

@endsection
