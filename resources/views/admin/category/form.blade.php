@extends('admin.layout._main')
@section('title') @endsection
@section('content')

@if(!empty($update))

<div class="row">
	<div class="col">
	<div class="card">
		<div class="card-header">
			<div class="h5">Update Category</div>
		</div>
	<div class="card-body">
		<form action="{{route('add.update.category')}}" method="post" enctype="multipart/form-data">@csrf 
			<input type="hidden" name="id" value="{{$data->id}}">
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" name="name" value="{{$data->name}}">
						@error('name')
						<small class="text-danger">
							{{$message}}
						</small>
						@enderror
					</div>
				 	<div class="row">
						<div class="col">
							<label>Status</label>
							<select name="status" class="select" required>
								 
								@foreach($status as $key=>$value)
								<option {{ ($data->is_active == $key) ? 'selected' : '' }} value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<label>Order</label>
							<select name="order" class="select" required>
								 
								@foreach($order as $key=>$value)
								<option {{ ($data->display_order == $key) ? 'selected' : '' }} value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
						</div>
						 
					</div>
					<div class="form-group">
						<label>Image</label> 
						<div class="custom-file">
							<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
							<input type="file" name="image" class="custom-file-input"   id="image-upload"> 
							@error('image')
							<small class="text-danger">
								{{$message}}
							</small> 
							@enderror
						</div>
						<div class="my-3">
							<input type="hidden" name="image2" value="{{$data->image_url}}">
							<img  alt="No image found upload one" src="{{ url('/') }}/public/awards/{{$data->image_url}}" width="100" height="100" class="img img-thumbnail">
                            <img id="image-preview" class="img img-thumbnail" src="{{ url('/') }}/public/awards/{{$data->image_url}}"  alt="Image Preview" style="display: none;" width="150" height="150"> <!-- Initially hidden -->
                        </div>
					</div>
				</div>
				<div class="col"> 
						<div class=" ">
							<label>Description </label>
						  
						 <textarea class="form-control" name="content" rows="5" minlength="100"><?php printf("%s", $data->description) ?></textarea>
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
			<div class="h5">Add Category</div>
		</div>
	<div class="card-body">
		<form action="{{route('add.update.category')}}" method="post" enctype="multipart/form-data">@csrf 
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" name="name" value="{{old('name')}}">
							@error('name')
							<small class="text-danger">
								{{$message}}
							</small> 
							@enderror
					</div>
					<div class="row">
						<div class="col">
							<label>Status</label>
							<select name="status" class="select" required>
								 
								@foreach($status as $key=>$value)
								<option   value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<label>Order</label>
							<select name="order" class="select" required>
								 
								@foreach($order as $key=>$value)
								<option  value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
						</div>
						 
					</div>
					 
					<div class="form-group">
						<label>Image</label> 
						<div class="custom-file">
							<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
							<input type="file" name="image" class="custom-file-input"   id="image-upload" value="{{ old('image')}}"> 
							@error('image')
							<small class="text-danger">
								{{$message}}
							</small> 
							@enderror 
						</div>
						<div class="my-3">
                            <img id="image-preview"   alt="Image Preview" style="display: none;" width="150" height="150"> <!-- Initially hidden -->
                        </div>
					</div>
				</div>
				<div class="col"> 
						<div class=" ">
							<label>Description </label>
						 <textarea name="content" class="form-control" rows="5" maxlength="100" >{{ old('year')}}</textarea>
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