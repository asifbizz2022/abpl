@extends('admin.layout._main')
@section('title')Books @endsection
@section('content')
<div class="row">
	<div class="col-12 text-right mb-2">
		<a href="{{route('add.gallery')}}">
			<div class="btn btn-primary">
				<i class="fa fa-plus"></i>
				Add Photo
			</div>
		</a>
	</div>
	<div class="col-sm-12">
		
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Gallery</h6> 
			</div>
			<div class="card-body p-2">
				 
				<div class="table-responsive">
					<form method="post" action="{{ route('delete.bulk','gallery') }}"   onsubmit="return confirm('Are you sure you want to delete selected items?')">@csrf

					<div class="my-3">
						<input type="checkbox" id="select_all" class=" "> 
						<button type="submit" name="delete_selected" class="btn btn-danger btn-sm">Delete Selected</button>  
					</div>
					<table class="table table-sm table-bordered table-stripped">
						<thead> 
							<tr>
								<th style="width: 1cm;">S.no</th>
								<th>Category</th>
								<th>image</th>  
								 
								<th>Action</th>
							</tr> 
						</thead>
						<tbody>
							@php $sno = 1; @endphp
							@foreach($data as $row) 
							<tr>
								<td><div>{{$sno}} <input type="checkbox" name="selected_items[]" value="{{ $row->id}}">  </div></td>
								<td>{{$row->category}}</td>
								<td>
									 
									<div>
										<img src="{{ url('/') }}/public/gallery/{{$row->image}}" width="100"  height="100">
									</div>
								</td>
								 
								<td class="text-right" style="width : 1in;">
									<div>
										@if($row->is_active == 'Active' )
										<a href="{{ route('category.change.status', ['id'=>$row->id, 'flag'=>'Inactive']) }}" class="btn bg-success btn-sm text-light">Active</a>
										@endif
										@if($row->is_active == 'Inactive' ) 
										<a href="{{ route('category.change.status', ['id'=>$row->id, 'flag'=>'Active']) }}" class="btn bg-danger btn-sm text-light">Inactive</a>
										@endif
									</div>
									<br>
									<div class="actions d-flex justify-content-end"> 
										 
										<a href="{{ route('add.gallery', $row->id) }}" class="btn btn-sm bg-success-light mr-3"    >
											<i class="fe fe-pencil"></i> Edit
										</a> 
										<form action="{{ route('delete.gallery') }}" method="post" onsubmit="return confirm('Are You sure want to delete')">@csrf
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
					</form>
				</div>
			
			</div>
		</div>
	</div>
</div>
@endsection