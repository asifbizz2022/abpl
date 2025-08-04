@extends('admin.layout._main')
@section('title')   @endsection
@section('content')

<div class="  my-1">
	<div class=" ">
	@php
	$c = 7;
	@endphp
	<div class="col">
		<div class="h5">
		Maximum Limit of Category upload is :  7
		</div>
	</div>
	@if(count($data) < 7 )
	<div class="col-12">
		 
		<span class="alert alert-info h6">
			{{$c - count($data) }} 
		</span><span class="h5 ml-3 text-uppercase">Is Left To Upload</span>
	</div>
	<div class="col-12 text-right mb-2"> 
		<a href="{{ route('add.category') }}" class="btn btn-info "><i class="fa fa-plus"></i> Add New </a>
	</div>
	@else

 
	@endif
	 
</div>
 <div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Category</h6> 
			</div> 
				
				 
			<div class="card-body"> 
				<div class="table-responsive">
					<table class="table table-stripped table-sm table-bordered" id="table">
						<thead>
							<tr>
								<th>S.no </th>
								<th>Name and Image</th>  
								<th>Description</th> 
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@php $sno = 1; @endphp
						@foreach($data as $row)
							<tr>
								<td style="width: 1cm;"> 
									<div> {{$sno}} </div> 
								</td>
								<td style="width: 100px;">
								<div class="py-1 bg-dark px-1 rounded text-light">
									{{$row->name}}
								</div>
							 
								<div>
									@if($row->image_url)
									<img alt="No image found upload one" src="{{ url('/') }}/public/category/{{$row->image_url}}" width="100" height="100" class="img img-thumbnail">	
									@else
									<img src="{{url('/')}}/public/error.jpg}}" class="img img-thumbnail  " width="100" height="100"> 
									@endif
								</div>
 
								</td>  
								<td style="text-wrap:wrap; width : 200px;">
									<div>
										<?php printf("%s", $row->description) ?>
									</div>
								</td>
							 
								<td class="text-right" style="width : 1in;">
									 
									 
									<div class="actions d-flex justify-content-end"> 
										 
										<a href="{{ route('add.category', $row->id) }}" class="btn btn-sm bg-success-light mr-3"    >
											<i class="fe fe-pencil"></i> Edit
										</a> 
										<form action="{{ route('delete.category') }}" method="post" onsubmit="return confirm('Are You sure want to delete')">@csrf
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
					<form method="post" action="{{ route('delete.category') }}">@csrf
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
 <script>
        // Select all checkboxes
        document.getElementById('select_all').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked =  ! checkbox.checked
            });
        });
    </script>
@endsection