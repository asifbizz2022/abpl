@extends('admin.layout._main')
@section('title')   @endsection
@section('content')
<div class="row my-1">
	<div class="col text-right ">
		<a href="{{ route('add.award') }}" class="btn btn-info "><i class="fa fa-plus"></i> Add New </a>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Awards</h6> 
			</div>
			<form method="post" action="{{ route('delete.bulk','awards') }}"   onsubmit="return confirm('Are you sure you want to delete selected items?')">@csrf
				<div>
					<input type="checkbox" id="select_all" class="mr-3 ml-3 mt-3">
					<button type="submit" name="delete_selected" class="btn btn-danger btn-sm">Delete Selected</button> 
				</div>
			<div class="card-body"> 
				<div class="table-responsive">
					<table class="table table-stripped table-sm table-bordered" id="table">
						<thead>
							<tr>
								<th>S.no</th>
								<th>Title</th> 
								<th>Year</th>
								<th>Description</th> 
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@php $sno =1; @endphp
						@foreach($data as $row)
							<tr>
								<td> 
									<div><input type="checkbox" name="selected_items[]" value="{{ $row->id}}"> {{$sno}} </div>
								</td> 
								<td>
									{{$row->title}}
									 
								</td>
								 
								<td>{{$row->year}}</td>
								<td style="text-wrap:wrap; width : 750px;">
									<div>
										<?php printf("%s", $row->description) ?>
									</div>
								</td>
							 
								<td class="text-right">
									<div class="actions">
										<a href="{{ route('add.award', $row->id) }}" class="btn btn-sm bg-success-light"    >
											<i class="fe fe-pencil"></i> Edit
										</a>
										<form action="{{ route('award.delete') }}" method="post" onsubmit="return confirm('Are You sure want to delete')" >@csrf
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

				</div>
			</div>
			</form>
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
					<form method="post" action="{{ route('award.delete') }}">@csrf
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