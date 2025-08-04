@extends('admin.layout._main')
@section('title')Events @endsection
@section('content')
<div class="row">
	<div class="col-12 text-right mb-2">
		<a href="{{ route('add.event') }}">
			<div class="btn btn-primary">
				<i class="fa fa-plus"></i>
				Add New
			</div>
		</a>
	</div>
	<div class="col-sm-12">
		
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Events</h6> 
			</div>
			
			
			<div class="card-body p-2">

				<div class="table-responsive">
					<form method="post" action="{{ route('delete.bulk','events') }}"   onsubmit="return confirm('Are you sure you want to delete selected items?')">@csrf
					<table class="table table-sm table-bordered table-stripped">
						<thead>
							<tr>
								<th> 
									<input type="checkbox" id="select_all" class=" ">
								</th>
								<th colspan="4">
									<button type="submit" name="delete_selected" class="btn btn-danger btn-sm">Delete Selected</button>  
								</th>
							</tr>
							<tr>
								<th>S.no</th>
								<th>Title/image</th>
								<th>Event date and Location</th>  
								<th>Description</th>
								<th>Action</th>
							</tr> 
						</thead>
						<tbody>
							@php $sno =1; @endphp
							@foreach($data as $row)
							<tr>
								<td>
									<div>{{$sno}} <input type="checkbox" name="selected_items[]" value="{{ $row->id}}">  </div>
								</td>
								<td  >
									<div class="p-1 text-wrap" style="width: 300px; ">{{$row->title}}</div>
									<div><img src="{{ url('/') }}/public/events/{{$row->image_url}}" width="100" height="100" class="img img-thumbnail"></div>
								</td>
								<td>
									<table class="w-100">
										<tr>
											<td>Event Date </td>
											<td class="text-info">{{$row->event_date}}</td>
										</tr>
										<tr>
											<td>Event Location </td>
											<td class="text-info">{{$row->location}}</td>
										</tr>
									</table>
									 
								
								  </td>
								<td style="text-wrap:wrap; width : 750px;">
									<div >
										<?php printf("%s", $row->description) ?>
									</div>
								</td>
							 
								<td class="text-right">
									<div class="actions">
										<a href="{{ route('add.event', $row->id) }}" class="btn btn-sm bg-success-light"    >
											<i class="fe fe-pencil"></i> Edit
										</a>
										 
										<form action="{{ route('delete.event') }}" method="post" onsubmit="return confirm('Are You sure want to delete')">@csrf
											<input type="hidden" name="id" value="{{$row->id}}">
											<button type="submit" class="btn btn-sm bg-danger-light"   data-id="{{$row->id}}">
												<i class="fe fe-trash"></i> Delete
											</button>	
										</form>  
										
									</div>
								</td>
							</tr>
							@php $sno++ @endphp
							@endforeach
						</tbody> 
					</table>
					</form>
				</div>
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
					<form method="post" action="{{ route('delete.event') }}">@csrf
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