@extends('admin.layout._main')
@section('title') @endsection
@section('content')

@if($update)

<div class="row">
	<div class="col-md-6 col-lg-6 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="h5">Update Gallery</div>
		</div>
	<div class="card-body">
		<form action="{{route('update.gallery')}}" method="post" enctype="multipart/form-data">@csrf 
			<input type="hidden" name="id" value="{{$data->id}}">
			<div class="row">
				<div class="col">
					 
				 	<div class="row">
						<div class="col">
							<label>Status</label>
							<select name="status" class="select" required> 
								@foreach($status as $key=>$value)
								<option {{ ($data->is_active == $key) ? 'selected' : '' }} value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
						</div>
					<!-- 	<div class="col">
							<label>Order</label>
							<select name="order" class="select" required> 
								@foreach($order as $key=>$value)
								<option {{ ($data->display_order == $key) ? 'selected' : '' }} value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
						</div> -->
						 
					</div>
					<div class="row">
						<div class="col">
						<label>Select Category</label>
						<select name="category" class="select" required> 
							@foreach($category as $value)
							<option  value="{{$value->name}}">{{$value->name}}</option>
							@endforeach
						</select>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Image</label> 
								<div class="custom-file">
									<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
									<input type="file" name="image" class="custom-file-input"   id="image-upload" required> 
									@error('image.*')
									<small class="text-danger">
										{{$message}}
									</small> 
									@enderror
								</div>
								<div class="my-3">
									<input type="hidden" name="image2" value="{{$data->image}}">
									<img  alt="No image found upload one" src="{{ url('/') }}/public/gallery/{{$data->image}}" width="100" height="100" class="img img-thumbnail">
		                            <img id="image-preview" class="img img-thumbnail" src="{{ url('/') }}/public/gallery/{{$data->image}}"  alt="Image Preview" style="display: none;" width="150" height="150"> <!-- Initially hidden -->
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
	<div class="col-md-6 col-lg-6 col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="h5">Add Gallery</div>
		</div>
	<div class="card-body">
		<form action="{{route('update.gallery')}}" method="post" enctype="multipart/form-data">@csrf 
			<div class="row">
				<div class="col">
				 
					<div class="row">
						<div class="col">
							<label>Status</label>
							<select name="status" class="select" required> 
								@foreach($status as $key=>$value)
								<option   value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
						</div>
					<!-- 	<div class="col">
							<label>Order</label>
							<select name="order" class="select" required> 
								@foreach($order as $key=>$value)
								<option  value="{{$key}}">{{$value}}</option>
								@endforeach
							</select>
						</div> -->
						 
					</div>
					 
					<div class="row">
						<div class="col">
							<label>Select Category</label>
						<select name="category" class="select" required> 
							@foreach($category as $value)
							<option  >{{$value->name}}</option>
							@endforeach
						</select>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Image</label> 
								<div class="custom-file">
									<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
									<input type="file" name="image" class="custom-file-input"   id="image-upload" required> 
									@error('image.*')
									<small class="text-danger">
										{{$message}}
									</small> 
									@enderror
								</div>
								<div class="my-3">
									<input type="hidden" name="image2" >
								 
		                            <img id="image-preview" class="img img-thumbnail" src=" "  alt="Image Preview" style="display: none;" width="150" height="150"> <!-- Initially hidden -->
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