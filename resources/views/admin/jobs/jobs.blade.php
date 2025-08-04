@extends('admin.layout._main')
@section('title')Jobs @endsection
@section('content')
<div class="row">
	<div class="col-12 text-right mb-2">
		<a href="{{ route('add.jobs') }}">
			<div class="btn btn-info">
				<i class="fa fa-plus"></i>
				Add New
			</div>
		</a>
	</div>
	<div class="col-sm-12">
		
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Jobs</h6> 
			</div>
			<div class="card-body p-2">

				<div class="table-responsive">
					<table class="table table-sm table-bordered table-stripped">
						<thead>
							<tr>
								<th>Sno</th>
								<th>Title</th>
								<th>Location</th>
								<th>Experience</th>
								<th>Seats</th>
								<th>Salary</th>
								 
								<th>Description</th>
								<th>Action</th>
							</tr>
							
						</thead>
						<tbody>
						@php $sno = 1; @endphp
						@foreach($data as $row)
						<tr>
							<td>{{$sno}}</td> 
							<td>{{$row->title}}</td>	
							<td>{{$row->location}}</td>	
							<td>{{$row->experience}}</td>	
							<td>{{$row->seats}}</td>	
							<td>{{$row->salary_range}}</td>	
							 
							<td style="text-wrap:wrap; width : 750px;">
									<div>
										<?php printf("%s", $row->description) ?>
									</div>
								</td>
							<td>
							<div class="actions"> 
										 
										<a href="{{ route('add.jobs', $row->id) }}" class="btn btn-sm bg-success-light"    >
											<i class="fe fe-pencil"></i> Edit
										</a> 
										<form action="{{ route('delete.jobs') }}" method="post" onsubmit="return confirm('Are You sure want to delete')">@csrf
											<input type="hidden" name="id" value="{{$row->id}}">
											<button type="submit" class="btn btn-sm bg-danger-light"   data-id="{{$row->id}}">
												<i class="fe fe-trash"></i> Delete
											</button>	
										</form>  
										
									</div>
								</td>	
						</tr>
						@php $sno++; @endphp
						@endforeach	
						</tbody>
						 
						 
					</table>
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
					<form method="post" action="{{ route('delete.jobs') }}">@csrf
						<input type="hidden" id="delete-id" name="id">
						<button type="submit" class="btn btn-primary">Ok </button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</form>
					
					
				</div>
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
		$('#delete-id').val($(this).attr('id')); 
			$('#delete_modal').modal('show');
		});
	 

	$('.checkbox').change(function(){
		 
	});
		
	});
</script>
@endsection
 