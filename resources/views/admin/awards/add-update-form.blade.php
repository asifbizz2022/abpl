@extends('admin.layout._main')
@section('title') @endsection
@section('content')

@if(!empty($update))

<div class="row">
	<div class="col">
	<div class="card">
		<div class="card-header">
			<div class="h5">Update Award</div>
		</div>
	<div class="card-body">
		<form action="{{route('add.update.award')}}" method="post" enctype="multipart/form-data">@csrf 
			<input type="hidden" name="id" value="{{$data->id}}">
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
					<div class="form-group">
						<label>Year</label>
						<input type="" name="year" class="form-control" value="{{$data->year}}">
						@error('year')
						<small class="text-danger">
							{{$message}}
						</small>
						@enderror
					</div>
				 
				</div>
				<div class="col"> 
						<div class=" ">
							<label>Description </label>
						  
						 <textarea class="summernote" name="content" rows="5"><?php printf("%s", $data->description) ?></textarea>
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
			<div class="h5">Add Award</div>
		</div>
	<div class="card-body">
		<form action="{{route('add.update.award')}}" method="post" enctype="multipart/form-data">@csrf 
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="title" value="{{old('title')}}">
							@error('title')
							<small class="text-danger">
								{{$message}}
							</small> 
							@enderror
					</div>
					<div class="form-group">
						<label>Year</label>
						<input type="" name="year" class="form-control" value="{{ old('year')}}">
							@error('year')
							<small class="text-danger">
								{{$message}}
							</small> 
							@enderror
					</div>
				 
				</div>
				<div class="col"> 
						<div class=" ">
							<label>Description </label>
						 <textarea name="content" class="summernote" rows="5">{{ old('year')}}</textarea>
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