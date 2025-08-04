@extends('admin.layout._main')
@section('title') @endsection
@section('content')

@if(!empty($update))
		
<div class="row">
	<div class="col">
	<div class="card">
		<div class="card-header">
			<div class="h5">Update Job</div>
		</div>
	<div class="card-body">
		<form action="{{route('add.update.jobs')}}" method="post" enctype="multipart/form-data">@csrf 
			 <input type="hidden" value="{{$data->id}}" name="id">
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="title" value="{{$data->title}}">
						@error('title')
						<small class="text-danger">
							{{$message}}
						</small>
						@enderror
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Location</label>
								<input class="form-control" name="location" value="{{$data->location}}">
								@error('location')
								<small class="text-danger">
									{{$message}}
								</small>
								@enderror
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Experience</label>
								<input class="form-control" name="experience" value="{{$data->experience}}">
								@error('experience')
									{{$message}}
								</small>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Seats</label>
								<input class="form-control" name="seats" value="{{$data->seats}}">
								@error('seats')
								<small class="text-danger">
									{{$message}}
								</small>
								@enderror
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Status</label>
								<select name="is_active" class="select" required>
									<option selected>Select Status</option>
									@foreach($status as $key=>$value)
									<option {{ ($data->is_active == $key) ? 'selected' : '' }} value="{{$key}}">{{$value}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Salary range</label>
								<input type="" class="form-control form-sm" name="salary" value="{{$data->salary_range}}">
								@error('salary')
								{{$message}}
								@enderror
							</div>
						</div> 
					</div> 
				</div>
				<div class="col"> 
					<div class="row">
						<div class="col"> 
							<div class="row">
								<div class="col">
									<div class="col"> 
										<div class="form-group">
											<label>Job Type </label>
											<input type="" class="form-control" name="job_type" value="{{$data->job_type}}" placeholder="B.Tech/Diploma in etc">
										</div>
									<div class=" ">
										<label>Description </label> 
									 	<textarea class="summernote" name="content" rows="5">{{$data->description}}</textarea>
									</div> 
									</div>
								</div> 
							</div> 
						</div>
					</div> 
				</div> 
			</div>
			<div class="row">
				<div class="col">
					<button class="btn btn-secondary">
						<i class="fa fa-document"></i>
					Save</button>
				</div>
			</div>		
		</form>
	</div>
	</div>
	</div>
</div>
@else

<div class="row">
	<div class="col">
	<div class="card">
		<div class="card-header">
			<div class="h5">Add Jobs</div>
		</div>
		<div class="card-body">
			<form action="{{route('add.update.jobs')}}" method="post" enctype="multipart/form-data">@csrf 
			  
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="title" value="{{old('title')}}"  >
						@error('title')
						<small class="text-danger">
							{{$message}}
						</small>
						@enderror
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Location</label>
								<input class="form-control" name="location"  value="{{old('location')}}"  >
								@error('location')
								<small class="text-danger">
									{{$message}}
								</small>
								@enderror
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Experience</label>
								<input class="form-control" name="experience"  value="{{old('experience')}}"  >
								@error('experience')
								<small class="text-danger"> 

									{{$message}}
								</small>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Seats</label>
								<input class="form-control" name="seats"  value="{{old('seats')}}"  >
								@error('seats')
								<small class="text-danger">
									{{$message}}
								</small>
								@enderror
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Status</label>
								<select name="is_active" class="select" required>
									<option selected>Select Status</option>
									@foreach($status as $key=>$value)
									<option   value="{{$key}}">{{$value}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Salary range</label>
								<input type="" class="form-control" name="salary"  value="{{old('salary')}}"  >
								@error('salary')
								{{$message}}
								@enderror
							</div>
						</div>
						 
					</div>
					 
				 
				</div>
				<div class="col"> 
					<div class="row">
						<div class="col"> 
							<div class="row">
								<div class="col">
									<div class="col">
									<div class="form-group">
											<label>Job Type </label>
											<input type="" class="form-control" name="job_type" value="{{old('job_type')}}" placeholder="B.Tech/Diploma in etc">
										</div> 
									<div class=" ">
										<label>Description </label> 
									 	<textarea class="summernote" name="content" rows="5">  {{old('content')}}  </textarea>
									</div> 
									</div>
								</div> 
							</div> 
						</div>
					</div> 
				</div> 
			</div>
			<div class="row">
				<div class="col">
					<button class="btn btn-secondary">
						<i class="fa fa-document"></i>
					Save</button>
				</div>
			</div>		
		</form>

			 
	</div>
	</div>
	</div>
</div>
		
		
@endif
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
                };

                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                preview.style.display = 'none'; // Hide the image preview if no file is selected
            }
        });
    </script>

  
    </script>
@endsection
@section('js')
     
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> 
     
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

          $('.summernote').summernote();

        });

    </script>
@endsection