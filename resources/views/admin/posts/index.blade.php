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
			<h2>Article Lists</h2>
			<div class="panel-toolbar">
				<a href=" {{route('posts.create')}} "
					class="btn btn-info btn-xs waves-effect waves-theme">
					<i class="fal fa-plus-circle mr-1"></i>
					Artikel Baru
				</a>
			</div>
		</div>
		<div class="panel-container show">
			<div class="panel-content">
				<div>
					<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
						<thead class="bg-primary-600">
							<tr>
								<th>Article Title</th>
								<th>Category</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($posts as $post)
								<tr>
									<td> {{($post->post_title)}}</td>
									<td> {{($post->category->name)}} </td>
									<td> {{($post->post_status)}} </td>
									<td class="d-flex">
										<a href=" {{route('posts.edit', $post->id)}}"
											class="btn btn-icon btn-sm btn-primary mr-1"
											title="Perbarui/Ubah Artikel">
											<i class="fal fa-edit"></i>
										</a>
										<form id="delete-form" method="POST"
											action="{{ route('posts.destroy', [$post->id]) }}" enctype="multipart/form-data">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-sm btn-danger btn-icon"
												title="Hapus Artikel" onclick="return confirm('Apakah Anda yakin ingin menghapus Artikel ini?')">
												<i class="fas fa-trash-alt"></i>
											</button>
										</form>

									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script src="{{ asset('js/formplugins/bootstrap-colorpicker/bootstrap-colorpicker.js') }}"></script>
@parent
	<script>
		$(document).ready(function()
		{
			$('#hexcolor, #textcolor').colorpicker();
		});

	</script>

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
