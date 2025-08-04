@extends('admin.layout._main')
@section('title')  @endsection
@section('content')
<div class="row">
	@php
	$c = 5;
	@endphp
	<div class="col">
		<div class="h5">
		Maximum Limit of Bnners upload is :  5
		</div>
	</div>
	@if(count($data) < 5 )
	<div class="col-12">
		 
		<span class="alert alert-info h6">
			{{$c - count($data) }} 
		</span><span class="h5 ml-3 text-uppercase">Is Left To Upload</span>
	</div>
	<div class="col-12 text-right mb-2"> 
		<a href="{{ route('add.banner') }}"  >
			<div class="btn btn-info">
				<i class="fa fa-plus"></i>
				Add New 
			</div>
		</a>
	</div>
	@else

 
	@endif
	
	<div class="col-sm-12"> 
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Banners</h6> 
			</div>
			 
			 
			<div class="card-body p-2">

				<div class="table-responsive">
					<form method="post" action="{{ route('delete.bulk','banners') }}"   onsubmit="return confirm('Are you sure you want to delete selected items?')">@csrf
					<table class="table table-sm table-bordered table-stripped">
						<thead>
							<tr>
							<th colspan="3">
							<input type="checkbox" id="select_all" class=" ">  
							<button type="submit" name="delete_selected" class="btn btn-danger btn-sm rounded-0 ">Delete Selected</button> 
							</th>
							</tr>
							<tr>

								<th>S.no</th>
								<th>Title/image</th>  
								<th>Action</th>
							</tr> 
						</thead>
						<tbody>
							@php $sno = 1; @endphp
							@foreach($data as $row)
							<tr>
								<td>
									<div><input type="checkbox" name="selected_items[]" value="{{ $row->id}}"> {{$sno}} </div>
								</td>
								<td>
									<div>
										{{$row->title}}
									</div>
									<div>
										{{$row->subtitle}}
									</div>
									<div>
										@if($row->banner)
										<img src="{{url('/')}}/public/banners/{{$row->banner}}" class="img img-thumbnail  " width="100" height="100"> 
										@else
										<img src="{{url('/')}}/public/error.jpg}}" class="img img-thumbnail  " width="100" height="100"> 
										@endif
									</div>

									
									<!-- <div class="status-toggle">
										<input type="checkbox" id="{{$row->id}}" class="check" checked >
										<label for="{{$row->id}}" class="checktoggle">checkbox</label>
									</div> -->
								</td>
								 
								<td class="text-right">
									
									<div class="actions">
										<a href="{{ route('add.banner', $row->id) }}" class="btn btn-sm bg-success-light">
											<i class="fe fe-pencil"></i> Edit
										</a>
										<form action="{{ route('delete.banner') }}" method="post" onsubmit="return confirm('Are You sure want to delete')">@csrf
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
					<form method="post" action="{{ route('delete.banner') }}">@csrf
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

	 
		
	});
 
</script>
@endsection