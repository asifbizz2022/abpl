@extends('admin.layout._main')
@section('title')Books @endsection
@section('content')
<div class="row">
 
	<div class="col-sm-12">
		
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Feedback</h6> 
			</div>
			<div class="card-body p-2">

				<div class="table-responsive">
					<table class="table table-sm table-bordered table-stripped">
						<thead> 
							<th>Sno</th>
							<th>Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Company</th>
							<th>Message</th> 
							<th>Action</th> 
						</thead>
						<tbody>
							@php $sno = 1; @endphp
							@foreach($data as $row)
							<tr>
							<td>{{$sno}}</td>
							<td>{{$row->name}}</td>
							<td>{{$row->email}}</td>
							<td>{{$row->contact}}</td>
							<td>{{$row->company}}</td>
							<td>{{$row->message}}</td> 
							<td>
								<div class="actions">  
									<a  href="{{ route('delete.contact.us', $row->id) }}" onclick="return confirm('Are You Sure Want To Delete ')" class="btn btn-sm bg-danger-light deletebtn"  >
										<i class="fe fe-trash"></i> Delete
									</a>
									
								</div>
							</td>
							

							@php $sno++ @endphp
							</tr>
							@endforeach
						</tbody>
						 
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection