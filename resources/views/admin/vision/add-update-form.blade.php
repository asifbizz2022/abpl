@extends('admin.layout._main')
@section('title') @endsection
@section('content')

@if(!empty($update))

<div class="row">
	<div class="col">
	<div class="card">
		<div class="card-header">
			<div class="h5">Update vision</div>
		</div>
	<div class="card-body">
		<form action="{{route('add.update.vision')}}" method="post" enctype="multipart/form-data">@csrf 
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

					<!-- <div class="form-group">
						<label>Sub title</label>
						<input type="" name="subtitle" class="form-control" value="{{$data->subtitle}}">
						@error('subtitle')
						<small class="text-danger">
							{{$message}}
						</small>
						@enderror
					</div> -->
					<div class="form-group">
						<label>Image</label> 
						<div class="custom-file">
							<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
							<input type="file" name="image" class="custom-file-input"    id="image-upload"> 
							@error('image')
							<small class="text-danger">
								{{$message}}
							</small> 
							@enderror
						</div>
						<div class="my-3">
							 
							<img  alt="No image found upload one" src="{{ url('/') }}/public/vision/{{$data->image}}" width="400" height="400" class="img img-thumbnail">
                            <img id="image-preview" class="img img-thumbnail" src="{{ url('/') }}/public/vision/{{$data->image}}"  alt="Image Preview" style="display: none;" width="150" height="150"> <!-- Initially hidden -->
                        </div>
					</div>
					 
				</div>
				<div class="col"> 
					 
					 
					 
						<div class=" ">
							<label>Message </label>
						  
						 <textarea class="summernote" name="message" rows="5"><?php printf("%s", $data->message) ?></textarea>
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
			<div class="h5">Add vision</div>
		</div>
	<div class="card-body">
		<form action="{{route('add.update.vision')}}" method="post" enctype="multipart/form-data">@csrf 
		 
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="title" value="{{ old('title') }}">
						@error('title')
						<small class="text-danger">
							{{$message}}
						</small>
						@enderror
					</div>

					<!-- <div class="form-group">
						<label>Sub title</label>
						<input type="" name="subtitle" class="form-control" value="{{ old('subtitle') }}">
						@error('subtitle')
						<small class="text-danger">
							{{$message}}
						</small>
						@enderror
					</div> -->
					<div class="form-group">
						<label>Image</label> 
						<div class="custom-file">
							<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
							<input type="file" name="image" class="custom-file-input"    id="image-upload"> 
							@error('image')
							<small class="text-danger">
								{{$message}}
							</small> 
							@enderror
						</div>
						<div class="my-3">
							<input type="hidden" name="image" value="{{old('image')}}">
							<img  alt="No image found upload one" alt="no image" src=" " width="100" height="100" class="img img-thumbnail">
                             
                        </div>
                        <div>
                        	 <img id="image-preview" class="img img-thumbnail" src=""  alt="Image Preview" style="display: none;" width="150" height="150"> <!-- Initially hidden -->
                        </div>
					</div>
					 
				</div>
				<div class="col">  
						<div class=" ">
						<label>Message </label>
							<textarea class="summernote" name="message" rows="5">{{ old('message') }}</textarea>
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

 <script>
        // JavaScript to display the selected image
        document.getElementById('image-upload2').addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the selected file
            const preview = document.getElementById('image-preview2');

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