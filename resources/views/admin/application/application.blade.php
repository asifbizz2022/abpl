@extends('admin.layout._main')
@section('title')Jobs @endsection
@section('content')
<div class="row">
	 
	<div class="col-sm-12">
		
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Job Applications</h6> 
			</div>
			<div class="card-body p-2">

				<div class="table-responsive">
					<table class="table table-sm table-bordered table-stripped">
						<thead>
							<tr>
								<th>Sno</th>
								<th>Resume</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Contact</th>
								<th>Experience</th>
								<th>Qualification</th>
								<th>Location</th>
								<th>Cover Letter</th>
								 
								<th>Action</th>
							</tr>
							
						</thead>
						<tbody>
						@php $sno = 1; @endphp
						@foreach($data as $row)
						<tr>
							<td>{{$sno}}</td> 
							<td>
								<div>
									<a href="{{url('/')}}/public/resume/{{ $row->resume }}" target="_blank">Download Resume</a>
								</div>
							</td>
							<td>{{$row->first_name}}</td>	
							<td>{{$row->last_name}}</td>	
							<td>{{$row->email}}</td>	
							<td>{{$row->contact}}</td>	
							<td>{{$row->experience}}</td>
							<td>{{$row->qualifications}}</td>
							<td>{{$row->location}}</td>	
							<td>{{$row->cover_letter}}</td>	
							 
							<td>
							<div class="actions"> 
										 
										 
										<button type="button" class="btn btn-sm bg-danger-light deletebtn"    id="{{$row->id}}">
											<i class="fe fe-trash"></i> Delete  
										</button>
										
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
					<form method="post" action="{{ route('delete.application') }}">@csrf
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
 