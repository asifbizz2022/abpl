@extends('admin.layout._main')
@section('title') 	 @endsection
@section('content')
<div class="row">
	<div class="col-12 text-right mb-2">
		<a href="{{ route('add.project') }}">
			<div class="btn btn-primary">
				<i class="fa fa-plus"></i>
				Add New
			</div>
		</a>
	</div>
	 
	<div class="col-sm-12">
		
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Projects</h6>  
			</div> 
			<div class="card-body p-2"> 
				<div class="table-responsive">  

				<form method="post" action="{{ route('delete.bulk','projects') }}"   onsubmit="return confirm('Are you sure you want to delete selected items?')">@csrf
					<table class="table table-sm table-bordered table-stripped mt-3"> 
						<thead>
								<tr>
								<th> 
									<input type="checkbox" id="select_all"  >
								</th>
								<th colspan="8">
									<button type="submit" name="delete_selected" class="btn btn-danger btn-sm">Delete Selected</button>  
								</th>
							</tr>
							<tr>

								<th> 
									S.no
								</th>
								<th>Image</th>
								<th>Project Name</th>
								<th>Location</th>
								<th>Duration</th>
								<th>Completion Year</th>
								<th>Description</th> 
								<th>Type</th>
								<th>Completed</th>
								<th>Action</th>
							</tr> 
						</thead>

						<tbody>

							@php $sno = 1; @endphp
							@foreach($data as $row)
							<tr>
								<td>
									<div> {{$sno}} <input type="checkbox" name="selected_items[]" value="{{ $row->id}}"> </div> 
								</td>
								<td style="width: 1in;">
									<div>
										@foreach(DB::table('project_images')->where('project_id', $row->id)->paginate(5) as $img) 
										 
										<div>
											@if($img->image)
											<img src=" {{url('/')}}/public/projects/{{$img->image}}" class="img img-thumbnail  " width="100" height="100">
											@else
											<img src="{{url('/')}}/public/error.jpg}}" class="img img-thumbnail  " width="100" height="100"> 
											@endif
										</div>

										@endforeach  
									</div>
									<div>
										{{DB::table('project_images')->where('project_id', $row->id)->paginate(5)->links()}}
									</div>
								</td>
								<td>
									<table class="table">
										<tr>
											<td>Category : </td><td> 
											</td>
										</tr>
										<tr>
											<td>Name : </td><td>{{$row->title}}</td>
										</tr>
									</table>
									 
								</td>
								<td>
									{{$row->location}}
								</td>
								<td>
									{{$row->duration}}
								</td>
								<td>
									{{$row->completion_year}}
								</td>
								<td style="text-wrap" style="width:750px;
									    text-wrap: wrap;
									    white-space:nowrap;
									    overflow:hidden;
									    text-overflow:ellipsis;">
									<div class="text-wrap">
										<?php printf("%s" , $row->description) ?>
									</div>
								</td>
								<td>
									{{$row->type}}
								</td>
								 
								<td>{{$row->is_completed}}</td> 
								<td class="text-right">
									 
									<!-- <div class="status-toggle">
										<input type="checkbox" id="{{$row->id}}" class="check" checked >
										<label for="{{$row->id}}" class="checktoggle">checkbox</label>
									</div> -->
									<div class="actions">
										<a href="{{ route('add.project', $row->id) }}" class="btn btn-sm bg-success-light">
											<i class="fe fe-pencil"></i> Edit
										</a>
										 
										<form action="{{ route('delete.project') }}" method="post" onsubmit="return confirm('Are You sure want to delete')">@csrf
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
					<form method="post" action="{{ route('delete.project') }}">@csrf
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
 