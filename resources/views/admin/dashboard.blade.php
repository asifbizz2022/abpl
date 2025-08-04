@extends('admin.layout._main')
@section('title')
Dashboard
@endsection
@section('content')

<style type="text/css">
	.card{
		border-top : thick solid skyblue;
	}
</style>
<div class="row">
	<div class="col">
		<h3>Dashboard</h3>
	</div>
</div>
<section class=" ">
<div class="row">
	<div class="col-xl-3 col-sm-6 col-12">
		<a href="{{ route('project') }}">
			<div class="card">
			<div class="card-body">
				<div class="dash-widget-header">
					<span class="dash-widget-icon text-primary border-primary">
						<i class="fe fe-users"></i>
					</span>
					<div class="dash-count">
						<h3>{{$projects}}</h3>
					</div>
				</div>
				<div class="dash-widget-info">
					<h6 class="text-muted">Projects</h6>
					 
				</div>
			</div>
			</div>
		</a>
	</div>
	<div class="col-xl-3 col-sm-6 col-12">
		<a href="{{ route('project.category') }}">
		<div class="card">
			<div class="card-body">
				<div class="dash-widget-header">
					<span class="dash-widget-icon text-success">
						<i class="fe fe-credit-card"></i>
					</span>
					<div class="dash-count">
						<h3>{{$project_category}}</h3>
					</div>
				</div>
				<div class="dash-widget-info">
					
					<h6 class="text-muted">Project Category</h6>
					 
				</div>
			</div>
		</div>
		</a>
	</div>
	<div class="col-xl-3 col-sm-6 col-12">
		<a href="{{route('events')}}">
			<div class="card">
			<div class="card-body">
				<div class="dash-widget-header">
					<span class="dash-widget-icon text-danger border-danger">
						<i class="fe fe-money"></i>
					</span>
					<div class="dash-count">
						<h3>{{$events}}</h3>
					</div>
				</div>
				<div class="dash-widget-info">
					
					<h6 class="text-muted">Events</h6>
					 
				</div>
			</div>
		</div>
		</a>
	</div>
	<div class="col-xl-3 col-sm-6 col-12">
		<a href="{{ route('awards') }}">
			<div class="card">
			<div class="card-body">
				<a href="{{ route('awards') }}">
					<div class="dash-widget-header">
					<span class="dash-widget-icon text-danger border-danger">
						<i class="fe fe-trophy"></i>
					</span>
					<div class="dash-count">
						<h3>{{$awards}}</h3>
					</div>
					</div>
					 <div class="dash-widget-info">
					
					<h6 class="text-muted">Awards</h6>
					
				</div>
				</a>
			</div>
		</div>
		</a>
	</div> 
</div>
<div class="row">
	<div class="col-xl-3 col-sm-6 col-12">
	<a href="{{ route('jobs') }}">
		<div class="card">
			<div class="card-body">
				<div class="dash-widget-header">
					<span class="dash-widget-icon text-primary border-primary">
						<i class="fe fe-users"></i>
					</span>
					<div class="dash-count">
						<h3>{{$jobs}}</h3>
					</div>
				</div>
				<div class="dash-widget-info">
					<h6 class="text-muted">Jobs</h6>
				 
				</div>
			</div>
		</div>
	</a>
	</div>
	<div class="col-xl-3 col-sm-6 col-12">
		<a href="{{ route('job.application') }}">
			<div class="card">
			<div class="card-body">
				<div class="dash-widget-header">
					<span class="dash-widget-icon text-success">
						<i class="fe fe-credit-card"></i>
					</span>
					<div class="dash-count">
						<h3>{{$job_app}}</h3>
					</div>
				</div>
				<div class="dash-widget-info">
					
					<h6 class="text-muted">Job Applications</h6>
					 
				</div>
			</div>
		</div>
		</a>
	</div>
	<div class="col-xl-3 col-sm-6 col-12">
		<a href="{{ route('banners') }}">
			<div class="card">
			<div class="card-body">
				<div class="dash-widget-header">
					<span class="dash-widget-icon text-danger border-danger">
						<i class="fe fe-money"></i>
					</span>
					<div class="dash-count">
						<h3>{{$banners}}</h3>
					</div>
				</div>
				<div class="dash-widget-info">
					
					<h6 class="text-muted">Banners</h6>
					 
				</div>
			</div>
		</div>
		</a>
	</div>
	<div class="col-xl-3 col-sm-6 col-12">
		<a href="{{ route('contact.us') }}">
				<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-warning border-warning">
							<i class="fe fe-folder"></i>
						</span>
						<div class="dash-count">
							<h3>{{$feedback}} </h3>
						</div>
					</div>
					<div class="dash-widget-info">
						
						<h6 class="text-muted">Contact Us</h6>
						
					</div>
				</div>
			</div>

		</a>
	</div>

</div>
<div class="row">
	
	 
</div>
</section>

<script>
        // JavaScript to display the selected image
        document.getElementById('image-upload').addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the selected file
            const preview = document.getElementById('image-preview');

            if (file) {
                const reader = new FileReader(); // Create a FileReader to read the file

                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the image source to the file's data URL
                    preview.style.display = 'block'; // Show the image preview
         
</script>
@endsection
