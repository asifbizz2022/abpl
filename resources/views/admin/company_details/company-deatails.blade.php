@extends('admin.layout._main')
@section('title')Company Details @endsection
@section('content')
<div class="row">
	<div class="col-12 text-right mb-2">
		<a href="#">
			<div class="btn btn-primary">
				<i class="fa fa-plus"></i>
				Add New
			</div>
		</a>
	</div>
	<div class="col-sm-12">
		
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Books</h6> 
			</div>
			<div class="card-body p-2">

				<div class="table-responsive">
					<table class="table table-sm table-bordered table-stripped">
						<thead>
							<tr>
								<th>Sno</th>
								<th>Title/image</th>
								<th>ISBN</th>
								<th>Genre</th>
								<th>Language</th>
								<th>Format</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
							
						</thead>
						 
						 
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection