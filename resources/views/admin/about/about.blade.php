@extends('admin.layout._main')
@section('title')Books @endsection
@section('content')
<div class="row">
	<div class="col-12 text-right mb-2">
		<a href="{{ route('add.about.us') }}">
			<div class="btn btn-primary">
				<i class="fa fa-plus"></i>
				Add New
			</div>
		</a>
	</div>
	<div class="col-sm-12">
		
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">About us </h6> 
			</div>
			<div class="card-body p-2">

				<div class="table-responsive">
					<table class="table table-sm table-bordered table-stripped">
						<thead>
							<tr>
								<th>S.no</th>
								<th>Title - Sub Title - Image</th>  
								<th>Message</th>
								<th>Action</th>
							</tr> 
						</thead>
						<tbody>
							@php $sno =1; @endphp
							@foreach($data as $row)
							<tr>
								<td style="text-wrap:wrap; width : 50px;">{{$sno}}</td>
								<td style="text-wrap:wrap; width : 200px;">
									<table class="table">
										<tr>
											<td>Title</td><td>{{$row->title}}</td>
										</tr>
										<tr>
											<td>Sub Title</td><td>{{$row->subtitle}}</td>
										</tr>
										<tr>
											<td>Years Of Experience </td><td>{{$row->experience}}</td>
										</tr>
										<tr>
											<td>Ongoing Projects </td><td>{{$row->ongoing}}</td>
										</tr>
										<tr>
											<td>Project Completed </td><td>{{$row->completed}}</td>
										</tr> 
									</table>
									<div>
										<img src="{{url('/')}}/public/aboutus/{{ $row->banner}}" width="250" height="250">
									</div>  
								</td> 
								<td style="text-wrap:wrap; width : 300px;">
									<div>
										{{$row->message}}
									</div>
								</td>
								
								<td class="text-left" style="text-wrap:wrap; width : 50px;">
									<div class="actions">
										<a href="{{ route('add.about.us', $row->id) }}" class="btn btn-sm bg-success-light"    >
											<i class="fe fe-pencil"></i> Edit
										</a>
										<form action="{{ route('delete.about.us') }}" method="post" onsubmit="return confirm('Are You sure want to delete')" >@csrf
											<input type="hidden" name="id" value="{{$row->id}}">
											<button type="submit" class="btn btn-sm bg-danger-light"   data-id="{{$row->id}}">
												<i class="fe fe-trash"></i> Delete
											</button>	
										</form>
										
										
									</div>
								</td>
							</tr>
							@endforeach
							@php $sno++; @endphp
						</tbody>
						 
						 
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection