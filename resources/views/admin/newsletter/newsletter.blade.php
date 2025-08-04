@extends('admin.layout._main')
@section('title')Books @endsection
@section('content')
<div class="row">
	 
	<div class="col-sm-12">
		
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">News Letter</h6> 
			</div>
			<div class="card-body p-2">

				<div class="table-responsive">
					<form method="post" action="{{ route('delete.bulk','newsletter') }}"   onsubmit="return confirm('Are you sure you want to delete selected items?')">@csrf
					<table class="table table-sm table-bordered table-stripped">
						<thead>
							<tr>
								<th colspan="3"> 
									<input type="checkbox" id="select_all" class="mr-3">
								 	
									<button type="submit" name="delete_selected" class="btn btn-danger btn-sm">Delete Selected</button>  
								</th>
							</tr>
							<tr>
								<th>Sno</th>
								<th>Email</th> 
								<th>Action</th>
							</tr> 
						</thead>
						<tbody>
							@php $sno = 1; @endphp
							@foreach($data as $row)
							<tr>
								<td>{{$sno}} <input type="checkbox" name="selected_items[]" value="{{ $row->id}}"></td>
								<td>{{$row->email}}</td>
								<td>
									<div class="actions"> 
										 
									 
										<form action="{{ route('delete.newsletter') }}" method="post" onsubmit="return confirm('Are You sure want to delete')">@csrf
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