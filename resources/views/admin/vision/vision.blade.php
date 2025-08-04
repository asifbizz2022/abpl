@extends('admin.layout._main')
@section('title')   @endsection
@section('content')
<div class="row my-1">
	<div class="col text-right ">
		<a href="{{ route('add.vision') }}" class="btn btn-info "><i class="fa fa-plus"></i> Add New </a>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">vision</h5> 
			</div>
			<div class="card-body"> 
				<div class="table-responsive">
					<table class="table table-sm table-bordered table-stripped">
						<thead>
							<tr>
								<th>S.no</th>
								<th>Title - Sub Title - Image</th> 
								 
								<th>Message</th>  
								<th>Action</th>
							</tr> 
						</thead>
						<tbody>
							@php $sno =1; @endphp
							@foreach($data as $row)
							<tr>
								<td>{{$sno}}</td>
								<td>
									<table class="table">
										<tr>
											<td>Title</td><td>{{$row->title}}</td>
										</tr>
										<tr>
											<td>Sub Title</td><td>{{$row->subtitle}}</td>
										</tr> 
									</table>
									 
									<div>
										<img src="{{url('/')}}/public/vision/{{ $row->image}}" width="200" height="200">
									</div>
								</td>
								 
								<td style="text-wrap:wrap; width : 500px;">
									<div>
										<?php printf("%s", $row->message) ?>
									</div>
								</td>
								
								<td class="text-left">
									<div class="actions">
										<a href="{{ route('add.vision', $row->id) }}" class="btn btn-sm bg-success-light"    >
											<i class="fe fe-pencil"></i> Edit
										</a>
										<form action="{{ route('delete.vision') }}" method="post" onsubmit="return confirm('Are You sure want to delete')" >@csrf
											<input type="hidden" name="id" value="{{$row->id}}">
											<button type="submit" class="btn btn-sm bg-danger-light"   data-id="{{$row->id}}">
												<i class="fe fe-trash"></i> Delete
											</button>	
										</form>
										
										
									</div>
								</td>
							</tr>
							@endforeach
							@php $sno++; @endphp
						</tbody>
						 
						 
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Edit Details Modal -->
<div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Specialities</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="row form-row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Specialities</label>
								<input type="text" class="form-control" value="Cardiology">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Image</label>
								<input type="file"  class="form-control">
							</div>
						</div>
						
					</div>
					<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
		<!--	<div class="modal-header">
				<h5 class="modal-title">Delete</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>-->
			<div class="modal-body">
				<div class="form-content p-2">
					<h4 class="modal-title">Delete</h4>
					<p class="mb-4">Are you sure want to delete?</p>
					<form method="post" action="{{ route('delete.news') }}">@csrf
						<input type="hidden" id="delete-id" name="id">
						<button type="submit" class="btn btn-primary">Ok </button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</form>
					
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(function(){
	$('.deletebtn').click(function(){
		$('#delete-id').val($(this).data('id'));
		 
			$('#delete_modal').modal('show');
		});

	$('.checkbox').change(function(){
		 
	});
		
	});
</script>

@endsection