@extends('admin.layout._main')
@section('title') @endsection
@section('content')

@if(!empty($update))

<div class="row">
	<div class="col">
	<div class="card">
		<div class="card-header">
			<div class="h5">Update Project</div>
		</div>
	<div class="card-body">
		<form action="{{route('add.update.project')}}" method="post" enctype="multipart/form-data">@csrf 
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
								<label>Duration</label>
								<input class="form-control" name="duration" value="{{$data->duration}}">
								@error('duration')
									{{$message}}
								</small>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Completion Year</label>
								<input class="form-control" name="completion_year" value="{{$data->completion_year}}">
								@error('completion_year')
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
								<label>Category</label>
								<select name="category" class="select" required>
									 
									@foreach($category as $value)
									<option  value="{{$value->id}}">{{$value->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Type</label>
								<input class="form-control" name="type" value="{{$data->type}}">
								@error('type')
									{{$message}}
								</small>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Image</label> 
								<div class="custom-file">
									<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
									<input type="file" name="image[]" multiple accept="image/*"   class="custom-file-input"   id="imageInput"> 
									@error('image')
									<small class="text-danger">
										{{$message}}
									</small> 
									@enderror
								</div>
								<div class="my-3">
									<input  type="hidden" name="image2" value="{{$data->image_url}}">
									@foreach(DB::table('project_images')->where('project_id', $data->id)->get() as $img)
									<img  alt="No image found upload one" src="{{ url('/') }}/public/projects/{{$img->image}}" width="100" height="100" class="img img-thumbnail">
									@endforeach
									<div id="imagePreview">
										<img class="img img-thumbnail"   alt="Image Preview" style="display: none;" width="150" height="150"> <!-- Initially hidden -->	
									</div>
		                            
		                        </div>
							</div>
						</div>
						<div class="col">
							<label>Is Completed</label>
							<select name="is_completed" class="select" required>
								@foreach($completed as $key=>$value)
								<option {{ ($data->is_completed = $value ) ? 'selected':'' }} value="{{$key}}">{{$value}}</option>
								@endforeach
								 
							</select>

						</div>
					</div>
					
				</div>
				<div class="col"> 
					<div class="row">
						<div class="col"> 
					<div class="row">
						<div class="col">
							<div class="col"> 
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
			<div class="h5">Add Project</div>
		</div>
		<div class="card-body">
			<form action="{{route('add.update.project')}}" method="post" enctype="multipart/form-data">@csrf 
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="title"  >
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
								<input class="form-control" name="location"  >
								@error('location')
								<small class="text-danger">
									{{$message}}
								</small>
								@enderror
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Duration</label>
								<input class="form-control" name="duration" >
								@error('duration')
									{{$message}}
								</small>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Completion Year</label>
								<input class="form-control" name="completion_year"  >
								@error('completion_year')
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
									<option  value="{{$key}}">{{$value}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Category</label>
								<select name="category" class="select" required>
									 
									@foreach($category as $value)
									<option  value="{{$value->id}}">{{$value->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Type</label>
								<input class="form-control" name="type"  >
								@error('type')
									{{$message}}
								</small>
								@enderror
							</div>
						</div>
					</div>
					 	<div class="row">
						<div class="col">
							<div class="form-group">
						<label>Image</label> 
						<div class="custom-file">
							<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
							<input type="file" name="image[]"   multiple accept="image/*" class="custom-file-input"   id="imageInput"> 
							@error('image')
							<small class="text-danger">
								{{$message}}
							</small> 
							@enderror
							
						</div> 
						<div id="imagePreview" class="my-3" > 
                            <img  class="img img-thumbnail"   alt="Image Preview" style="display: none;" width="150" height="150"> <!-- Initially hidden -->
                        </div>
                      
					</div>
						</div>
						<div class="col">
							<label>Is Completed</label>
							<select name="is_completed" class="select" required>
								@foreach($completed as $key=>$value)
								<option   value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>

						</div>
					</div>
					 
				</div>
				<div class="col"> 
					<div class="row">
						<div class="col">
							<div class="col"> 
							<div class=" ">
								<label>Description </label> 
							 	<textarea class="summernote" name="content" rows="5"> </textarea>
							</div> 
							</div>
						</div> 
					</div> 
				</div>
				
				</div> 
				 
				<div class="row  ">
				<div class="col">
					<button class="btn btn-secondary">
						<i class="fa fa-document"></i>
					Save</button>
				</div>
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
<script type="text/javascript">
	document.getElementById('imageInput').addEventListener('change', function(event) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = ''; // Clear previous previews
    
    const files = event.target.files;
    
    if (files) {
        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '200px';
                    img.style.margin = '10px';
                     preview.style.display = 'block'; 
                    preview.appendChild(img);
                }
                
                reader.readAsDataURL(file);
            }
        });
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